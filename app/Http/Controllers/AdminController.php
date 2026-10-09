<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\Category;
use App\Models\Project;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Str;

class AdminController extends Controller
{
    public function dashboard()
    {
        $productsCount = Product::count();
        $categoriesCount = Category::count();
        $projectsCount = Project::count();
        return view('admin.dashboard', compact('productsCount', 'categoriesCount', 'projectsCount'));
    }

    public function index(Request $request)
    {
        $query = Product::with('category');

        if ($request->has('search') && !empty($request->search)) {
            $search = $request->search;
            $query->where('name', 'like', "%{$search}%")
                  ->orWhere('description', 'like', "%{$search}%");
        }

        $products = $query->latest()->paginate(15);
        return view('admin.products.index', compact('products'));
    }

    public function create()
    {
        $categoriesList = Category::getHierarchicalList();
        return view('admin.products.create', compact('categoriesList'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'category_id' => 'required|exists:categories,id',
            'name' => 'required|string|max:255',
            'price' => 'required|numeric|min:0',
            'description' => 'nullable|string',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,webp|max:4096',
        ]);

        $imagePath = null;
        if ($request->hasFile('image')) {
            $image = $request->file('image');
            $imageName = time() . '_' . uniqid() . '.' . $image->getClientOriginalExtension();
            $destinationPath = public_path('uploads/products');
            
            if (!File::exists($destinationPath)) {
                File::makeDirectory($destinationPath, 0755, true);
            }
            
            $image->move($destinationPath, $imageName);
            $imagePath = 'uploads/products/' . $imageName;
        }

        Product::create([
            'category_id' => $request->category_id,
            'name' => $request->name,
            'price' => $request->price,
            'description' => $request->description,
            'image_path' => $imagePath
        ]);

        return redirect()->route('admin.products.index')->with('success', 'Product created successfully.');
    }

    public function edit($id)
    {
        $product = Product::findOrFail($id);
        $categoriesList = Category::getHierarchicalList();
        return view('admin.products.edit', compact('product', 'categoriesList'));
    }

    public function update(Request $request, $id)
    {
        $product = Product::findOrFail($id);

        $request->validate([
            'category_id' => 'required|exists:categories,id',
            'name' => 'required|string|max:255',
            'price' => 'required|numeric|min:0',
            'description' => 'nullable|string',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,webp|max:4096',
        ]);

        $imagePath = $product->image_path;

        if ($request->hasFile('image')) {
            // Delete old image if it exists
            if ($imagePath && File::exists(public_path($imagePath))) {
                File::delete(public_path($imagePath));
            }

            $image = $request->file('image');
            $imageName = time() . '_' . uniqid() . '.' . $image->getClientOriginalExtension();
            $destinationPath = public_path('uploads/products');
            
            if (!File::exists($destinationPath)) {
                File::makeDirectory($destinationPath, 0755, true);
            }

            $image->move($destinationPath, $imageName);
            $imagePath = 'uploads/products/' . $imageName;
        }

        $product->update([
            'category_id' => $request->category_id,
            'name' => $request->name,
            'price' => $request->price,
            'description' => $request->description,
            'image_path' => $imagePath
        ]);

        return redirect()->route('admin.products.index')->with('success', 'Product updated successfully.');
    }

    public function destroy($id)
    {
        $product = Product::findOrFail($id);

        if ($product->image_path && File::exists(public_path($product->image_path))) {
            File::delete(public_path($product->image_path));
        }

        $product->delete();

        return redirect()->back()->with('success', 'Product deleted successfully.');
    }

    // --- Categories CRUD Methods ---
    
    public function categoriesIndex()
    {
        $categories = Category::with('parent')->latest()->paginate(15);
        return view('admin.categories.index', compact('categories'));
    }

    public function categoriesCreate()
    {
        $parentCategories = Category::getHierarchicalList();
        return view('admin.categories.create', compact('parentCategories'));
    }

