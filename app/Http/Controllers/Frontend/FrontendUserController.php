<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\Category;
class FrontendUserController extends Controller
{
    //
    function index(){
        $featured_products = Product::take(16)->get();
        $recent_products = Product::OrderBy('created_at' , 'DESC')->get()->take(9);
        return view('frontend.index' , compact('featured_products' , 'recent_products'));
    }
    function category(){
        $category = Category::get();
        return view('frontend.category' , compact('category'));
    }
    function viewCategory($id){
        if(Category::where('id', $id)->exists())
        {
            $category = Category::where('id', $id)->first();
            $product = Product::where('category_id', $category->id)->get();
            return view('frontend.products.index', compact('category', 'product'));
        }else{
            return redirect('')->with('status', 'doesnt exxist');
        }
        //$products  = Product::

    }
    function productView($cat_title , $prod_title){
        if(Category::where('title', $cat_title)->exists())
        {
            if(Product::where('title' , $prod_title)->exists())
            {
                $product = Product::where('title', $prod_title)->first();
                //$category = Category::where('title', $cat_title)->first();
                return view('frontend.products.view', compact('product'));
            }else{

                return redirect('/')->with('status', 'the link is not exists');

            }

        }else{
            return redirect('/')->with('status', 'the link is not exists');

        }

    }
}
