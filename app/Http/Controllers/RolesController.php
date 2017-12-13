<?php

namespace App\Http\Controllers;

use Auth;
use Bouncer;
use App\Role;
use Illuminate\Http\Request;
use App\Services\NotificationService;
use App\Http\Requests\CreateRoleRequest;
use App\Http\Requests\UpdateRoleRequest;

class RolesController extends Controller
{
    public $perPage;

    public function __construct()
    {
        $this->middleware('manageUsers');

        $this->perPage = request('perPage') ?: 10;
    }

    public function index()
    {
        $roles = Role::paginate($this->perPage);

        return view('role.index', compact('roles'));
    }

    public function create()
    {
    	return view('role.create');
    }

    public function store(CreateRoleRequest $request)
    {
        Role::create($request->only([
            'name',
            'title'
        ]));

    	return redirect()->back()->with('success',
            'New role was added successfully!'
        );
    }

    public function edit($id)
    {
        $role = Role::where('id', $id)->firstOrFail();

        return view('role.edit', compact('role'));
    }

    public function update(UpdateRoleRequest $request)
    {
        $role = Role::where('id', $request->role_id)->firstOrFail();

        $role->update($request->only([
            'name',
            'title'
        ]));

        return redirect()->back()->with('success',
            'Role was updated successfully!'
        );
    }

    public function destroy($id)
    {
        $role = Role::where('id', $id)->firstOrFail();

        $role->delete();

    	return redirect()->back()->with('success',
            'Role was deleted successfully!'
        );
    }
}
