<?php

namespace App\Http\Controllers;

use App\Models\Admin;
use Illuminate\Http\Request;
class AdminController extends Controller
{
    public function showAdminLoginForm()
    {
        return view('backend.auth.login');
    }

    public function login(Request $request)
    {
        $this->validate($request, [
         'email' => 'required|email',
         'password' => 'required',
        ]);

        $admin = Admin::where('email', $request->email)->first();
        if(!$admin){
            session()->flash('error', 'Your email invalid');
            return redirect()->back();
        }else{
            if(password_verify($request->password,$admin->password)){
                session()->put('adminId',$admin->id);
                session()->put('adminName',$admin->name);
                return redirect('/admin/dashboard');
            }else{
                session()->flash('error', 'Password not match');
                return redirect()->back();
            }
        }
    }
    public function dashboard()
    {
        return view('backend.home.index');
    }

    public function adminLogout()
    {
        session()->flush();
        return redirect('/admin/login');
    }
}
