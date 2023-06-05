<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\AboutUs;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;
use Intervention\Image\Facades\Image;

class AboutController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth:admin');
    }

    public function index()
    {
        $about = AboutUs::all();
        return view('backend.about.index', compact('about'));
    }


    public function store(Request $request)
    {
        $rules = [
            'image' => 'required',
            'header' => 'required',
            'status' => 'required',
            'description' => 'required',
        ];
        $customMessages = [
            'image.required' => 'Image is required',
            'header.required' => 'Title is required',
            'status.required' => 'Status is required',
            'description.required' => 'Description is required',
        ];
        $this->validate($request, $rules, $customMessages);

        // save image
        $image = $request->image;
        $extention = $image->getClientOriginalExtension();
        $name = 'company-logo-' . date('Y-m-d-h-i-s-') . rand(999, 9999) . '.' . $extention;
        $image_path = 'uploads/companylogo/' . $name;

        Image::make($image)
            ->save(public_path() . '/' . $image_path);


        $partner = new AboutUs();
        $partner->image = $image_path;
        $partner->header = $request->header;
        $partner->description = $request->description;
        $partner->status = $request->status;
        $partner->save();

        $notification = array('messege' => 'Created successfully', 'alert-type' => 'success');

        return redirect()->route('admin.about.index')->with($notification);
    }

    public function update(Request $request, $id)
    {
        $rules = [
            'header' => 'required',
            'description' => 'required',
        ];
        $customMessages = [
            'header.required' => 'Title is required',
            'description.required' => 'Description is required',
        ];
        $this->validate($request, $rules, $customMessages);

        $aboutus = AboutUs::find($id);

        if ($request->image) {
            $old_image = $aboutus->image;
            $image = $request->image;
            $extention = $image->getClientOriginalExtension();
            $name = 'company-logo-' . date('Y-m-d-h-i-s-') . rand(999, 9999) . '.' . $extention;
            $image_path = 'uploads/companylogo/' . $name;

            Image::make($image)
                ->save(public_path() . '/' . $image_path);

            $aboutus->image = $image_path;
            $aboutus->save();
            if (File::exists(public_path() . '/' . $old_image)) unlink(public_path() . '/' . $old_image);
        }

        $aboutus->header = $request->header;
        $aboutus->description = $request->description;
        $aboutus->status = $request->status;
        $aboutus->save();

        $notification = array('messege' => 'Updated successfully', 'alert-type' => 'success');

        return redirect()->route('admin.about.index')->with($notification);
    }

    public function destroy($id)
    {
        $aboutus = AboutUs::find($id);
        $old_image = $aboutus->image;
        $aboutus->delete();

        if (File::exists(public_path() . '/' . $old_image)) unlink(public_path() . '/' . $old_image);
        $notification = array('messege' => 'Deleted successfully', 'alert-type' => 'success');

        return redirect()->route('admin.about.index')->with($notification);
    }

    public function changeStatus($id)
    {
        $partner = AboutUs::find($id);
        if ($partner->status == 1) {
            $partner->status = 0;
            $message = 'Inactive successfully';
        } else {
            $partner->status = 1;
            $message = 'Active successfully';
        }
        $partner->save();
        return response()->json($message);
    }
}
