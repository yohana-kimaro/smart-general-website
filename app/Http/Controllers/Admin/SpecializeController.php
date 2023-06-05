<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Specialize;
use Illuminate\Http\Request;

class SpecializeController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth:admin');
    }

    public function index()
    {
        $specialize = Specialize::all();
        return view('backend.specialize.index', compact('specialize'));
    }


    public function store(Request $request)
    {
        $rules = [
            'header' => 'required',
            'status' => 'required',
            'description' => 'required',
        ];
        $customMessages = [
            'header.required' => 'Title is required',
            'status.required' => 'Status is required',
            'description.required' => 'Description is required',
        ];
        $this->validate($request, $rules, $customMessages);
        $partner = new Specialize();
        $partner->header = $request->header;
        $partner->description = $request->description;
        $partner->status = $request->status;
        $partner->save();

        $notification = array('messege' => 'Created successfully', 'alert-type' => 'success');

        return redirect()->route('admin.specialize.index')->with($notification);
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

        $specialize = Specialize::find($id);
        $specialize->header = $request->header;
        $specialize->description = $request->description;
        $specialize->status = $request->status;
        $specialize->save();

        $notification = array('messege' => 'Updated successfully', 'alert-type' => 'success');

        return redirect()->route('admin.specialize.index')->with($notification);
    }

    public function destroy($id)
    {
        $specialize = Specialize::find($id);
        $old_image = $specialize->image;
        $specialize->delete();
        $notification = array('messege' => 'Deleted successfully', 'alert-type' => 'success');

        return redirect()->route('admin.specialize.index')->with($notification);
    }

    public function changeStatus($id)
    {
        $partner = Specialize::find($id);
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
