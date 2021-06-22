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

    public function show($id)
    {
        $partId = DB::select('select id from parts where slug = ?', [$id]);
        if(count($partId) == 0) {
            return redirect('/');
        }

        $partId = $partId[0]->id;
        $cats = DB::select('select * from categories where part_id = ?', [$partId]);
        if(count($cats) == 0) {
            return redirect('/');
        }

        return view('parts.show', compact('cats'));
    }

}
