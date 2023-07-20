<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AdminController extends Controller
{
    public function index()
    {
        return view('admin.login');
    }

    public function adminHome()
    {
        return view('admin.dashboard');
    }

    public function table()
    {
        return view('admin.table');
    }
}
