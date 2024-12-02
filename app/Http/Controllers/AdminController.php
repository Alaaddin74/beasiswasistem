<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AdminController extends Controller
{
    //
    public function home()
    {
        $user = auth()->user();

        return view('admin.home', compact('user'));
    }
}
