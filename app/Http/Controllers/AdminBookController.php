<?php

namespace App\Http\Controllers;

use App\Models\Book;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;

class AdminBookController extends Controller
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
        $parts = DB::select('select id, title from categories');

        return view('admin.book.create', compact('parts'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'partid' => 'required',
            'title' => 'required|unique',
            'author' => 'required',
            'year' => ['required', 'integer'],
            'keywords' => 'required',
            'description' => 'required',
            'slug' => 'required|unique',
            'image' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'imgalt' => 'required',
            'book' => 'required',
        ]);

        if ($validator->fails()) {
            return redirect()->back()
                        ->withErrors($validator)
                        ->withInput();
        }

        $imageName = time().'.'.$request->image->extension();
        $request->image->move(public_path('img/books'), $imageName);

        $bookName = $request->book->getClientOriginalName();
        $request->book->move(public_path('books'), $bookName);

        DB::insert('insert into books (cat_id, title, author, year, keywords, description, slug, img, imgalt, book, downloads) values (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)',
            [
                $request->get('partid'),
                $request->get('title'),
                $request->get('author'),
                $request->get('year'),
                $request->get('keywords'),
                $request->get('description'),
                $request->get('slug'),
                $imageName,
                $request->get('imgalt'),
                $bookName,
                0
            ]);

        return redirect('/admin/parts');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Book  $book
     * @return \Illuminate\Http\Response
     */
    public function show(Book $book)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Book  $book
     * @return \Illuminate\Http\Response
     */
    public function edit(Book $book)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Book  $book
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Book $book)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Book  $book
     * @return \Illuminate\Http\Response
     */
    public function destroy(Book $book)
    {
        //
    }
}
