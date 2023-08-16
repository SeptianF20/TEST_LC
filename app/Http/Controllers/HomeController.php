<?php

namespace App\Http\Controllers;

use App\Helpers\Helper;
use App\Http\Requests\LoginRequest;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;

class HomeController extends Controller
{
    public function login()
    {
        $userRole = (!empty(Auth::user()->role)) ? Auth::user()->role : null;
        if(!empty($userRole)) return redirect('/search');
        return view("login");
    }

    public function logout()
    {
        request()->session()->invalidate();
        return redirect('/')->with('success','Anda berhasil logout');
    }

    public function forbidden()
    {
        request()->session()->invalidate();
        return redirect('/')->with('danger','Anda tidak diizinkan mengakses halaman sebelumnya');
    }

    public function authenticate(LoginRequest $request)
    {
        if (Auth::attempt(["email" => $request->email, "password" => $request->password])) {
            $request->session()->regenerate();
            return redirect('/search');
        }

        return back()->with('danger','Oops! Data Login tidak valid');
    }

}
