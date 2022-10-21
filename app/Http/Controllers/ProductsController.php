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
                    'image' => asset('storage/' . $product->image)
                ];
            })
        ]);
    }
    public function create()
    {
        return Inertia::render('Products/Create');
    }

    public function store()
    {
        $image = Request::file('image')->store('products', 'public');
        Product::create([
            'name' => Request::input('name'),
            'code' => Request::input('code'),
            'price' => Request::input('price'),
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

    public function update(Product $product)
    {
        $image = $product->image;
        if (Request::file('image')) {
            Storage::delete('public/' . $product->image);
            $image = Request::file('image')->store('products', 'public');
        }
        $product->update([
            'name' => Request::input('name'),
            'code' => Request::input('code'),
            'price' => Request::input('price'),
            'image' => $image
        ]);
        return Redirect::route('products.index');
    }

    public function destroy(Product $product)
    {
        Storage::delete('public/' . $product->image);
        $product->delete();
        return Redirect::route('products.index');
    }
}
