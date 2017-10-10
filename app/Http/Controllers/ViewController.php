<?php

namespace App\Http\Controllers;

use Auth;
use App\User;
use Illuminate\Http\Request;

class ViewController extends Controller
{
    public function index($slug)
    {
        $user = User::where('slug', $slug)->first();
        return view('profile.view')
            ->withUser($user);
    }
        
    public function edit()
    {
        $profile = Auth::user();
        return view('profile.edit')->withInfo($profile);
    }

    protected function update(Request $r)
    {
        $this->validate($r, [
            'first_name' => 'required|string',
            'last_name' =>  'required|string',
            'phone' =>  'required|string',
            'gender' =>  'required',
            'email' =>  'required|email'
        ]);
        $full_name = $r->first_name.'-'.$r->last_name;

        
        Auth::user()->update([
            'first_name' => $r->first_name,
            'last_name' => $r->last_name,
            'phone' => $r->phone,
            'gender' => $r->gender,
            'email' => $r->email,
            'slug' => str_slug($full_name),
        ]);

        return view('home');
    }
}
