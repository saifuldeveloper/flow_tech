<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Admin;
use Illuminate\Support\Facades\DB;

class AdminController extends Controller
{
    public function adminLoginForm()
    {
        return view('backend.admin.admin_login');
    }

    public function adminLogin(Request $request)
    {
        $request->validate([
            'email' => 'required',
            'password' => 'required',
        ]);

        $credentials = $request->only('email', 'password');

        if (Auth::guard('admin')->attempt($credentials)) {
            $request->session()->regenerate();
            return redirect()->intended('admin/dashboard');
        } else {
            return back()->withErrors([
                'email' => 'The provided credentials do not match our records.',
            ]);
        }
    }

    public function adminPasswordReset()
    {
        return view('backend.admin.admin_pass_reset');
    }

    public function adminPasswordStore(Request $request)
    {
        $request->validate([
            'old_password' => 'required',
            'password' => 'required',
            'password_confirmation' => 'required|same:password',
        ]);

        $admin = Admin::find(Auth::guard('admin')->user()->id);

        if (password_verify($request->old_password, $admin->password)) {
            $admin->password = bcrypt($request->password);
            $admin->save();

            Auth::guard('admin')->logout();

            return redirect()->back()->with('success', 'Password changed successfully.');
        } else {
            return redirect()->back()->with('error', 'Old password does not match.');
        }
    }


    public function adminLogout()
    {
        Auth::guard('admin')->logout();
        return redirect('admin/login');
    }
}
