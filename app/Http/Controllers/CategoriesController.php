<?php

namespace App\Http\Controllers;

use App\Models\Categories;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class CategoriesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Categories  $categories
     * @return \Illuminate\Http\Response
     */
    public function show($part, $category) {
        $cat = DB::select('select id, slug, title from categories where slug = ?', [$category]);
        if(count($cat) == 0) {
            return redirect('/');
        }
        $cat = $cat[0];

        $books = DB::select('select * from books where cat_id = ?', [$cat->id]);
        if(count($books) == 0) {
            return redirect('/');
        }

        return view('books.show', compact('cat', 'books'));

        // dd($part, $category);
        // $part = DB::select('select id, slug from parts where slug = ?', [$part]);
        // $cat = DB::select('select * from parts where slug = ?', [$part]);
        // if(count($part) == 0) {
        //     return redirect('/');
        // }

        // $partSlug =$part[0]->slug;
        // $partId = $part[0]->id;
        // $cats = DB::select('select * from categories where part_id = ?', [$partId]);
        // if(count($cats) == 0) {
        //     return redirect('/');
        // }

        // return view('parts.show', compact('cats', 'partSlug'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Categories  $categories
     * @return \Illuminate\Http\Response
     */
    public function edit(Categories $categories)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Categories  $categories
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Categories $categories)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Categories  $categories
     * @return \Illuminate\Http\Response
     */
    public function destroy(Categories $categories)
    {
        //
    }
}
