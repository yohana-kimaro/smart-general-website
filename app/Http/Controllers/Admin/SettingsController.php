<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\ModalConsent;
use App\Models\Setting;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;
use Intervention\Image\Facades\Image;

class SettingsController extends Controller
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
        $setting = Setting::first();
        if ($setting) {
            return view('backend.settings.index', compact('setting'));
        }
    }

    public function update(Request $request, Setting $setting)
    {
        // for logo
        if ($request->logo) {
            $old_logo = $setting->logo;
            $image = $request->logo;
            $ext = $image->getClientOriginalExtension();
            $logo_name = 'logo-' . date('Y-m-d-h-i-s-') . rand(999, 9999) . '.' . $ext;
            $logo_name = 'uploads/companyicons/' . $logo_name;
            $logo = Image::make($image)
                ->save(public_path() . '/' . $logo_name);
            $setting->logo = $logo_name;
            $setting->save();
            if (File::exists(public_path() . '/' . $old_logo)) unlink(public_path() . '/' . $old_logo);
        }

        // for favicon
        if ($request->favicon) {
            $old_favicon = $setting->favicon;
            $favicon = $request->favicon;
            $ext = $favicon->getClientOriginalExtension();
            $favicon_name = 'favicon-' . date('Y-m-d-h-i-s-') . rand(999, 9999) . '.' . $ext;
            $favicon_name = 'uploads/companyicons/' . $favicon_name;
            Image::make($favicon)
                ->save(public_path() . '/' . $favicon_name);
            $setting->favicon = $favicon_name;
            if (File::exists(public_path() . '/' . $old_favicon)) unlink(public_path() . '/' . $old_favicon);
        }
        $setting->save();
        $notification = array('messege' => 'Updated successfully', 'alert-type' => 'success');
        return redirect()->route('admin.settings.index')->with($notification);
    }


    public function cookieConsentSetting()
    {
        $setting = ModalConsent::first();
        return view('backend.settings.cookie-consent.index', compact('setting'));
    }

    public function updateCookieConsentSetting(Request $request)
    {
        if ($request->allow == 1) {
            $rules = [
                'allow' => 'required',
                'border' => 'required',
                'corners' => 'required',
                'background_color' => 'required',
                'text_color' => 'required',
                'border_color' => 'required',
                'button_color' => 'required',
                'btn_text_color' => 'required',
                'link_text' => 'required',
                'btn_text' => 'required',
                'message' => 'required'
            ];
            $customMessages = [
                'allow.required' => 'Allow is required',
                'border.required' => 'Border is required',
                'corners.required' => 'Corners is required',
                'background_color.required' => 'Background color is required',
                'text_color.required' => 'Text color is required',
                'border_color.required' => 'Border color is required',
                'button_color.required' => 'Button color is required',
                'btn_text_color.required' => 'Button text color is required',
                'link_text.required' => 'Link is required',
                'btn_text.required' => 'Button text is required',
                'message.required' => 'Message is required',
            ];
            $this->validate($request, $rules, $customMessages);
        }

        $modalConsent = ModalConsent::first();
        $modalConsent->status = $request->allow;
        $modalConsent->border = $request->border;
        $modalConsent->corners = $request->corners;
        $modalConsent->background_color = $request->background_color;
        $modalConsent->text_color = $request->text_color;
        $modalConsent->border_color = $request->border_color;
        $modalConsent->btn_bg_color = $request->button_color;
        $modalConsent->btn_text_color = $request->btn_text_color;
        $modalConsent->link_text = $request->link_text;
        $modalConsent->btn_text = $request->btn_text;
        $modalConsent->message = $request->message;
        $modalConsent->save();
        $notification = array('messege' => 'Updated successfully', 'alert-type' => 'success');
        return redirect()->back()->with($notification);
    }
}
