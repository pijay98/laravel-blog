<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use Spatie\Permission\Models\Role;

class UserController extends Controller
{
    public $roles;
    public function __construct()
    {

        $this->roles = Role::all();
    }
    public function ins()
    {

        $users = User::all();
        return view('backpanel.users.index', compact('users'));
    }

    public function create()
    {

        return view('backpanel.users.create')->with('roles', $this->roles);
    }

    public function store(Request $request)
    {
        $users = new User;
        $users->name = $request->name;
        $users->email = $request->email;
        $users->password = bcrypt($request->password);
        $users->assignRole($request->role_id);
        $users->addMedia($request->avatar)->toMediaCollection('user_avatar');
        $users->save();

        return redirect(route('user.index'))->with('success', $users->name . 'User created successfully');
    }

    public function edit($id)
    {
        $users = User::find($id);
        return view('backpanel.users.edit', compact('users'))->with('roles', $this->roles);
    }

    public function update(Request $request, $id)
    {

        $users = User::find($id);
        $users->name = $request->name;
        $users->email = $request->email;
        $users->password = bcrypt($request->password);
        $users->syncRoles([$request->role_id]);
        $users->update();

        return redirect(route('user.index'))->with('success', $users->name . "User updated successfully");
    }

    public function destroy($id)
    {

        $users = User::find($id);
        $users->delete();

        return redirect(route('user.index'))->with('success', $users->name . "User deleted successfully");
    }
}