<?php

namespace App\Http\Controllers;

use App\Models\Vendor;
use App\Services\VendorService;
use Illuminate\Http\Request;

class VendorController extends Controller
{
    protected VendorService $vendorService;

    public function __construct(VendorService $vendorService)
    {
        $this->vendorService = $vendorService;
    }

    public function index()
    {
        $vendors = Vendor::paginate(10);
        return view('admin.vendors.index', compact('vendors'));
    }

    public function create()
    {
        return view('admin.vendors.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'title'             => 'required|string|max:255',
            'description'       => 'nullable|string',
            'visit_website_url' => 'nullable|url',
            'logo'              => 'nullable|image|max:2048',
        ]);

        $this->vendorService->createVendor($request);

        return redirect()->route('admin.vendors.index')->with('success', 'Vendor berhasil ditambahkan');
    }

    public function edit(Vendor $vendor)
    {
        return view('admin.vendors.edit', compact('vendor'));
    }

    public function update(Request $request, Vendor $vendor)
    {
        $request->validate([
            'title'             => 'required|string|max:255',
            'description'       => 'nullable|string',
            'visit_website_url' => 'nullable|url',
            'logo'              => 'nullable|image|max:2048',
        ]);

        $this->vendorService->updateVendor($request, $vendor);

        return redirect()->route('admin.vendors.index')->with('success', 'Vendor berhasil diupdate');
    }

    public function destroy(Vendor $vendor)
    {
        $this->vendorService->deleteVendor($vendor);

        return redirect()->route('admin.vendors.index')->with('success', 'Vendor berhasil dihapus');
    }
}
