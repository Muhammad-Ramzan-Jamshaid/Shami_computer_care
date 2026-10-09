<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;

class Category extends Model
{
    protected $fillable = ['name', 'slug', 'parent_id'];

    // Auto-generate slug on creation & update
    protected static function boot()
    {
        parent::boot();
        static::creating(function ($category) {
            if (empty($category->slug)) {
                $category->slug = Str::slug($category->name);
            }
        });
        static::updating(function ($category) {
            if (empty($category->slug)) {
                $category->slug = Str::slug($category->name);
            }
        });
    }

    public function parent()
    {
        return $this->belongsTo(Category::class, 'parent_id');
    }

    public function children()
    {
        return $this->hasMany(Category::class, 'parent_id');
    }

    public function products()
    {
        return $this->hasMany(Product::class);
    }

    // Get all descendant category IDs recursively (to filter products in parent categories)
    public function descendantIds()
    {
        $ids = [$this->id];
        foreach ($this->children as $child) {
            $ids = array_merge($ids, $child->descendantIds());
        }
        return $ids;
    }

    // Static helper to return all categories in hierarchical indented order
    public static function getHierarchicalList($excludeId = null)
    {
        $rootCategories = self::whereNull('parent_id')->with('children')->get();
        $result = collect();

        $traverse = function ($category, $prefix = '') use (&$traverse, &$result, $excludeId) {
            if ($excludeId && $category->id == $excludeId) {
                return;
            }

            $result->push([
                'id' => $category->id,
                'name' => $prefix . $category->name,
                'raw_name' => $category->name,
                'level' => strlen($prefix) / 3
            ]);

            foreach ($category->children as $child) {
                $traverse($child, $prefix . '--- ');
            }
        };

        foreach ($rootCategories as $root) {
            $traverse($root, '');
        }

        return $result;
    }
}
