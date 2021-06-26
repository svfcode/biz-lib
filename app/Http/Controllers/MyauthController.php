<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;

class MyauthController extends Controller
{
    public function form() {
        return view('admin.auth.login');
    }

    public function login(Request $request) {

        $validator = Validator::make($request->all(), [
            'name' => 'required',
            'password' => 'required',
        ]);

        if ($validator->fails()) {
            return redirect()->back()
                        ->withErrors($validator)
                        ->withInput();
        }

        $name = $request->get('name');
        $password = md5($request->get('password'));

        $authData = DB::select('select * from myauth where name = ? and password = ?', [$name, $password]);

        if(empty($authData)) {
            return redirect()->back()->withErrors('not correct name or password');
        }

        session(['auth' => true]);

        return redirect('/admin/parts');
    }
}
