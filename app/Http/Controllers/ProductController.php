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
        // $validated = $request->validated();
        if($request->hasFile('image')){
            $image = $request->file('image');
            $image_name = 'image_'.time().$image->getClientOriginalExtension();
            $image->storeAs('product_image', $image_name);
            $image_path = 'storage/product_image/'.$image_name;
        }

        Product::create([
            'name' => $request->name,
            'sku' => $request->sku,
            'unit' => $request->unit,
            'unit_value' => $request->unit_value,
            'selling_price' => $request->selling_price,
            'purchase_price' => $request->purchase_price,
            'discount' => $request->discount,
            'tax' => $request->tax,
            'image' => isset($image_path) ? $image_path : null,
        ]);

        return redirect()->route('products.index');
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
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Product $product)
    {
        //
    }
}
