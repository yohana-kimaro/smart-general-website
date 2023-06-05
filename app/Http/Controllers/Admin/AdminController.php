<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\OnOffStatus;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class AdminController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth:admin');
    }

    public function adminList()
    {
        $users = User::all();
        $currentAdmin = Auth::user();
        $onoffstatus = OnOffStatus::get();
        return view('backend.users.index', compact('users', 'currentAdmin', 'onoffstatus'));
    }

    public function storeAdmin(Request $request)
    {
        $rules = [
            'firstname' => 'required',
            'lastname' => 'required',
            'phonenumber' => 'required',
            'email' => 'required|email|unique:users,email',
            'password' => 'required|same:confirmpassword',
            'status' => 'required',
        ];
        $customMessages = [
            'firstname.required' => 'First name is required',
            'lastname.required' => 'Last name is required',
            'phonenumber.required' => 'Phone number is required',
            'email.required' => 'Email is required',
            'password.required' => 'Password is required',
            'confirmpassword.required' => 'Confirm password is required',
            'status.required' => 'Status is required',
        ];
        $this->validate($request, $rules, $customMessages);

        $users = new User();
        $hashepassword = Hash::make($request->password);
        $admin = Auth::user();
        $users->created_by = $admin->id;
        $users->password = $hashepassword;
        $users->firstname = ucfirst($request->firstname);
        $users->lastname = ucfirst($request->lastname);
        $users->phonenumber = $request->phonenumber;
        $users->is_admin = $request->is_admin;
        $users->email = strtolower($request->email);
        $users->status = $request->status;
        $users->save();

        $notification = array('messege' => 'Administrator created successfully', 'alert-type' => 'success');
        return back()->with($notification);
    }


    public function editAdmin($id)
    {
        $users = User::find($id);
        $onoffstatus = OnOffStatus::where('status', 1)->orderBy('id', 'asc')->get();
        return view('backend.users.edit', compact('users', 'onoffstatus'));
    }

    public function updateAdmin(Request $request, $id)
    {
        $rules = [
            'firstname' => 'required',
            'lastname' => 'required',
            'phonenumber' => 'required',
            'email' => 'required|email|unique:users,email,' . $id,
            'status' => 'required',
        ];
        $customMessages = [
            'firstname.required' => 'First name is required',
            'lastname.required' => 'Last name is required',
            'phonenumber.required' => 'Phone number is required',
            'email.required' => 'Email is required',
            'status.required' => 'Status is required',
        ];
        $this->validate($request, $rules, $customMessages);

        $users = User::find($id);
        $admin = Auth::user();
        $users->updated_by = $admin->id;
        $users->firstname = ucfirst($request->firstname);
        $users->lastname = ucfirst($request->lastname);
        $users->phonenumber = $request->phonenumber;
        $users->is_admin = $request->is_admin;
        $users->email = strtolower($request->email);
        $users->status = $request->status;
        $users->save();
        
        $notification = array('messege' => 'Administrator information updated successfully', 'alert-type' => 'success');
        return back()->with($notification);
    }

    public function deleteAdmin($id)
    {
        $userSS = User::where('id', $id)->first();
        $userSS->delete();
        $notification = array('messege' => 'Administrator deleted successfully', 'alert-type' => 'success');
        return back()->with($notification);
    }


    public function changeStatus($id)
    {
        $user = User::find($id);
        if ($user->status == 1) {
            $user->status = 0;
            $message = 'Inactive successfully';
        } else {
            $user->status = 1;
            $message = 'Active successfully';
        }
        $user->save();
        return response()->json($message);
    }
}
