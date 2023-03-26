<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Category;
use Illuminate\Support\Facades\File;

class CategoryController extends Controller
{
    //
    public function index(){
        $category = Category::all();
        return view('admin.category.index' , compact('category'));
    }


    public function add(){
        return view('admin.category.add');
    }


    public function insert(Request $request){
        $category = new Category();
        if($request->hasFile('CategoryImg'))
        {
            $file = $request->file('CategoryImg'); // 
            $ext = $file->getClientOriginalExtension();// to get the extension
            $fileName = time().'-'.$ext; // to get the file name
            $file->move('assets/uploads/Category/' , $fileName);
            $category->image = $fileName; //to store in the data base

        }
        $category->title = $request->input('title'); 
        $category->save();
        return redirect('/dashboard')->with('status', 'category added successfully');
    }

    public function edit($id){
        $category = Category::find($id);
        return view('admin.category.edit', compact('category'));
    }
    


    public function update(Request $request , $id)
    {
        $category = Category::find($id);
        if($request->hasFile('CategoryImg'))
        {
            $path = 'assets/uploads/Category/'.$category->image;
            if(File::exists($path))
            {
                File::delete($path);
                
            }

            $file = $request->file('CategoryImg'); // 
             $ext = $file->getClientOriginalExtension();// to get the extension
             $fileName = time().'-'.$ext; // to create a unique name
             $file->move('assets/uploads/Category/' , $fileName);
             $category->image = $fileName; //to store in the data base

        }
        $category->title = $request->input('title'); 
        $category->update();
        return redirect('/dashboard')->with('status', 'category updated successfully');


         
    }
    public function destroy($id)
    {
        $category = Category::find($id);
        $path = 'assets/uploads/Category/'.$category->image;

        if($category->image){
            if(File::exists($path)){
                File::delete($path);
            }

        }
        $category->delete();
        return redirect('categories')->with('status', 'category deleted successfully');


    }
}
