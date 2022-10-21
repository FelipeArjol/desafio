<?php

namespace App\Http\Controllers;

use Inertia\Inertia;
use App\Models\Product;
use Illuminate\Support\Facades\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Redirect;

class ProductsController extends Controller
{
    public function index()
    {
        return Inertia::render('Products/Index', [
            'products' => Product::all()->map(function ($product) {
                return [
                    'id' => $product->id,
                    'name' => $product->name,
                    'price' => $product->price,
                    'code' => $product->code,
                    // 'image' => Storage::url($product->image),
                    'image' => asset('storage/' . $product->image)
                ];
            })
        ]);
    }
    public function create()
    {
        return Inertia::render('Products/Create');
    }

    public function store(Request $request)
    {
        $image = $request->file('image')->store('products', 'public');

        if (!$image) {
            // Retorno de erro no upload
        }

        Product::create([
            'name' => $request->input('name'),
            'code' => $request->input('code'),
            'price' => $request->input('price'),
            'image' => $image,
        ]);

        return Redirect::route('products.index');
    }

    public function edit(Product $product)
    {
        return Inertia::render('Products/Edit', [
            'product' => $product,
            'image' => asset('storage/' . $product->image)
        ]);
    }

    public function update(Product $product, Request $request)
    {
        $image = null;

        if ($request->file('image')) {
            Storage::delete('public/' . $product->image);
            $image = $request->file('image')->store('products', 'public');
        }

        $product->update([
            'name' => $request->input('name'),
            'code' => $request->input('code'),
            'price' => $request->input('price'),
            'image' => $image ?? $product->image // null coalesce operator
        ]);

        return redirect()->route('products.index');
    }

    public function destroy(Product $product)
    {
        Storage::delete('public/' . $product->image);

        $product->delete();

        return redirect()->route('products.index');

        // return redirect(route('products.index'));
    }
}
