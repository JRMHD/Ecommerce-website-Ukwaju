<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;

class ShopController extends Controller
{
    public function index(Request $request)
    {
        $query = Product::query();

        // Fetch distinct categories
        $categories = Product::select('category')->distinct()->get();

        // Search logic
        if ($request->has('search') && !empty($request->search)) {
            $query->where('name', 'like', '%' . $request->search . '%')
                ->orWhere('description', 'like', '%' . $request->search . '%')
                ->orWhere('category', 'like', '%' . $request->search . '%');
        }

        // Sorting logic
        if ($request->has('sort')) {
            if ($request->sort == 'latest') {
                $query->orderBy('created_at', 'desc');
            } elseif ($request->sort == 'price_low_high') {
                $query->orderBy('price', 'asc');
            } elseif ($request->sort == 'price_high_low') {
                $query->orderBy('price', 'desc');
            }
        } else {
            $query->orderBy('created_at', 'desc');
        }

        // Pagination
        $perPage = $request->input('per_page', 20);
        $products = $query->paginate($perPage);

        if ($request->ajax()) {
            return response()->json([
                'products' => view('partials.product-card', compact('products'))->render(),
                'next_page' => $products->nextPageUrl()
            ]);
        }

        return view('shop', compact('products', 'categories'));
    }

    public function show($id)
    {
        $product = Product::findOrFail($id);

        // Fetch related products (same category, excluding the current product)
        $relatedProducts = Product::where('category', $product->category)
            ->where('id', '!=', $id)
            ->latest()
            ->take(4) // Get 4 related products
            ->get();

        return view('shop-detail', compact('product', 'relatedProducts'));
    }


    public function home()
    {
        $latestProducts = Product::orderBy('created_at', 'desc')->take(6)->get();
        $bottomProducts = Product::orderBy('created_at', 'asc')->take(3)->get();

        return view('welcome', compact('latestProducts', 'bottomProducts'));
    }
}
