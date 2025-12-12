<?php

namespace App\Http\Controllers\Product;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    public function index()
    {
    $data = [
     [ "id" => 1, "title" => "First Article" ],
     [ "id" => 2, "title" => "Second Article" ],
     ];
     return view('articles.index', [
     'articles' => $data
     ]);
    }

    /*or

    public function index()
    {
     return view('articles.index');
    }
    */
}
