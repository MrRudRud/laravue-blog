<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use App\Role;
use DB;
use Session;
use Hash;
use Carbon\Carbon;

class UserController extends Controller
{
    public function index()
    {
        $user = User::orderBy('id', 'DESC')->with('roles')->paginate(10);
        return view('manage.users.index')->withUsers($user);
    }

    public function create()
    {
        return view('manage.users.create');
    }

    public function store(Request $request)
    {
        //Validation
        $this->validate($request, [
            'name' => 'required|max:255',
            'email' => 'required|email|unique:users'
        ]);

        // checks password
        if(!empty($request->password)){
            $password = trim($request->password);
        } else {
            # Set the manual password / automatic
            $length = 10;
            $keyspace = '123456789abcdefghijklmnopxrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
            $str = '';
            $max = mb_strlen($keyspace, '8bit') - 1;
            for( $i = 0; $i < $length ; $i++) {
                $str .= $keyspace[random_int(0, $max)];
            }
            $password = $str;
        }

        $user = new User();
        $user->name = $request->name;
        $user->email = $request->email;
        $user->password = Hash::make($password);

        if($user->save()) {
            return redirect()->route('users.show', $user->id);
        } else {
            Session::flash('danger', 'Sorry a problem occoured while crating this user');
            return redirect()->route('users.create');
        }

    }

    public function show($id)
    {
        $user = User::where('id',$id)->with('roles')->first();
        return view('manage.users.show')->withUser($user);
    }

    public function edit($id)
    {
        $roles = Role::all();
        $user = User::where('id', $id)->with('roles')->first();
        return view('manage.users.edit')->withUser($user)->withRoles($roles);
    }

    public function update(Request $request, $id)
    {
        // dd($request->all());
        //Validation
        $this->validate($request, [
            'name' => 'required|max:255',
            'email' => 'required|email|unique:users,email,'.$id
        ]);

        //check condition
        $user = User::findOrFail($id);
        $user->name = $request->name;
        $user->email = $request->email;
        // $user->updated_at = Carbon::now(get_local_time());
        if($request->password_options == 'auto') {
            # Set the auto
            $length = 10;
            $keyspace = '123456789abcdefghijklmnopxrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
            $str = '';
            $max = mb_strlen($keyspace, '8bit') - 1;
            for( $i = 0; $i < $length ; $i++) {
                $str .= $keyspace[random_int(0, $max)];
            }
            $user->password = Hash::make($str);
            // dd($user->password);
        } elseif ($request->password_options == 'manual') {
            $user->password = Hash::make($request->password);
        }

        if(!empty($request->roles))
        {
            $user->syncRoles(explode(',', $request->roles));
            $user->save();
        } else {
            $user->detachRoles($request->roles);
        }

        return redirect()->route('users.show', $id);

        // if() {
        //     return redirect()->route('users.show', $id);
        // } else {
        //     Session::flash('error', 'There was a problem saving the updated user info to the database. Try again');
        //     return redirect()->route('users.edit', $id);
        // }

    }

    public function destroy($id)
    {
        //
    }
}
