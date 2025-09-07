<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Services\PartnershipService;

class PartnershipController extends Controller
{
    protected PartnershipService $service;

    public function __construct(PartnershipService $service)
    {
        $this->service = $service;
    }

    // List partnership
    public function index()
    {
        $partnerships = $this->service->list(15); // pagination 15
        return view('admin.partnerships.index', compact('partnerships'));
    }

    // Show create form
    public function create()
    {
        return view('admin.partnerships.create');
    }

    // Store new partnership
    public function store(Request $request)
    {
        $data = $request->validate([
            'title' => 'required|string|max:255',
            'partner_url' => 'required|url|max:255',
        ]);

        $this->service->store($data);

        return redirect()->route('admin.partnerships.index')->with('success', 'Partnership berhasil ditambahkan!');
    }

    // Show edit form
    public function edit($id)
    {
        $partnership = $this->service->get($id);
        return view('admin.partnerships.edit', compact('partnership'));
    }

    // Update partnership
    public function update(Request $request, $id)
    {
        $data = $request->validate([
            'title' => 'required|string|max:255',
            'partner_url' => 'required|url|max:255',
        ]);

        $this->service->update($id, $data);

        return redirect()->route('admin.partnerships.index')->with('success', 'Partnership berhasil diupdate!');
    }

    // Delete partnership
    public function destroy($id)
    {
        $this->service->destroy($id);
        return redirect()->route('admin.partnerships.index')->with('success', 'Partnership berhasil dihapus!');
    }
}
