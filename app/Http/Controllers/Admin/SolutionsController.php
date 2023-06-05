<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\OurSolution;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;
use Intervention\Image\Facades\Image;

class SolutionsController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth:admin');
    }

    public function index()
    {
        $solutions = OurSolution::all();
        return view('backend.solutions.index', compact('solutions'));
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
        $image_path = 'uploads/oursolutions/' . $name;

        Image::make($image)
            ->save(public_path() . '/' . $image_path);


        $solutions = new OurSolution();
        $solutions->image = $image_path;
        $solutions->header = $request->header;
        $solutions->description = $request->description;
        $solutions->status = $request->status;
        $solutions->save();

        $notification = array('messege' => 'Created successfully', 'alert-type' => 'success');

        return redirect()->route('admin.solutions.index')->with($notification);
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

        $solutions = OurSolution::find($id);

        if ($request->image) {
            $old_image = $solutions->image;
            $image = $request->image;
            $extention = $image->getClientOriginalExtension();
            $name = 'company-service-' . date('Y-m-d-h-i-s-') . rand(999, 9999) . '.' . $extention;
            $image_path = 'uploads/oursolutions/' . $name;

            Image::make($image)
                ->save(public_path() . '/' . $image_path);

            $solutions->image = $image_path;
            $solutions->save();
            if (File::exists(public_path() . '/' . $old_image)) unlink(public_path() . '/' . $old_image);
        }

        $solutions->header = $request->header;
        $solutions->description = $request->description;
        $solutions->status = $request->status;
        $solutions->save();

        $notification = array('messege' => 'Updated successfully', 'alert-type' => 'success');

        return redirect()->route('admin.solutions.index')->with($notification);
    }

    public function destroy($id)
    {
        $solutions = OurSolution::find($id);
        $old_image = $solutions->image;
        $solutions->delete();

        if (File::exists(public_path() . '/' . $old_image)) unlink(public_path() . '/' . $old_image);
        $notification = array('messege' => 'Deleted successfully', 'alert-type' => 'success');

        return redirect()->route('admin.solutions.index')->with($notification);
    }

    public function changeStatus($id)
    {
        $solutions = OurSolution::find($id);
        if ($solutions->status == 1) {
            $solutions->status = 0;
            $message = 'Inactive successfully';
        } else {
            $solutions->status = 1;
            $message = 'Active successfully';
        }
        $solutions->save();
        return response()->json($message);
    }
}
