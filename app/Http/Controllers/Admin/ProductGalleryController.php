<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Product;
use App\Models\ProductGallery;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Mockery\Expectation;

class ProductGalleryController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index($id)
    {
        $product = Product::findOrFail($id);
        $gallery = $product->product_galleries;
        
        return view('pages.admin.product.ProductGallery.index', compact(
            'product',
            'gallery'
        ));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request, Product $product)
    {
        try {
           $files = $request->file('files');

           //Foreach file , Storage
           // Diganakan untuk menyimpan 
           foreach ($files as $file) {
            //Upload Gambar
            $file->storeAs('public/product/gallery', $file->hashName());

            $product->product_galleries()->create([
                'product_id' => $product->id,
                'image' => $file->hashName()
            ]);
           }

           return redirect()->route('admin.product.gallery.index', $product->id)->with('success', 'Gambar Berhasil di tambahkan');
        } catch (\Exception $e) {
            dd($e->getMessage());
            return redirect()->route('admin.product.gallery.index', $product->id)->with('error', 'Failed to upload image');
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Product $product, ProductGallery $gallery)
    {
        try {

        //    Data product
        $product = $product->findOrFail($product->id);

        // Get data Gallery
        $gallery = $gallery->findOrFail($gallery->id);

        //Delete Image
        Storage::disk('local')->delete('public/product/gallery/' . basename($gallery->image));

        // Gallery Delete
        $gallery->delete();

            return redirect()->route('admin.product.gallery.index', $product->id)->with('success', 'Image deleted successfully');
        } catch (Exception $e) {
            dd($e->getMessage());
            return redirect()->route('admin.product.gallery.index', $product->id)->with('error', 'Failed to delete image');
        }


    }
}
