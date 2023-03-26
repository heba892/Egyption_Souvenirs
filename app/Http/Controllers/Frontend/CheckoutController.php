<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Cart;
use App\Models\Product;
use App\Models\Order;
use App\Models\User;
use App\Models\OrderItem;
use Auth;


class CheckoutController extends Controller
{
    //
    function index(){
        $old_cartitems = Cart::where('user_id', Auth::id())->get();
        foreach($old_cartitems as $item)
        {
            if(!Product::where('id', $item->product_id)->where('quantity', '>=', $item->quantity)->exists())
            {
                $removeitem = Cart::where('user_id', Auth::id())->where('product_id', $item->product_id)->first();
                $removeitem->delete();

            }

        };
        $cartitems = Cart::where('user_id', Auth::id())->get();

        return view('frontend.checkout' , compact('cartitems'));
    }
    public function placeorder(Request $request)
    {
        
        $order = new Order();
        $order->user_id = Auth::id();
        $order->fname = $request->input('fname');
        $order->lname = $request->input('lname');
        $order->email = $request->input('email');
        $order->phone = $request->input('phone');
        $order->address = $request->input('address');
        $order->city = $request->input('city');
        $order->state = $request->input('state');
        $order->pincode = $request->input('pincode');
        

        //to calculate total price 
        $total = 0;
        $cartitems_total = Cart::where('user_id', Auth::id())->get();
        foreach($cartitems_total as $prod)
        {
            $total += $prod->products->price * $prod->quantity;

        }
        $order->total_price = $total;
        $order->tracking_no = 'heba'.rand(1111, 9999);
        $order->save();

        $cartitems = Cart::where('user_id', Auth::id())->get();
        foreach($cartitems as $item){
            OrderItem::create([
                'order_id'=>$order->id,
                'product_id'=>$item->product_id,
                'quantity'=>$item->quantity,
                'price'=>$item->products->price,

            ]);
            $prod = Product::where('id', $item->product_id)->first();
            $prod->quantity =$prod->quantity - $item->quantity;
            $prod->update();
        }

        if(Auth::user()->adress == NULL)
        {
            $user = User::where('id', Auth::id())->first();
            $user->name = $request->input('fname');
            $user->name = $request->input('lname');
            //$user->email = $request->input('email');
            $user->phone = $request->input('phone');
            $user->address = $request->input('address');
            $user->city = $request->input('city');
            $user->state = $request->input('state');
            $user->pincode = $request->input('pincode');
            $user->update();


        }
        $cartitems = Cart::where('user_id', Auth::id())->get();
        Cart::destroy($cartitems);

        return redirect('/')->with('status' , 'Your order has been placed successfully');


    }
}
