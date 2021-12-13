<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;
use Auth;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\Redirect;

class CategoryController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index(){
        $categories=Category::paginate(5);
        $trashCat=Category::onlyTrashed()->latest()->paginate(3);
        return view('admin.category.index',compact('categories','trashCat'));
    }

    public function storeCategory(Request $request){
        $request->validate([
            'category_name' => 'required|unique:categories|max:255',
        ],
            [
                'category_name.required' => 'Please Enter Category Name',
            ]);

        Category::insert([
            'category_name'=>$request->category_name,
            'user_id'=>Auth::user()->id,
            'created_at'=>Carbon::now()
        ]);
//        $cat=new Category;
//        $cat->category_name=$request->category_name;
//        $cat->user_id=Auth::user()->id;
//        $cat->save();
        return Redirect()->back()->with('success','Category Inserted Successfully');
    }

    public function editCategory($id){
        $categories=Category::find($id);
        return view('admin.category.edit',compact('categories'));
    }

    public function updateCategory(Request $request,$id){
        $update=Category::find($id)->update([
            'category_name'=>$request->category_name,
            'user_id'=>Auth::user()->id,
        ]);
        return Redirect()->route('all.category')->with('success','Category Updated Successfully');
    }

    public function softDeleteCategory($id){
        $delele=Category::find($id)->delete();
        return Redirect()->back()->with('success','Category Removed Successfully');
    }

    public function restoreCategory($id){
        $delete=Category::withTrashed()->find($id)->restore();
        return Redirect()->back()->with('success','Category Restored Successfully');
    }

    public function p_deleteCategory($id){
        $delete=Category::onlyTrashed()->find($id)->forceDelete();
        return Redirect()->back()->with('success','Category Permanently Deleted');
    }
}
