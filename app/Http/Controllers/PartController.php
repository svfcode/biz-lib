<?php

namespace App\Http\Controllers;

use App\Models\Part;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class PartController extends Controller
{

    public function index()
    {
        $parts = DB::table('parts')->get();

        return view('parts.index', compact('parts'));
    }

}
