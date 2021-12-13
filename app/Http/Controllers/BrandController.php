<?php

namespace App\Http\Controllers;

use App\Models\Brand;
use App\Models\Multipic;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
use Image;

class BrandController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth');
    }


    public function index(){
        $brands=Brand::paginate(5);
        return view('admin.brand.index',compact('brands'));
    }

    public function storeBrand(Request $request){
        $request->validate([
            'brand_name' => 'required|unique:brands|max:255',
            'brand_image' => 'required',
        ],
            [
                'brand_name.required' => 'Please Enter Brands Name',
                'brand_image.required' => 'Please insert an image',
            ]);
        $brand_image = $request->file('brand_image');

//        $name_gen = hexdec(uniqid());
//        $img_ext = strtolower($brand_image->getClientOriginalExtension());
//        $img_name = $name_gen.'.'.$img_ext;
//        $up_location = 'image/brand/';
//        $last_img = $up_location.$img_name;
//        $brand_image->move($up_location,$img_name);

        $name_gen = hexdec(uniqid()).'.'.$brand_image->getClientOriginalExtension();
        Image::make($brand_image)->resize(300)->save('image/brand/'.$name_gen);
        $last_img='image/brand/'.$name_gen;

        Brand::insert([
            'brand_name'=>$request->brand_name,
            'brand_image'=>$last_img,
            'created_at'=>Carbon::now()
        ]);

        $notification = array(
            'message'=>'Brand Inserted Successfully',
            'alert-type'=>'success'
        );

        return Redirect()->back()->with($notification);
    }

    public function editBrand($id){
        $brands=Brand::find($id);
        return view('admin.brand.edit',compact('brands'));
    }

    public function updateBrand(Request $request,$id){
        $request->validate([
            'brand_name' => 'required|max:255',
        ],
            [
                'brand_name.required' => 'Please Enter Brands Name',
            ]);

        $old_image=$request->old_image;

        $brand_image = $request->file('brand_image');

        if ($brand_image){
//            $name_gen = hexdec(uniqid());
//            $img_ext = strtolower($brand_image->getClientOriginalExtension());
//            $img_name = $name_gen.'.'.$img_ext;
//            $up_location = 'image/brand/';
//            $last_img = $up_location.$img_name;
//            $brand_image->move($up_location,$img_name);

            $name_gen = hexdec(uniqid()).'.'.$brand_image->getClientOriginalExtension();
            Image::make($brand_image)->resize(300)->save('image/brand/'.$name_gen);
            $last_img='image/brand/'.$name_gen;

            unlink($old_image);

            Brand::find($id)->update([
                'brand_name'=>$request->brand_name,
                'brand_image'=>$last_img,
                'created_at'=>Carbon::now()
            ]);

            return Redirect()->route('all.brand')->with('success','Brand Updated Successfully');
        }

        else{
            Brand::find($id)->update([
                'brand_name'=>$request->brand_name,
                'created_at'=>Carbon::now()
            ]);

            return Redirect()->route('all.brand')->with('success','Brand Updated Successfully');
        }
    }

    public function deleteBrand($id){
        $image=Brand::find($id);
        $old_image=$image->brand_image;
        unlink($old_image);

        Brand::find($id)->delete();
        return Redirect()->back()->with('success','Brand Deleted Successfully');
    }


    //multi image controllers

    public function multiPic(){
        $images=Multipic::all();
        return view('admin.multipic.index',compact('images'));
    }

    public function storeM_image(Request $request){
        $image = $request->file('image');

        foreach ($image as $multi_img){
            $name_gen = hexdec(uniqid()).'.'.$multi_img->getClientOriginalExtension();
            Image::make($multi_img)->resize(300,300)->save('image/multi/'.$name_gen);
            $last_img='image/multi/'.$name_gen;

            Multipic::insert([
                'image'=>$last_img,
                'created_at'=>Carbon::now()
            ]);
        }
        return Redirect()->back()->with('success','Brand Inserted Successfully');
    }
}


































































