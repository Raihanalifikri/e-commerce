<?php

namespace App\Http\Controllers\FrontEnd;

use App\Http\Controllers\Controller;
use App\Models\Cart;
use App\Models\Category;
use App\Models\Product;
use Exception;
use Illuminate\Cache\RateLimiting\Limit;
use Illuminate\Http\Request;

class FrontEndController extends Controller
{
    public function index()
    {
        $category = Category::select('id', 'name', 'slug')->latest()->limit(8)->get();
        $product = Product::with('product_galleries')->select('id', 'name', 'slug', 'price')->latest()->get();


        return view('pages.FrontEnd.index', compact(
            'category',
            'product'
        ));
    } 

    public function detailProduct($slug) {

        $category = Category::select('id', 'slug', 'name')->latest()->get();
        $product = Product::with('product_galleries')->where('slug', $slug)->first();
        $recommendation = Product::with('product_galleries')->select('id', 'name', 'slug', 'price')->inRandomOrder()->limit(4)->get();
        return view('pages.FrontEnd.detail-product', compact(
            'product',
            'category',
            'recommendation',
        ));
    }

    public function detailCategory($slug){
        $category = Category::select('id', 'name', 'slug')->latest()->get();
        $categories = Category::where('slug', $slug)->first();
        $product = Product::with('product_galleries')->where('category_id', $categories->id)->latest()->get();

        return view('pages.FrontEnd.detail-category', compact(
            'category',
            'categories',
            'product'

        ));
    }

    public function cart(){
        $category = Category::select('id', 'name', 'slug')->latest()->get();
        $cart = Cart::with('product')->where('user_id', auth()->user()->id)->get();

        return view('pages.FrontEnd.cart', compact(
            'category',
            'cart'
        ));
    }

    public function addToCart(Request $request, $id){
        try {
            Cart::create([
                'product_id' => $id,
                'user_id' => auth()->user()->id
            ]);

            return redirect()->route('cart');
        } catch (Exception $e) {
            return redirect()->back()->with('error', 'Faild Data');
        }
    }
}
