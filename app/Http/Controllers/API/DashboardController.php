<?php

namespace App\Http\Controllers\API;


use Illuminate\Http\Request;

class DashboardController extends BaseController
{
    public function dashboard(Request $request)
    {
        return view('dashboard');
    }

    public function welcome(Request $request)
    {
        if(auth()->user())
            return view('dashboard');
        else
            return view('auth.login');
    }
}
