<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class IndexController extends Controller
{
    //
    public function register()
    {
        return view('register');
    }
    public function data(Request $request)
    {
        dd($request->all());
    }
}
