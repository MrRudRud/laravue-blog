<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Role;
use App\Permission;
use Session;

class RoleController extends Controller
{

    public function index()
    {
        $roles = Role::all();
        return view('manage.roles.index')->withRoles($roles);
    }

    public function create()
    {
        $permission = Permission::all();
        return view('manage.roles.create')->withPermission($permission);
    }

    public function store(Request $request)
    {
        $this->validate($request, [
            'display_name' => 'required|max:255',
            'name' => 'required|max:100|alpha_dash|unique:permissions,name',
            'description' => 'sometimes|max:255'
        ]);

        $role = new Role();
        $role->display_name = $request->display_name;
        $role->name = $request->name;
        $role->description = $request->description;
        $role->save();

        if($request->permissions) {
            $role->syncPermissions(explode(',', $request->permissions));
        }

        Session::flash('success', 'Successfully create the new '. $role->display_name. ' role in database');
        return redirect()->route('roles.show', $role->id);
    }

    public function show($id)
    {
        $role = Role::findOrFail($id);
        return view('manage.roles.show')->withRole($role);
    }

    public function edit($id)
    {
        $role = Role::findOrFail($id);
        $permission = Permission::all();
        return view('manage.roles.edit')
        ->withRole($role)
        ->withPermission($permission);
    }

    public function update(Request $request, $id)
    {
        $this->validate($request, [
            'display_name' => 'required|max:255',
            'description' => 'sometimes|max:255'
        ]);

        $role = Role::findOrFail($id);
        $role->display_name = $request->display_name;
        $role->description = $request->description;
        $role->save();

        if($request->permissions) {
            $role->syncPermissions(explode(',', $request->permissions));
        }

        Session::flash('success', 'Successfully update the '. $role->display_name. ' role in database');
        return redirect()->route('roles.show', $id);

    }

    public function destroy($id)
    {
        //
    }
}
