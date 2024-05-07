<?php

namespace App\Http\Controllers\Admin;

use Exception;
use App\Models\Product;
use App\Models\Category;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use GuzzleHttp\Handler\Proxy;
use Illuminate\Support\Facades\Storage;
use Mockery\Expectation;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $product = Product::select('id', 'name', 'category_id', 'price', 'description')->get();

        return view('pages.admin.product.index', compact(
            'product',
        ));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $category = Category::all();

        return view('pages.admin.product.create', compact(
            'category'
        ));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // Vlidate 
        $this->validate($request, [
            'name' => 'required',
            'category_id' => 'required',
            'price' => 'required|integer',
            'description' => 'required'
        ]);

        try {
            // Create category
            $data = $request->all();
            $data['slug'] = Str::slug($request->name);

            Product::create($data);

            // dd($category);
            return redirect()->route('admin.product.index')->with('success', 'Kamu berhasil menambah News baru 👍');
        } catch (Exception $e) {
            // dd($e->getMessage());
            return redirect()->back()->with('error', 'Failed to add category');
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
        $product = Product::findOrFail($id);
        $category = Category::select('id', 'name')->get();

        return view('pages.admin.product.edit', compact(
            'product',
            'category'  
        ));

    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {

        // Vlidate 
        $this->validate($request, [
            'name' => 'required',
            'category_id' => 'required',
            'price' => 'required|integer',
            'description' => 'required'
        ]);

        try {
            $data = $request->all();
            $data['slug'] = Str::slug('$request->name');

            $product = Product::findOrFail($id);
            $product->update($data);

            return redirect()->route('admin.product.index')->with('success', 'data berhasil di edit');

        } catch (Expectation $e) {
            return redirect()->back()->with('error');
        }




    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        try {
            //get dadt by id
            $product = Product::find($id);


            // Hapus data
            $product->delete();

            return redirect()->back()->with('success', 'data berhaisl di hapus');
        } catch (Exception $th) {
            return redirect()->back()->with('error', 'Failed Someting Wrong!');
        }
    }
}
