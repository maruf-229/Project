<?php

namespace App\Http\Controllers;

use App\Models\Slider;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
use Image;

class HomeController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function homeSlider(){
        $sliders=Slider::all();
        return view('admin.slider.index',compact('sliders'));
    }

    public function addSlider(){
        return view('admin.slider.create');
    }

    public function storeSlider(Request $request){

        $request->validate([
            'title' => 'required',
            'description' => 'required',
            'image' => 'required',
        ],
            [
                'title.required' => 'Please Enter Slider Title',
                'description.required' => 'Please Enter Slider Short Description',
                'image.required' => 'Image is Required',
            ]);

        $slider_image = $request->file('image');

        $name_gen = hexdec(uniqid()).'.'.$slider_image->getClientOriginalExtension();
        Image::make($slider_image)->resize(1920,1088)->save('image/slider/'.$name_gen);
        $last_img='image/slider/'.$name_gen;

        Slider::insert([
            'title'=>$request->title,
            'description'=>$request->description,
            'image'=>$last_img
        ]);

        return Redirect()->route('home.slider')->with('success','Slider Inserted Successfully');

    }

    public function editSlider($id){
        $sliders=Slider::find($id);
        return view('admin.slider.edit',compact('sliders'));
    }

    public function updateSlider(Request $request,$id){
        $request->validate([
            'title' => 'required',
            'description' => 'required',
        ],
            [
                'title.required' => 'Please Enter Slider Title',
                'description.required' => 'Please Enter Slider Short Description',
            ]);

        $old_image=$request->old_image;

        $slider_image = $request->file('image');

        if ($slider_image){

            $name_gen = hexdec(uniqid()).'.'.$slider_image->getClientOriginalExtension();
            Image::make($slider_image)->resize(1920,1088)->save('image/slider/'.$name_gen);
            $last_img='image/slider/'.$name_gen;

            unlink($old_image);

            Slider::find($id)->update([
                'title'=>$request->title,
                'description'=>$request->description,
                'image'=>$last_img
            ]);

            return Redirect()->route('home.slider')->with('success','Slider Updated Successfully');
        }

        else{
            Slider::find($id)->update([
                'title'=>$request->title,
                'description'=>$request->description,
            ]);

            return Redirect()->route('home.slider')->with('success','Slider Updated Successfully');
        }
    }

    public function deleteSlider($id){
        $image=Slider::find($id);
        $old_image=$image->image;
        unlink($old_image);

        Slider::find($id)->delete();
        return Redirect()->back()->with('success','Slider Deleted Successfully');
    }
}
