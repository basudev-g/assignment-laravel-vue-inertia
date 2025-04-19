<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Http\Requests\StoreProductRequest;
use App\Http\Requests\UpdateProductRequest;
use Inertia\Inertia;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return Inertia::render('Products/IndexPage', [
            'products' => Product::all(),
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return Inertia::render('Products/CreatePage');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreProductRequest $request)
    {
        $validated = $request->validated();
        if($request->hasFile('image')){
            $image = $request->file('image');
            $image_name = 'image_'.time().$image->getClientOriginalExtension();
            $image->storeAs('product_image', $image_name);
            $image_path = 'storage/product_image/'.$image_name;
        }

        $validated['image'] = isset($image_path) ? $image_path : null;

        // Create the product
        Product::create($validated);

        return Inertia::render('Products/IndexPage');
    }

    /**
     * Display the specified resource.
     */
    public function show(Product $product)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Product $product)
    {
        return Inertia::render('Products/EditPage', [
            'product' => $product,
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateProductRequest $request, Product $product)
    {
        $validated = $request->validated();
        if($request->hasFile('image')){
            // Delete old image if exists
            if ($product->image) {
                $old_image_path = public_path($product->image);
                if (file_exists($old_image_path)) {
                    unlink($old_image_path);
                }
            }
            $image = $request->file('image');
            $image_name = 'image_'.time().$image->getClientOriginalExtension();
            $image->storeAs('product_image', $image_name);
            $image_path = 'storage/product_image/'.$image_name;
        }

        $validated['image'] = isset($image_path) ? $image_path : $product->image;
        $product->update($validated);

        return Inertia::render('Products/IndexPage');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Product $product)
    {
        //
    }
}
