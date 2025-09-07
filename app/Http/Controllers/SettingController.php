<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\About;
use App\Services\AboutService;
use App\Services\InformationService;
use App\Services\ContactService;

class SettingController extends Controller
{
    protected InformationService $informationService;
    protected ContactService $contactService;
    protected AboutService $aboutService;

    public function __construct(
        InformationService $informationService,
        ContactService $contactService,
        AboutService $aboutService
    ) {
        $this->informationService = $informationService;
        $this->contactService = $contactService;
        $this->aboutService = $aboutService;
    }

    /**
     * Tampilkan halaman settings dengan daftar informations dan contacts
     */
    public function index()
    {
        $informations = $this->informationService->list(10); // pagination 10
        $contacts = $this->contactService->list(10); // pagination 10
        $abouts = $this->aboutService->list(10); // pagination 10

        return view('admin.settings.index', compact('informations', 'contacts', 'abouts'));
    }
}
