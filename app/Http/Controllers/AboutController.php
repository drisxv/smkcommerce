<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Services\AboutService;
use App\Services\InformationService;
use App\Services\ContactService;

class AboutController extends Controller
{
    protected AboutService $service;
    protected InformationService $informationService;
    protected ContactService $contactService;

    public function __construct(
        InformationService $informationService,
        ContactService $contactService,
        AboutService $service
    ) {
        $this->informationService = $informationService;
        $this->contactService = $contactService;
        $this->service = $service;
    }

    // Daftar About
    public function index()
    {
        $abouts = $this->service->list(15);
        return view('admin.settings.index', compact('abouts', 'informations', 'contacts'));
    }

    // Form create
    public function create()
    {
        return view('admin.abouts.create');
    }

    // Simpan baru
    public function store(Request $request)
    {
        $data = $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'required|string',
        ]);

        $this->service->store($data);

        return redirect()->route('admin.settings.index')->with('success', 'About berhasil ditambahkan.');
    }

    // Show detail
    public function show($id)
    {
        $about = $this->service->get($id);
        return view('admin.abouts.show', compact('about'));
    }

    // Form edit
    public function edit($id)
    {
        $about = $this->service->get($id);
        return view('admin.abouts.edit', compact('about'));
    }

    // Update
    public function update(Request $request, $id)
    {
        $data = $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'required|string',
        ]);

        $this->service->update($id, $data);

        return redirect()->route('admin.settings.index')->with('success', 'About berhasil diupdate.');
    }

    // Hapus
    public function destroy($id)
    {
        $this->service->destroy($id);
        return redirect()->route('admin.settings.index')->with('success', 'About berhasil dihapus.');
    }
}
