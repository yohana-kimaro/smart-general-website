<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\HomepageSlider;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;
use Intervention\Image\Facades\Image;

class SliderController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth:admin');
    }

    public function index()
    {
        $sliders = HomepageSlider::orderBy('title', 'asc')->get();
        return view('backend.sliders.index', compact('sliders'));
    }

    public function store(Request $request)
    {
        $rules = [
            'title' => 'required',
            'rank' => 'required|numeric',
            'image' => 'required',            
            'status' => 'required'
        ];
        $customMessages = [
            'title.required' => 'Title is required',
            'rank.required' => 'Rank number is required',
            'image.required' => 'Image is required',            
            'status.required' => 'Status is required',
        ];
        $this->validate($request, $rules, $customMessages);

        $slider = new HomepageSlider();
        if ($request->image) {
            $image = $request->image;
            $extention = $image->getClientOriginalExtension();
            $name = 'slider-' . date('Y-m-d-h-i-s-') . rand(999, 9999) . '.' . $extention;
            $image_path = 'uploads/homepagesliders/' . $name;
            Image::make($image)
                ->save(public_path() . '/' . $image_path);
        }

        $slider->image = $image_path;
        $slider->title = $request->title;
        $slider->rank = $request->rank;
        $slider->status = $request->status;
        $slider->save();

        $notification = array('messege' => 'Slider created successfully', 'alert-type' => 'success');
        return back()->with($notification);
    }

    public function update(Request $request, $id)
    {
        $rules = [
            'title' => 'required',
            'rank' => 'required|numeric'
        ];
        $customMessages = [
            'title.required' => 'Title is required',
            'rank.required' => 'Rank number is required',
        ];
        $this->validate($request, $rules, $customMessages);

        $slider = HomepageSlider::find($id);

        if ($request->image) {
            $old_slider = $slider->image;
            $image = $request->image;
            $extention = $image->getClientOriginalExtension();
            $name = 'slider-' . date('Y-m-d-h-i-s-') . rand(999, 9999) . '.' . $extention;
            $image_path = 'uploads/homepagesliders/' . $name;
            Image::make($image)
                ->save(public_path() . '/' . $image_path);

            $slider->image = $image_path;
            $slider->save();
            if (File::exists(public_path() . '/' . $old_slider)) unlink(public_path() . '/' . $old_slider);
        }

        $slider->title = $request->title;
        $slider->rank = $request->rank;
        $slider->status = $request->status;
        $slider->save();

        $notification = array('messege' => 'Slider updated successfully', 'alert-type' => 'success');
        return back()->with($notification);
    }

    public function destroy($id)
    {
        $slider = HomepageSlider::find($id);
        $exist_slider = $slider->image;
        $slider->delete();
        if (File::exists(public_path() . '/' . $exist_slider)) unlink(public_path() . '/' . $exist_slider);
        $notification = array('messege' => 'Slider deleted successfully', 'alert-type' => 'success');
        return back()->with($notification);
    }

    public function changeStatus($id)
    {
        $slider = HomepageSlider::find($id);
        if ($slider->status == 1) {
            $slider->status = 0;
            $message = 'Inactive successfully';
        } else {
            $slider->status = 1;
            $message = 'Active successfully';
        }
        $slider->save();
        return response()->json($message);
    }
}
