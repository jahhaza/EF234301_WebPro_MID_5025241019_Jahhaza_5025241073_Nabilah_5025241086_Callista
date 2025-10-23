<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class ProductController extends Controller
{
    public function index()
    {
        $products = Product::with('category')->get();
        $categories = Category::all();
        $cartCount = $this->getCartCount();

        return view('products.index', compact('products', 'categories', 'cartCount'));
    }

    public function show(Product $product)
    {
        $relatedProducts = Product::where('category_id', $product->category_id)
            ->where('id', '!=', $product->id)
            ->take(4)
            ->get();

        $cartCount = $this->getCartCount();

        return view('products.show', compact('product', 'relatedProducts', 'cartCount'));
    }

    public function create()
    {
        $categories = Category::all();
        return view('admin.products.create', compact('categories'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'description' => 'required|string',
            'price' => 'required|numeric|min:0',
            'category_id' => 'required|exists:categories,id',
            'image' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048',
            'badge' => 'nullable|string|max:50',
            'full_description' => 'nullable|string',
            'features' => 'nullable|string'
        ]);

        $imagePath = null;
        if ($request->hasFile('image')) {
            $imagePath = $request->file('image')->store('products', 'public');
        }

        Product::create([
            'name' => $request->name,
            'description' => $request->description,
            'price' => $request->price,
            'category_id' => $request->category_id,
            'image' => $imagePath,
            'badge' => $request->badge,
            'full_description' => $request->full_description,
            'features' => $request->features
        ]);

        return redirect()->route('admin.products.index')
            ->with('success', 'Product created successfully!');
    }

    public function edit(Product $product)
    {
        $categories = Category::all();
        return view('admin.products.edit', compact('product', 'categories'));
    }

    public function update(Request $request, Product $product)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'description' => 'required|string',
            'price' => 'required|numeric|min:0',
            'category_id' => 'required|exists:categories,id',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
            'badge' => 'nullable|string|max:50',
            'full_description' => 'nullable|string',
            'features' => 'nullable|string'
        ]);

        $data = [
            'name' => $request->name,
            'description' => $request->description,
            'price' => $request->price,
            'category_id' => $request->category_id,
            'badge' => $request->badge,
            'full_description' => $request->full_description,
            'features' => $request->features
        ];

        if ($request->hasFile('image')) {
            // Delete old image
            if ($product->image) {
                Storage::disk('public')->delete($product->image);
            }
            
            $data['image'] = $request->file('image')->store('products', 'public');
        }

        $product->update($data);

        return redirect()->route('admin.products.index')
            ->with('success', 'Product updated successfully!');
    }

    public function destroy(Product $product)
    {
        if ($product->image) {
            Storage::disk('public')->delete($product->image);
        }

        $product->delete();

        return redirect()->route('admin.products.index')
            ->with('success', 'Product deleted successfully!');
    }

    public function adminIndex()
    {
        $products = Product::with('category')->latest()->get();
        return view('admin.products.index', compact('products'));
    }

    public function search(Request $request)
    {
        $query = $request->get('q');
        
        $products = Product::where('name', 'LIKE', "%{$query}%")
            ->orWhere('description', 'LIKE', "%{$query}%")
            ->get();

        $songs = \App\Models\Song::where('title', 'LIKE', "%{$query}%")
            ->orWhere('album', 'LIKE', "%{$query}%")
            ->get();

        $concerts = \App\Models\Concert::where('title', 'LIKE', "%{$query}%")
            ->orWhere('venue', 'LIKE', "%{$query}%")
            ->get();

        return response()->json([
            'products' => $products,
            'songs' => $songs,
            'concerts' => $concerts
        ]);
    }

    private function getCartCount()
    {
        $cart = session()->get('cart', []);
        return array_sum(array_column($cart, 'quantity'));
    }
}