    public function categoriesStore(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'parent_id' => 'nullable|exists:categories,id'
        ]);

        Category::create([
            'name' => $request->name,
            'parent_id' => $request->parent_id
        ]);

        return redirect()->route('admin.categories.index')->with('success', 'Category created successfully.');
    }

    public function categoriesEdit($id)
    {
        $category = Category::findOrFail($id);
        $parentCategories = Category::getHierarchicalList($category->id);
        return view('admin.categories.edit', compact('category', 'parentCategories'));
    }

    public function categoriesUpdate(Request $request, $id)
    {
        $category = Category::findOrFail($id);

        $request->validate([
            'name' => 'required|string|max:255',
            'parent_id' => 'nullable|exists:categories,id'
        ]);

        $category->update([
            'name' => $request->name,
            'parent_id' => $request->parent_id
        ]);

        return redirect()->route('admin.categories.index')->with('success', 'Category updated successfully.');
    }

    public function categoriesDestroy($id)
    {
        $category = Category::findOrFail($id);
        
        if ($category->children()->exists()) {
            return redirect()->route('admin.categories.index')->with('error', 'Cannot delete category. It contains sub-categories. Delete sub-categories first.');
        }

        $category->delete();

        return redirect()->route('admin.categories.index')->with('success', 'Category deleted successfully.');
    }

    // --- Projects CRUD Methods ---

    public function projectsIndex(Request $request)
    {
        $query = Project::query();

        if ($request->has('search') && !empty($request->search)) {
            $search = $request->search;
            $query->where('title', 'like', "%{$search}%")
                  ->orWhere('description', 'like', "%{$search}%")
                  ->orWhere('category', 'like', "%{$search}%")
                  ->orWhere('client', 'like', "%{$search}%");
        }

        $projects = $query->latest()->paginate(15);
        return view('admin.projects.index', compact('projects'));
    }

    public function projectsCreate()
    {
        return view('admin.projects.create');
    }

    public function projectsStore(Request $request)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'category' => 'nullable|string|max:255',
            'client' => 'nullable|string|max:255',
            'description' => 'required|string',
            'details' => 'nullable|string',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,webp|max:4096',
        ]);

        $imagePath = null;
        if ($request->hasFile('image')) {
            $image = $request->file('image');
            $imageName = time() . '_' . uniqid() . '.' . $image->getClientOriginalExtension();
            $destinationPath = public_path('uploads/projects');
            
            if (!File::exists($destinationPath)) {
                File::makeDirectory($destinationPath, 0755, true);
            }
            
            $image->move($destinationPath, $imageName);
            $imagePath = 'uploads/projects/' . $imageName;
        }

        Project::create([
            'title' => $request->title,
            'slug' => Str::slug($request->title),
            'category' => $request->category,
            'client' => $request->client,
            'description' => $request->description,
            'details' => $request->details,
            'image_path' => $imagePath
        ]);

        return redirect()->route('admin.projects.index')->with('success', 'Project created successfully.');
    }

    public function projectsEdit($id)
    {
        $project = Project::findOrFail($id);
        return view('admin.projects.edit', compact('project'));
    }

    public function projectsUpdate(Request $request, $id)
    {
        $project = Project::findOrFail($id);

        $request->validate([
            'title' => 'required|string|max:255',
            'category' => 'nullable|string|max:255',
            'client' => 'nullable|string|max:255',
            'description' => 'required|string',
            'details' => 'nullable|string',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,webp|max:4096',
        ]);

        $imagePath = $project->image_path;

        if ($request->hasFile('image')) {
            if ($imagePath && File::exists(public_path($imagePath))) {
                File::delete(public_path($imagePath));
            }

            $image = $request->file('image');
            $imageName = time() . '_' . uniqid() . '.' . $image->getClientOriginalExtension();
            $destinationPath = public_path('uploads/projects');
            
            if (!File::exists($destinationPath)) {
                File::makeDirectory($destinationPath, 0755, true);
            }

            $image->move($destinationPath, $imageName);
            $imagePath = 'uploads/projects/' . $imageName;
        }

        $project->update([
            'title' => $request->title,
            'slug' => Str::slug($request->title),
            'category' => $request->category,
            'client' => $request->client,
            'description' => $request->description,
            'details' => $request->details,
            'image_path' => $imagePath
        ]);

        return redirect()->route('admin.projects.index')->with('success', 'Project updated successfully.');
    }

    public function projectsDestroy($id)
    {
        $project = Project::findOrFail($id);

        if ($project->image_path && File::exists(public_path($project->image_path))) {
            File::delete(public_path($project->image_path));
        }

        $project->delete();

        return redirect()->back()->with('success', 'Project deleted successfully.');
    }
}
