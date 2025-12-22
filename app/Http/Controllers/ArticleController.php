<?php
namespace App\Http\Controllers;
use Illuminate\Http\Request;
class ArticleController extends Controller
{
public function index()
    {
       $articles = Article::all();

        dd($articles);  // Debug here

        return view('articles.index', compact('articles'));
    }
public function detail($id)
    {
        return "Controller - Article Detail - $id";
    }
}
