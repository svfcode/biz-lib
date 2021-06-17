<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class MyauthController extends Controller
{
    public function form() {
        return view('admin.auth.login');
    }
    public function login(Request $request) {

    }
}
