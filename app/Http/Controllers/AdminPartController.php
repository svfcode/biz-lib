<?php

namespace App\Http\Controllers;

use App\Models\Part;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;

class AdminPartController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $parts = DB::table('parts')->get();

        return view('admin.parts.index', compact('parts'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.parts.create');
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
            'title' => 'required',
            'subtitle' => 'required',
            'description' => 'required',
            'slug' => 'required',
            'image' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'imgalt' => 'required',
        ]);

        if ($validator->fails()) {
            return redirect()->back()
                        ->withErrors($validator)
                        ->withInput();
        }

        $imageName = time().'.'.$request->image->extension();
        $request->image->move(public_path('img/parts'), $imageName);

        DB::insert('insert into parts (title, subtitle, description, slug, img, imgalt) values (?, ?, ?, ?, ?, ?)',
            [
                $request->get('title'),
                $request->get('subtitle'),
                $request->get('description'),
                $request->get('slug'),
                $imageName,
                $request->get('imgalt'),
            ]);

        return redirect('/admin/parts');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Part  $part
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $part = DB::select('select id, slug, title from parts where slug = ?', [$id]);
        if(count($part) == 0) {
            return redirect('/');
        }

        $partSlug = $part[0]->slug;
        $partTitle = $part[0]->title;
        $partId = $part[0]->id;
        $cats = DB::select('select * from categories where part_id = ?', [$partId]);
        if(count($cats) == 0) {
            return redirect('/');
        }

        return view('admin.parts.show', compact('cats', 'partSlug', 'partTitle'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Part  $part
     * @return \Illuminate\Http\Response
     */
    public function edit($partTitle)
    {
        $part = DB::table('parts')->where('slug', '=', $partTitle)->first();
        return view('admin.parts.edit', compact('part'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Part  $part
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $part)
    {

        $rules = [
            'title' => 'required',
            'subtitle' => 'required',
            'description' => 'required',
            'slug' => 'required',
            'imgalt' => 'required',
        ];

        $valideted = $this->validate($request, $rules);

        $title = $valideted['title'];
        $subtitle = $valideted['subtitle'];
        $description = $valideted['description'];
        $slug = $valideted['slug'];
        $imgalt = $valideted['imgalt'];

        DB::update("update parts
            set title='$title', subtitle='$subtitle', description='$description', slug='$slug', imgalt='$imgalt'
            where slug='$part'");

        return redirect('/admin/parts');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Part  $part
     * @return \Illuminate\Http\Response
     */
    public function destroy($part)
    {
        DB::delete('delete from parts where slug = ?', [$part]);

        return redirect('/admin/parts');
    }
}
