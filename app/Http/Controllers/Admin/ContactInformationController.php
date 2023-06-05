<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\ContactInformation;
use App\Models\ContactUs;
use Illuminate\Http\Request;

class ContactInformationController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth:admin');
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $contact = ContactInformation::first();
        $contact_us = ContactUs::first();
        return view('backend.contact.contact-information.edit', compact('contact', 'contact_us'));
    }


    public function update(Request $request, ContactInformation $contactInformation)
    {
        $rules = [
            'address' => 'required',
            // 'about'=>'required',
            'phone' => 'required',
            'email' => 'required',
            'map_embed_code' => 'required'
        ];
        $customMessages = [
            'address.required' => 'Address is required',
            // 'about.required' => 'About is required',
            'phone.required' => 'Phone number is required',
            'email.required' => 'Email is required',
            'map_embed_code.required' => 'Map embed code is required',
        ];
        $this->validate($request, $rules, $customMessages);

        ContactInformation::where('id', $contactInformation->id)->update([
            'address' => $request->address,
            'about' => "about",
            'phones' => $request->phone,
            'emails' => $request->email,
            'map_embed_code' => $request->map_embed_code,
        ]);
        $notification = array('messege' => 'Updated successfully', 'alert-type' => 'success');

        return redirect()->route('admin.contact-information.index')->with($notification);
    }



    public function topbarContact(Request $request, $id)
    {
        $contact = ContactUs::find($id);
        $contact->topbar_phone = $request->topbar_phone;
        $contact->topbar_email = $request->topbar_email;
        $contact->save();
        $notification = array('messege' => 'Updated successfully', 'alert-type' => 'success');

        return redirect()->route('admin.contact-information.index')->with($notification);
    }

    public function footerContact(Request $request, $id)
    {
        $contact = ContactUs::find($id);
        $contact->footer_phone = $request->footer_phone;
        $contact->footer_email = $request->footer_email;
        $contact->footer_address = $request->footer_address;
        $contact->save();
        $notification = array('messege' => 'Updated successfully', 'alert-type' => 'success');
        return redirect()->route('admin.contact-information.index')->with($notification);
    }

    public function socialLink(Request $request, $id)
    {
        $contact = ContactUs::find($id);
        $contact->facebook = $request->facebook;
        $contact->twitter = $request->twitter;
        $contact->youtube = $request->youtube;
        $contact->linkedin = $request->linkedin;
        $contact->instagram = $request->instagram;
        $contact->save();
        $notification = array('messege' => 'Updated successfully', 'alert-type' => 'success');

        return redirect()->route('admin.contact-information.index')->with($notification);
    }
}
