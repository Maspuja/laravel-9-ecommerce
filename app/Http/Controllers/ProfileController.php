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

    public function edit_profile(Request $request)
    {
        $request->validate([
            'name' => 'Required',
            'password' => 'Required|Min:6|confirmed'
        ]);
        $user = Auth::user();
        $user->update([
            'name' => $request->name,
            'password' => Hash::make($request->password)
        ]);

        return Redirect::back();
    }

}
