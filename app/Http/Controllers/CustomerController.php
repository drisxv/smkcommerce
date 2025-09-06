<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Vendor;

class CustomerController extends Controller
{
    public function index()
    {
        $vendors = Vendor::paginate(100);
        return view('welcome', compact('vendors'));
    }
}
