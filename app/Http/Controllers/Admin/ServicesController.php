<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\OurService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;
use Intervention\Image\Facades\Image;

class ServicesController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth:admin');
    }

    public function index()
    {
        $services = OurService::all();
        return view('backend.services.index', compact('services'));
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
        $name = 'company-service-' . date('Y-m-d-h-i-s-') . rand(999, 9999) . '.' . $extention;
        $image_path = 'uploads/ourservices/' . $name;

        Image::make($image)
            ->save(public_path() . '/' . $image_path);


        $services = new OurService();
        $services->image = $image_path;
        $services->header = $request->header;
        $services->description = $request->description;
        $services->status = $request->status;
        $services->save();

        $notification = array('messege' => 'Created successfully', 'alert-type' => 'success');

        return redirect()->route('admin.services.index')->with($notification);
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

        $servicesus = OurService::find($id);

        if ($request->image) {
            $old_image = $servicesus->image;
            $image = $request->image;
            $extention = $image->getClientOriginalExtension();
            $name = 'company-service-' . date('Y-m-d-h-i-s-') . rand(999, 9999) . '.' . $extention;
            $image_path = 'uploads/ourservices/' . $name;

            Image::make($image)
                ->save(public_path() . '/' . $image_path);

            $servicesus->image = $image_path;
            $servicesus->save();
            if (File::exists(public_path() . '/' . $old_image)) unlink(public_path() . '/' . $old_image);
        }

        $servicesus->header = $request->header;
        $servicesus->description = $request->description;
        $servicesus->status = $request->status;
        $servicesus->save();

        $notification = array('messege' => 'Updated successfully', 'alert-type' => 'success');

        return redirect()->route('admin.services.index')->with($notification);
    }

    public function destroy($id)
    {
        $servicesus = OurService::find($id);
        $old_image = $servicesus->image;
        $servicesus->delete();

        if (File::exists(public_path() . '/' . $old_image)) unlink(public_path() . '/' . $old_image);
        $notification = array('messege' => 'Deleted successfully', 'alert-type' => 'success');

        return redirect()->route('admin.services.index')->with($notification);
    }

    public function changeStatus($id)
    {
        $services = OurService::find($id);
        if ($services->status == 1) {
            $services->status = 0;
            $message = 'Inactive successfully';
        } else {
            $services->status = 1;
            $message = 'Active successfully';
        }
        $services->save();
        return response()->json($message);
    }
}
