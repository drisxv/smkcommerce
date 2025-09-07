<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Services\ContactService;
use App\Services\InformationService;

class ContactController extends Controller
{
    protected InformationService $informationService;
    protected ContactService $contactService;

    public function __construct(
        InformationService $informationService,
        ContactService $contactService
    ) {
        $this->informationService = $informationService;
        $this->contactService = $contactService;
    }

    /**
     * Tampilkan daftar contact
     */
    public function index()
    {
        $contacts = $this->contactService->list(10);
        return view('admin.settings.index', compact('informations', 'contacts'));
    }

    /**
     * Tampilkan form create
     */
    public function create()
    {
        return view('admin.contacts.create');
    }

    /**
     * Simpan contact baru
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'address' => 'required|string',
            'email' => 'nullable|email|max:255',
            'phone_number' => 'nullable|string|max:50',
            'social_media' => 'nullable|string|max:255',
        ]);

        $this->contactService->store($request->only([
            'name',
            'address',
            'email',
            'phone_number',
            'social_media'
        ]));

        return redirect()->route('admin.settings.index')->with('success', 'Contact berhasil ditambahkan.');
    }

    /**
     * Tampilkan detail contact
     */
    public function show($id)
    {
        $contact = $this->contactService->get($id);

        if (!$contact) {
            return redirect()->route('admin.contacts.index')->with('error', 'Contact tidak ditemukan.');
        }

        return view('admin.contacts.show', compact('contact'));
    }

    /**
     * Tampilkan form edit
     */
    public function edit($id)
    {
        $contact = $this->contactService->get($id);

        if (!$contact) {
            return redirect()->route('admin.contacts.index')->with('error', 'Contact tidak ditemukan.');
        }

        return view('admin.contacts.edit', compact('contact'));
    }

    /**
     * Update contact
     */
    public function update(Request $request, $id)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'address' => 'required|string',
            'email' => 'nullable|email|max:255',
            'phone_number' => 'nullable|string|max:50',
            'social_media' => 'nullable|string|max:255',
        ]);

        $this->contactService->update($id, $request->only([
            'name',
            'address',
            'email',
            'phone_number',
            'social_media'
        ]));

        return redirect()->route('admin.settings.index')->with('success', 'Contact berhasil diupdate.');
    }

    /**
     * Hapus contact
     */
    public function destroy($id)
    {
        $this->contactService->destroy($id);

        return redirect()->route('admin.settings.index')->with('success', 'Contact berhasil dihapus.');
    }
}
