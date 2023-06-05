<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\OurProject;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;
use Intervention\Image\Facades\Image;

class ProjectsController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth:admin');
    }

    public function index()
    {
        $projects = OurProject::all();
        return view('backend.projects.index', compact('projects'));
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
        $image_path = 'uploads/ourprojects/' . $name;

        Image::make($image)
            ->save(public_path() . '/' . $image_path);


        $projects = new OurProject();
        $projects->image = $image_path;
        $projects->header = $request->header;
        $projects->description = $request->description;
        $projects->status = $request->status;
        $projects->save();

        $notification = array('messege' => 'Created successfully', 'alert-type' => 'success');

        return redirect()->route('admin.projects.index')->with($notification);
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

        $projects = OurProject::find($id);

        if ($request->image) {
            $old_image = $projects->image;
            $image = $request->image;
            $extention = $image->getClientOriginalExtension();
            $name = 'company-service-' . date('Y-m-d-h-i-s-') . rand(999, 9999) . '.' . $extention;
            $image_path = 'uploads/ourprojects/' . $name;

            Image::make($image)
                ->save(public_path() . '/' . $image_path);

            $projects->image = $image_path;
            $projects->save();
            if (File::exists(public_path() . '/' . $old_image)) unlink(public_path() . '/' . $old_image);
        }

        $projects->header = $request->header;
        $projects->description = $request->description;
        $projects->status = $request->status;
        $projects->save();

        $notification = array('messege' => 'Updated successfully', 'alert-type' => 'success');

        return redirect()->route('admin.projects.index')->with($notification);
    }

    public function destroy($id)
    {
        $projects = OurProject::find($id);
        $old_image = $projects->image;
        $projects->delete();

        if (File::exists(public_path() . '/' . $old_image)) unlink(public_path() . '/' . $old_image);
        $notification = array('messege' => 'Deleted successfully', 'alert-type' => 'success');

        return redirect()->route('admin.projects.index')->with($notification);
    }

    public function changeStatus($id)
    {
        $projects = OurProject::find($id);
        if ($projects->status == 1) {
            $projects->status = 0;
            $message = 'Inactive successfully';
        } else {
            $projects->status = 1;
            $message = 'Active successfully';
        }
        $projects->save();
        return response()->json($message);
    }
}
