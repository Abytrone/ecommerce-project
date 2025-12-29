<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ShopController extends Controller
{
    public function index()
    {
        $categories = \App\Models\Category::where('is_active', true)->get();

        $products = \App\Models\Product::where('is_visible', true)
            ->when(request('category'), function ($query) {
                $query->whereHas('category', function ($q) {
                    $q->where('slug', request('category'));
                });
            })
            ->when(request('search'), function ($query) {
                $search = request('search');
                $query->where(function ($q) use ($search) {
                    $q->where('name', 'like', "%{$search}%")
                        ->orWhere('description', 'like', "%{$search}%");
                });
            })
            ->latest()
            ->paginate(12);

        return view('shop.index', compact('categories', 'products'));
    }

    public function show($slug)
    {
        $product = \App\Models\Product::where('slug', $slug)
            ->where('is_visible', true)
            ->firstOrFail();

        $relatedProducts = \App\Models\Product::where('category_id', $product->category_id)
            ->where('id', '!=', $product->id)
            ->where('is_visible', true)
            ->limit(4)
            ->get();

        return view('shop.show', compact('product', 'relatedProducts'));
    }
}
