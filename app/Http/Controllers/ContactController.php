<?php

namespace App\Http\Controllers;

use App\Models\Contact;
use App\Models\ContactForm;
use App\Models\Multipic;
use Carbon\Carbon;
use Illuminate\Http\Request;

class ContactController extends Controller
{
    public function adminContact(){
        $contacts=Contact::all();
        return view('admin.contact.index',compact('contacts'));
    }

    public function addContact(){
        return view('admin.contact.create');
    }

    public function storeContact(Request $request){
        $request->validate([
            'address' => 'required',
            'email' => 'required',
            'phone' => 'required',
        ],
            [
                'address.required' => 'Please Enter Valid Address',
                'email.required' => 'Please Enter Contact Email',
                'phone.required' => 'Please Enter Contact Phone',
            ]);

        Contact::insert([
            'address'=>$request->address,
            'email'=>$request->email,
            'phone'=>$request->phone,

        ]);

        return Redirect()->route('admin.contact')->with('success','Contact Info Inserted Successfully');
    }

    public function editContact($id){
        $cont=Contact::find($id);
        return view('admin.contact.edit',compact('cont'));
    }

    public function updateContact(Request $request,$id){
        $request->validate([
            'address' => 'required',
            'email' => 'required',
            'phone' => 'required',
        ],
            [
                'address.required' => 'Please Enter Valid Address',
                'email.required' => 'Please Enter Contact Email',
                'phone.required' => 'Please Enter Contact Phone',
            ]);

        Contact::find($id)->update([
            'address'=>$request->address,
            'email'=>$request->email,
            'phone'=>$request->phone,
        ]);
        return Redirect()->route('admin.contact')->with('success','Contact Info Updated Successfully');
    }

    public function deleteContact($id){
        Contact::find($id)->delete();
        return Redirect()->back()->with('success','Contact Info Deleted Successfully');
    }

    public function adminMessage(){
        $messages=ContactForm::all();
        return view('admin.contact.message',compact('messages'));
    }

    public function deleteMessage($id){
        ContactForm::find($id)->delete();
        return Redirect()->back()->with('success','Message Deleted Successfully');
    }

    //home contact

    public function contact(){
        $contacts=Contact::first();
        return view('pages.contact',compact('contacts'));
    }

    public function services(){
        return view('pages.services');
    }

    public function contactForm(Request $request){
        ContactForm::insert([
            'name'=>$request->name,
            'email'=>$request->email,
            'subject'=>$request->subject,
            'message'=>$request->message,
            'created_at'=>Carbon::now()

        ]);

        return Redirect()->route('contact')->with('success','Your Message Sent Successfully');
    }

    public function portfolio(){
        $images=Multipic::all();
        return view('pages.portfolio',compact('images'));
    }
}
