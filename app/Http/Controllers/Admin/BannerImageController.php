<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\BannerImage;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;
use Intervention\Image\Facades\Image;

class BannerImageController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth:admin');
    }

    public function bannerImage()
    {
        $images = BannerImage::where('image_type', 1)->get();
        return view('backend.banner-image.index', compact('images'));
    }
    public function BannerUpdate(Request $request, $id)
    {
        $rules = [
            'image' => 'required',
        ];
        $customMessages = [
            'image.required' => 'Image is required',
        ];
        $this->validate($request, $rules, $customMessages);


        $banner_image = BannerImage::find($id);
        if ($banner_image) {
            $old_image = $banner_image->image;
            $image = $request->image;
            $extention = $image->getClientOriginalExtension();
            $name = 'banner-' . date('Y-m-d-h-i-s-') . rand(999, 9999) . '.' . $extention;
            $image_path = 'uploads/bannerimages/' . $name;

            Image::make($image)
                ->save(public_path() . '/' . $image_path);

            $banner_image->image = $image_path;
            $banner_image->save();
            if (File::exists(public_path() . '/' . $old_image)) unlink(public_path() . '/' . $old_image);
            $notification = array('messege' => 'Updated successfully', 'alert-type' => 'success');

            return back()->with($notification);
        } else {
            return back();
        }
    }


    public function LoginImage()
    {
        $images = BannerImage::where('image_type', 2)->get();
        return view('backend.banner-image.login.index', compact('images'));
    }

    public function updateLogin(Request $request, $id)
    {
        $rules = [
            'image' => 'required',
        ];
        $customMessages = [
            'image.required' => 'Image is required',
        ];
        $this->validate($request, $rules, $customMessages);

        $login_image = BannerImage::find($id);
        if ($login_image) {
            $old_image = $login_image->image;
            $image = $request->image;
            $extention = $image->getClientOriginalExtension();
            $name = 'login-' . date('Y-m-d-h-i-s-') . rand(999, 9999) . '.' . $extention;
            $image_path = 'uploads/bannerimages/' . $name;

            Image::make($image)
                ->save(public_path() . '/' . $image_path);

            $login_image->image = $image_path;
            $login_image->save();
            if (File::exists(public_path() . '/' . $old_image)) unlink(public_path() . '/' . $old_image);
            $notification = array('messege' => 'Updated successfully', 'alert-type' => 'success');
            return back()->with($notification);
        } else {
            return back();
        }
    }

    public function profileImageIndex()
    {
        $images = BannerImage::where('image_type', 3)->get();
        return view('backend.banner-image.profile.index', compact('images'));
    }

    public function updateProfileImage(Request $request, $id)
    {
        $rules = [
            'image' => 'required',
        ];
        $customMessages = [
            'image.required' => 'Image is required',
        ];
        $this->validate($request, $rules, $customMessages);

        $default_profile = BannerImage::find($id);
        if ($default_profile) {
            $old_image = $default_profile->image;
            $image = $request->image;
            $extention = $image->getClientOriginalExtension();
            $name = 'login-' . date('Y-m-d-h-i-s-') . rand(999, 9999) . '.' . $extention;
            $image_path = 'uploads/bannerimages/' . $name;

            Image::make($image)
                ->save(public_path() . '/' . $image_path);

            $default_profile->image = $image_path;
            $default_profile->save();

            if (File::exists(public_path() . '/' . $old_image)) unlink(public_path() . '/' . $old_image);
            $notification = array('messege' => 'Updated successfully', 'alert-type' => 'success');

            return back()->with($notification);
        } else {
            return back();
        }
    }

    public function bgIndex()
    {
        $images = BannerImage::where('image_type', 3)->get();
        return view('backend.banner-image.bg-index', compact('images'));
    }

    public function updateBg(Request $request, $id)
    {
        $rules = [
            'image' => 'required',
        ];
        $customMessages = [
            'image.required' => 'Image is required',
        ];
        $this->validate($request, $rules, $customMessages);

        $bg_image = BannerImage::find($id);
        if ($bg_image) {
            $old_image = $bg_image->image;
            $image = $request->image;
            $extention = $image->getClientOriginalExtension();
            $name = 'login-' . date('Y-m-d-h-i-s-') . rand(999, 9999) . '.' . $extention;
            $image_path = 'uploads/bannerimages/' . $name;
            $bg_image->image = $image_path;
            $bg_image->save();
            if (File::exists(public_path() . '/' . $old_image)) unlink(public_path() . '/' . $old_image);
            $notification = array('messege' => 'Updated successfully', 'alert-type' => 'success');

            return back()->with($notification);
        } else {
            return back();
        }
    }
}
