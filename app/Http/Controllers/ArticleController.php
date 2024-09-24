<?php

namespace App\Http\Controllers;

use App\Models\Article;
use Illuminate\Http\Request;

class ArticleController extends Controller
{
    // Show all articles on the feed
    public function index()
    {
        $articles = Article::all();
        return view('articles.index', compact('articles'));
    }

    // Show form to create new article
    public function create()
    {
        return view('articles.create');
    }

    // Store new article in database
    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'content' => 'required',
        ]);

        Article::create($request->all());
        return redirect()->route('news.feed')->with('success', 'Article created successfully.');
    }

    // Show form to edit article
    public function edit(Article $article)
    {
        return view('articles.edit', compact('article'));
    }

    // Update article in database
    public function update(Request $request, Article $article)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'content' => 'required',
        ]);

        $article->update($request->all());
        return redirect()->route('news.feed')->with('success', 'Article updated successfully.');
    }

    // Delete article from database
    public function destroy(Article $article)
    {
        $article->delete();
        return redirect()->route('news.feed')->with('success', 'Article deleted successfully.');
    }
}