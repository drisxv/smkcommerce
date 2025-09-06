<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AdminController extends Controller
{
    function index()
    {
        return view('admin.home');
    }
    function vendor()
    {
        return view('admin.vendor');
    }
    function partnership()
    {
        return view('admin.partnership');
    }
    function about()
    {
        return view('admin.about');
    }
}
