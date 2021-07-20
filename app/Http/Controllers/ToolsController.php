<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ToolsController extends Controller
{
    public function createSitemapHtml() {
        $page = view('pages/sitemaphtml');
        dd($page);

        $file_path = public_path('sitemap.html');

        $file = fopen($file_path, "w") or die("Unable to open file!");

        fwrite($file, $page);
        fclose($file);

        return $page;
    }
}
