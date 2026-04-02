<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::match(['get','post'], '/', function(Request $request) {
    if ($request->isMethod('post')) {
        $request->validate([
            'first_name' => 'required|string',
            'last_name' => 'required|string',
            'email' => 'required|email'
        ]);

        $emails = session()->get('emails', []);

        if(count($emails) >= 5) {
            return redirect('/')->with('error', 'Maximum of 5 emails only.');
        }

        if(in_array($request->email, $emails)) {
            return redirect('/')->with('error', 'Email already exists.');
        }

        $emails[] = $request->email;
        session(['emails' => $emails]);

        return redirect('/')->with('success', 'Email added successfully.');
    }

    return view('welcome', ['emails' => session()->get('emails', [])]);
});

Route::view('/about', 'about');
Route::view('/contact', 'contact');

Route::match(['get','post'], '/emails', function(Request $request) {
    if ($request->isMethod('post')) {
        $request->validate(['email' => 'required|email']);
        $emails = session()->get('emails', []);
        if(count($emails) >= 5) {
            return redirect()->back()->with('error', 'Maximum of 5 emails only.');
        }
        if(in_array($request->email, $emails)) {
            return redirect()->back()->with('error', 'Email already exists.');
        }
        $emails[] = $request->email;
        session(['emails' => $emails]);
        return redirect()->back()->with('success', 'Email added successfully.');
    }
    return view('formtest', ['emails' => session()->get('emails', [])]);
});

Route::delete('/emails/{index}', function($index){
    $emails = session()->get('emails', []);
    if(isset($emails[$index])) {
        unset($emails[$index]);
        session(['emails' => array_values($emails)]);
    }
    return redirect()->back()->with('success','Email deleted successfully.');
});