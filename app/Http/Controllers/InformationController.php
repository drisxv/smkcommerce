<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Services\InformationService;
use App\Services\ContactService;

class InformationController extends Controller
{
    protected InformationService $informationService;
    protected ContactService $contactService;

    public function __construct(InformationService $informationService)
    {
        $this->informationService = $informationService;
    }

    /**
     * Tampilkan daftar informasi
     */
    public function index()
    {
        $informations = $this->informationService->list(10);
        return view('admin.settings.index', compact('informations', 'contacts'));
    }

    /**
     * Tampilkan form create
     */
    public function create()
    {
        return view('admin.informations.create');
    }

    /**
     * Simpan informasi baru
     */
    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'content' => 'required|string',
        ]);

        $this->informationService->store($request->only(['title', 'content']));

        return redirect()->route('admin.settings.index')->with('success', 'Information berhasil ditambahkan.');
    }

    /**
     * Tampilkan detail informasi
     */
    public function show($id)
    {
        $information = $this->informationService->get($id);

        if (!$information) {
            return redirect()->route('admin.informations.index')->with('error', 'Information tidak ditemukan.');
        }

        return view('admin.informations.show', compact('information'));
    }

    /**
     * Tampilkan form edit
     */
    public function edit($id)
    {
        $information = $this->informationService->get($id);

        if (!$information) {
            return redirect()->route('admin.informations.index')->with('error', 'Information tidak ditemukan.');
        }

        return view('admin.informations.edit', compact('information'));
    }

    /**
     * Update informasi
     */
    public function update(Request $request, $id)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'content' => 'required|string',
        ]);

        $this->informationService->update($id, $request->only(['title', 'content']));

        return redirect()->route('admin.settings.index')->with('success', 'Information berhasil diupdate.');
    }

    /**
     * Hapus informasi
     */
    public function destroy($id)
    {
        $this->informationService->destroy($id);

        return redirect()->route('admin.settings.index')->with('success', 'Information berhasil dihapus.');
    }
}
