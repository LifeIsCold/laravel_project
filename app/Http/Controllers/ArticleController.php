<?php
namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Models\Article;
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
public function create()
    {
      return view('articles.create');
    }
public function store(Request $request)
    {
        // Validate form data
        $validated = $request->validate([
            'title' => 'required|min:3',
            'body' => 'required|min:10',
            'category_id' => 'required|integer',
        ]);

        // Save to database
        Article::create($validated);

        // Redirect back to create page
        return redirect('/articles/create')->with('success', 'Article created successfully!');
    }
}
