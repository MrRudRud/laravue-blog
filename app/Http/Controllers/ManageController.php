<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use Carbon\Carbon;

class ManageController extends Controller
{
    public function index() {
        return redirect()->route('manage.dashboard');
    }
    
    public function dashboard() {
        $id= 1;
        $user = User::findOrFail($id);
        // $timezone = Carbon::now(get_local_time());
        return view('manage.dashboard')
        ->withUser($user)
        // ->withTimezone($timezone)
        ;
    }
}
