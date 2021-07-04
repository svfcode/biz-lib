<?php

namespace App\Http\Controllers;

use App\Models\Book;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Str;

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
            'title' => 'required|unique:books',
            'author' => 'required',
            'year' => ['required', 'integer'],
            'description' => 'required',
            'image' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'book' => 'required',
        ]);

        if ($validator->fails()) {
            return redirect()->back()
                        ->withErrors($validator)
                        ->withInput();
        }

        $slug = Str::slug($request->get('title'), '-');
        $keywords = $request->get('title') . ', ' . $request->get('author');
        $imgalt = 'Обложка книги ' . $request->get('title');

        $imageName = $slug .'.'.$request->image->extension();
        $request->image->move(public_path('img/books'), $imageName);

        $bookName = $slug . '.' . $request->book->getClientOriginalExtension();
        $request->book->move(public_path('books'), $bookName);

        DB::insert('insert into books (cat_id, title, author, year, keywords, description, slug, img, imgalt, book, downloads) values (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)',
            [
                $request->get('partid'),
                $request->get('title'),
                $request->get('author'),
                $request->get('year'),
                $keywords,
                $request->get('description'),
                $slug,
                $imageName,
                $imgalt,
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
    public function show($book)
    {
        //dd($book);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Book  $book
     * @return \Illuminate\Http\Response
     */
    public function edit($book)
    {
        $parts = DB::select('select id, title from categories');

        $book = DB::select('select * from books where slug = ?', [$book]);
        $book = $book[0];

        return view('admin.book.edit', compact('parts', 'book'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Book  $book
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $book)
    {
        $rules = [
            'partid' => 'required',
            'title' => 'required',
            'description' => 'required',
            'author' => 'required',
            'year' => 'required',
        ];

        $valideted = $this->validate($request, $rules);

        $partid = $valideted['partid'];
        $title = $valideted['title'];
        $description = $valideted['description'];
        $author = $valideted['author'];
        $year = $valideted['year'];

        DB::update("update books
            set title='$title', cat_id='$partid', description='$description', author='$author', year='$year'
            where slug='$book'");

        return redirect('/admin/parts');
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
