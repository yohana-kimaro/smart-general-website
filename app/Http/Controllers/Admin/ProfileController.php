<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\BannerImage;
use App\Models\ProfilePicture;
use Illuminate\Http\Request;
use Intervention\Image\Facades\Image;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\File;

class ProfileController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth:admin');
    }

    public function myprofile()
    {
        $admin = Auth::guard('admin')->user();
        $default_profile = BannerImage::find(3);
        return view('backend.myprofile.index', compact('admin', 'default_profile'));
    }

    public function updateMyProfile(Request $request)
    {
        $rules = [
            'firstname' => 'required',
            'lastname' => 'required',
            'phonenumber' => 'required',
            'email' => 'required',
            'password' => 'required|same:confirmpassword',
        ];
        $customMessages = [
            'firstname.required' => 'First name is required',
            'lastname.required' => 'Last name is required',
            'email.required' => 'Email is required',
            'password.required' => 'Paasword is required',
            'phonenumber.required' => 'Phone number is required',
        ];
        $this->validate($request, $rules, $customMessages);

        $admin=Auth::guard('admin')->user();

        // inset user profile image
        if ($request->file('image')) {
            $old_image = $admin->image;
            $user_image = $request->image;
            $extention = $user_image->getClientOriginalExtension();
            $image_name = Str::slug($request->firstname) . '-' . Str::slug($request->lastname) . date('-Y-m-d-h-i-s-') . rand(999, 9999) . '.' . $extention;
            $image_name = 'uploads/website-images/myprofilepicture/' . $image_name;

            Image::make($user_image)
                ->save(public_path() . '/' . $image_name);

            $admin->image = $image_name;
            $admin->save();
            if ($old_image) {
                if (File::exists(public_path() . '/' . $old_image)) unlink(public_path() . '/' . $old_image);
            }
        }

        if ($request->password) {
            $user = Auth::user();
            $admin->updated_by = $user->id;
            $admin->firstname = ucfirst($request->firstname);
            $admin->lastname = ucfirst($request->lastname);
            $admin->email = strtolower($request->email);
            $admin->password = Hash::make($request->password);
            $admin->phonenumber = $request->phonenumber;
            $admin->save();
        } else {
            $admin->firstname = ucfirst($request->firstname);
            $admin->lastname = ucfirst($request->lastname);
            $admin->email = strtolower($request->email);
            $admin->address = strtoupper($request->address);
            $admin->phonenumber = $request->phonenumber;
            $admin->save();
        }

        $notification = array('messege' => 'Your information is updated successfully', 'alert-type' => 'success');
        return redirect()->route('admin.my-profile')->with($notification);
    }
}
