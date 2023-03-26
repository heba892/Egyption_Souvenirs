<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\Category;
use Illuminate\Support\Facades\File;

class ProductController extends Controller
{
    //
    public function index(){
        $products = Product::all();
     return view('admin.product.index' , compact('products'));
    }

    public function add(Request $request){
        $category = Category::all();
        return view('admin.product.add', compact('category'));

    }
    public function insert(Request $request){
        $product = new Product();
        if($request->hasFile('ProductImg'))
        {
            $file = $request->file('ProductImg'); // 
            $ext = $file->getClientOriginalExtension();// to get the extension
            $fileName = time().'-'.$ext; // to get the file name
            $file->move('assets/uploads/Product/' , $fileName);
            $product->image = $fileName; //to store in the data base

        }
        $product->category_id = $request->input('category_id' , ''); 
        $product->title = $request->input('title'); 
        $product->description = $request->input('description'); 
        $product->price = $request->input('price'); 
        $product->quantity = $request->input('quantity'); 
        $product->save();
        return redirect('products')->with('status', 'product added successfully');
    }
     
    public function edit($id){
        $product = Product::find($id);
        return view('admin.product.edit', compact('product'));
    }

    public function update(Request $request , $id) 
    {
        $product = Product::find($id);
        if($request->hasFile('ProductImg'))
        {
            $path = 'assets/uploads/Product/'.$product->image;
            if(File::exists($path))
            {
                File::delete($path);
                
            }

            $file = $request->file('ProductImg'); // 
             $ext = $file->getClientOriginalExtension();// to get the extension
             $fileName = time().'-'.$ext; // to create a unique name
             $file->move('assets/uploads/Product/' , $fileName);
             $product->image = $fileName; //to store in the data base

        }
        $product->category_id = $request->input('category_id'); 
        $product->title = $request->input('title'); 
        $product->description = $request->input('description'); 
        $product->price = $request->input('price'); 
        $product->quantity = $request->input('quantity'); 
        $product->update();
        return redirect('products')->with('status', 'product added successfully');

         
    }
    public function destroy($id)
    {
        $product = Product::find($id);
        $path = 'assets/uploads/Product/'.$product->image;
        if($product->image){
            if(File::exists($path)){
                File::delete($path);
            }

        }
        $product->delete();
        return redirect('products')->with('status', 'product deleted successfully');


    }

}
