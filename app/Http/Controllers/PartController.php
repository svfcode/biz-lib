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
        $part = DB::select('select id, slug from parts where slug = ?', [$id]);
        if(count($part) == 0) {
            return redirect('/');
        }

        $partSlug =$part[0]->slug;
        $partId = $part[0]->id;
        $cats = DB::select('select * from categories where part_id = ?', [$partId]);
        if(count($cats) == 0) {
            return redirect('/');
        }

        return view('parts.show', compact('cats', 'partSlug'));
    }

}
