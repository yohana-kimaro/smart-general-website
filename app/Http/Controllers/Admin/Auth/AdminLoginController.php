<?php

namespace App\Http\Controllers\Admin\Auth;

use App\Http\Controllers\Controller;
use App\Models\User;
use App\Providers\RouteServiceProvider;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class AdminLoginController extends Controller
{
    use AuthenticatesUsers;

    /**
     * Where to redirect users after login.
     *
     * @var string
     */
    protected $redirectTo = RouteServiceProvider::ADMIN;

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest:admin')->except('adminLogout');
    }


    public function adminLoginForm()
    {
        $isAdmin = User::all()->count();
        return view('backend.auth.signin', compact('isAdmin'));
    }

    public function storeLoginInfo(Request $request)
    {
        $rules = [
            'email' => 'required|email',
            'password' => 'required',
        ];

        $customMessages = [
            'email.required' => 'Email is required',
            'email.email' => 'Please enter a valid email',
            'password.required' => 'Password is required',

        ];
        $this->validate($request, $rules);

        $credential = [
            'email' => $request->email,
            'password' => $request->password
        ];

        $isAdmin = User::where('email', $request->email)->first();
        if ($isAdmin) {
            if ($isAdmin->status == 1) {
                if ($isAdmin->admin_type == 1 || $isAdmin->admin_type == 0) {
                    if (Hash::check($request->password, $isAdmin->password)) {
                        if (Auth::guard('admin')->attempt($credential, $request->remember)) {
                            return response()->json(['success' => 'Login successful']);
                        }
                        return response()->json(['error' => 'Something went wrong']);
                    } else {
                        return response()->json(['error' => 'Invalid login credentials']);
                    }
                } else {
                    return response()->json(['error' => 'Something went wrong']);
                }
            } else {
                return response()->json(['error' => 'Inactive user']);
            }
        } else {
            return response()->json(['error' => 'Email does not exist in our records']);
        }
    }

    public function adminLogout()
    {
        Auth::guard('admin')->logout();
        $notification = array('messege' => 'Sign out successfully', 'alert-type' => 'success');
        return redirect()->route('admin.login')->with($notification);
    }
}
