<?php

namespace App\Http\Controllers;

use App\Services\UserService;
use Illuminate\Http\Request;

class UserController extends Controller
{
    protected UserService $service;

    public function __construct(UserService $service)
    {
        $this->service = $service;
    }

    public function index(Request $request)
    {
        $perPage = (int)$request->query('per_page', 15);
        $users = $this->service->list($perPage);

        return view('admin.users.index', compact('users'));
    }

    public function create()
    {
        return view('admin.users.create');
    }

    public function show($id)
    {
        $user = $this->service->get((int)$id);
        if (!$user) {
            abort(404);
        }

        return view('admin.users.show', compact('user'));
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'name'     => 'required|string',
            'email'    => 'required|email|unique:users',
            'password' => 'required|string|min:6',
        ]);
        $data['password'] = bcrypt($data['password']);
        $this->service->store($data);

        return redirect()->route('admin.users.index')->with('success', 'User created successfully');
    }

    public function edit($id)
    {
        $user = $this->service->get((int)$id);
        if (!$user) abort(404);

        return view('admin.users.edit', compact('user'));
    }


    public function update(Request $request, $id)
    {
        $data = $request->only(['name', 'email']);
        $this->service->update((int)$id, $data);

        return redirect()->route('admin.users.index')->with('success', 'User updated successfully');
    }

    public function destroy($id)
    {
        $this->service->destroy((int)$id);

        return redirect()->route('admin.users.index')->with('success', 'User deleted successfully');
    }
}
