<?php

namespace App\Http\Controllers;

use App\Models\HomeAbout;
use App\Models\Multipic;
use Illuminate\Http\Request;

class AboutController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function homeAbout(){
        $home_about=HomeAbout::all();
        return view('admin.home.index',compact('home_about'));
    }

    public function addAbout(){
        return view('admin.home.create');
    }

    public function storeAbout(Request $request)
    {
        HomeAbout::insert([
            'title' => $request->title,
            'short_des' => $request->short_des,
            'long_des' => $request->long_des,
        ]);
        return Redirect()->route('home.about')->with('success', 'About Inserted Successfully');
    }

    public function editAbout($id){
        $about=HomeAbout::find($id);
        return view('admin.home.edit',compact('about'));
    }

    public function updateAbout(Request $request,$id){
        HomeAbout::find($id)->update([
            'title'=>$request->title,
            'short_des'=>$request->short_des,
            'long_des'=>$request->long_des,
        ]);
        return Redirect()->route('home.about')->with('success','About Updated Successfully');
    }

    public function deleteAbout($id){
        HomeAbout::find($id)->delete();
        return Redirect()->back()->with('success','About Deleted Successfully');
    }


}
