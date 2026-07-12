<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\Category;

class ShopController extends Controller
{
    public function index(Request $request, $categorySlug = null)
    {
        // Get all parent categories and their sub-categories for navigation
        $categories = Category::whereNull('parent_id')->with('children')->get();
        
        $currentCategory = null;
        $query = Product::with('category');

        if ($categorySlug) {
            $currentCategory = Category::where('slug', $categorySlug)->firstOrFail();
            
            // Get all sub-category IDs recursively
            $categoryIds = $currentCategory->descendantIds();
            
            // Filter query by these category IDs
            $query->whereIn('category_id', $categoryIds);
        }

        // Search functionality
        if ($request->has('search') && !empty($request->search)) {
            $search = $request->search;
            $query->where(function($q) use ($search) {
                $q->where('name', 'like', "%{$search}%")
                  ->orWhere('description', 'like', "%{$search}%");
            });
        }

        // Price filtering
        if ($request->has('min_price') && is_numeric($request->min_price)) {
            $query->where('price', '>=', $request->min_price);
        }
        if ($request->has('max_price') && is_numeric($request->max_price)) {
            $query->where('price', '<=', $request->max_price);
        }

        $products = $query->latest()->paginate(12);

        return view('shop.index', compact('categories', 'products', 'currentCategory'));
    }
}
