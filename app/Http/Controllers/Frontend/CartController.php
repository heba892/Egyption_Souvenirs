<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Cart;
use App\Models\Product;
use Auth;
class CartController extends Controller
{
    //
    function addToCart(Request $request){
        $product_id = $request->input('product_id');
        $product_qty = $request->input('product_qty');

        if(Auth::check())
        {
            $prod_check = Product::where('id' , $product_id)->first();
            if($prod_check){
                 if(Cart::where('product_id' , $product_id)->where('user_id',Auth::id())->exists())
                 {
                    return response()->json(['status' => $prod_check->title.' already Added to cart']);

                 }else{
                    $cartItem = new Cart();
                    $cartItem->product_id = $product_id;
                    $cartItem->quantity = $product_qty;
                    $cartItem->user_id = Auth::id();
                    $cartItem->save();
                    return response()->json(['status' => $prod_check->title." Added to cart"]);


                 }
                
                
              }

        }
        else
        {
            return response()->json(['status'=>"login to continue"]);

        }

    }

    function viewCart(){
        $cartitems = Cart::where('user_id', Auth::id())->get();
        return view('frontend.cart' , compact('cartitems'));
    }

    function updatecart(Request $request){
        $product_id = $request->input('product_id');
        $product_qty = $request->input('product_qty');

        if(Auth::check())
        {
            
            if(Cart::where('product_id' , $product_id)->where('user_id', Auth::id())->exists())
            {
                $cart = Cart::where('product_id' , $product_id)->where('user_id', Auth::id())->first();
                $cart->quantity = $product_qty;
                $cart->update();
                return response()->json(['status'=>"Quantitiy Updated"]);

            }

        }

    }

    function deleteProduct(Request $request){
        if(Auth::check())
        {
            $prod_id = $request->input('product_id');
            if(Cart::where('product_id' , $prod_id)->where('user_id', Auth::id())->exists())
            {
                $cartitem = Cart::where('product_id' , $prod_id)->where('user_id', Auth::id())->first();
                $cartitem->delete();
                return response()->json(['status' => "Product Deleted Successfully"]);


            }

        }
        else
        {
            return response()->json(['status'=>"login to continue"]);

        }
    }
}

