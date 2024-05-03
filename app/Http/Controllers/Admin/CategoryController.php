<?php

namespace App\Http\Controllers\Admin;

use Exception;
use App\Models\Category;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Storage;

class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {

        $category = Category::select('id', 'name', 'image')->latest()->get();

        return view('pages.admin.category.index', compact(
            'category'
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
    public function store(Request $request)
    {
        // Vlidate 
        $this->validate($request, [
            'name' => 'required',
            'image' => 'required|image|mimes:jpeg,png,jpg|max:2048'
        ]);

        try {

            // Create category
            $data = $request->all();

            // Store Image
            $image = $request->file('image');
            $image->storeAs('public/category', $image->hashName());

            $data['image'] = $image->hashName();
            $data['slug'] = Str::slug($request->name);

            Category::create($data);

            // dd($category);
            return redirect()->back()->with('success', 'data berhasil');
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
        //Get data by id
        $category = Category::find($id);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //Melakukan Validasi
        $this->validate($request, [
            'name' => 'required|max:255',
            'image' => 'image|mimes: jpeg,png,jpg|max:5048'
        ]);

        try {
            //get data by id
            $category = Category::find($id);
            //jika image kosong
            if ($request->file('image') == '') {
                $data = $request->all();
                $data['slug'] = Str::slug($request->name);

                $category->update($data);

                return redirect()->back()->with('success', 'category Berhasil diubah');
            } else {
                // jika gambar ingin di update
                // Hapus image lama
                Storage::disk('local')->delete('public/category/' . basename($category->image));

                // Upload image baru
                $image = $request->file('image');
                $image->storeAs('public/category/', $image->hashName());

                // Update data
               $data = $request->all();
               $data['image'] = $image->hashName();
               $data['slug'] = Str::slug($request->name);

               $category->update($data);

                return redirect()->back()->with('success', 'Gambar Category Berhasil Di Edit');
            }
        } catch (Exception $e) {
            return redirect()->back()->with('error', 'Failed Something wrong');
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        try {
            //get dadt by id
            $category = Category::find($id);

            // Hapus image lama
            // basename itu untuk mengambil nama file
            Storage::disk('local')->delete('public/category/' . basename($category->image));

            // Hapus data
            $category->delete();

            return redirect()->back()->with('success', 'data berhaisl di hapus');
        } catch (Exception $th) {
            return redirect()->back()->with('error', 'Failed Someting Wrong!');
        }
    }
}
