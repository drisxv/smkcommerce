<?php

namespace App\Http\Controllers;

use App\Models\Contact;
use Illuminate\Http\Request;
use App\Models\Vendor;
use App\Models\Partnership;
use App\Models\Information;
use App\Models\About;

class CustomerController extends Controller
{
    public function index()
    {
        $vendors = Vendor::all();
        $partnerships = Partnership::all();
        $informations = Information::all();
        $contacts = Contact::all();
        $abouts = About::all();
        return view('welcome', compact('vendors', 'partnerships', 'informations', 'contacts', 'abouts'));
    }

    public function show($id)
    {
        $information = Information::findOrFail($id);
        $vendors = Vendor::all();
        $partnerships = Partnership::all();
        $informations = Information::all();
        $contacts = Contact::all();
        $abouts = About::all();
        return view('informations', compact('information', 'vendors', 'partnerships', 'informations', 'contacts', 'abouts'));
    }
}
