<?php

namespace App\Http\Controllers;

use Egulias\EmailValidator\Result\ValidEmail;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Symfony\Contracts\Service\Attribute\Required;

class ProfileController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function show_profile()
    {
        $user = Auth::user();

        return view('show_profile', compact('user'));   
    }

    public function show_password()
    {
        $user = Auth::user();

        return view('show_password', compact('user'));   
    }

    public function change_password(Request $request)
    {
        {
            $request->validate([
                'password' => 'Required|Min:6|confirmed'
            ]);
            $user = Auth::user();
            $user->update([
                'password' => Hash::make($request->password)
            ]);
            $request->session()->flash('message', 'Change Password, Success !');
            return Redirect::back();
        } 
    }

    public function edit_profile(Request $request)
    {
        $request->validate([
            'name' => 'Required'
        ]);
        $user = Auth::user();
        $user->update([
            'name' => $request->name
        ]);

        $request->session()->flash('message', 'Change Profile, Success !');
        return Redirect::back();
    }

}
