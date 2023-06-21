<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;


class RoleController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $roles = Role::all();
        return view('backpanel.roles.index', compact('roles'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('backpanel.roles.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $roles = new Role;
        $roles->name = $request->name;
        $roles->save();

        return redirect(route('role.index'))->with('success', 'Role added successfully');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $roles = Role::find($id);
        return view('backpanel.roles.edit', compact('roles'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $roles = Role::find($id);
        $roles->name = $request->name;
        $roles->save();

        return redirect(route('role.index'))->with('success', 'Role updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $roles = Role::find($id);
        $roles->delete();

        return redirect(route('role.index'))->with('success', 'Role deleted successfully');
    }

    public function assignpermission(Role $role)
    {

        $permissions = Permission::all();
        return view('backpanel.roles.assign-permission', compact('role', 'permissions'));
    }

    public function permissionstore(Request $request, Role $role)
    {

        $role->syncPermissions($request->permission);
        return redirect(route('permission.index'))->with('success', 'Added Successfully');
    }
}