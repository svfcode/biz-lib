<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ToolsController extends Controller
{
    public function createSitemapHtml() {

        $parts = DB::select('select id, slug, title from parts');
        $cats = DB::select('select id, slug, title, part_id from categories');
        $books = DB::select('select id, slug, title, cat_id from books');

        $page = view('pages/sitemaphtml', compact('parts', 'cats', 'books'))->render();

        $file_path = public_path('sitemap.html');
        $file = fopen($file_path, "w") or die("Unable to open file!");
        fwrite($file, $page);
        fclose($file);

        return 'sitemap html created';
    }
}
