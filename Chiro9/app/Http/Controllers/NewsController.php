<?php

namespace App\Http\Controllers;

use App\Models\News;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class NewsController extends Controller
{
    // Toon alle nieuwsitems
    public function index()
    {
        $newsItems = News::orderBy('published_at', 'desc')->paginate(10);
        return view('news.index', compact('newsItems'));
    }

    // Toon één nieuwsitem
    public function show(News $news)
    {
        return view('news.show', compact('news'));
    }


    // Bewaar een nieuw nieuwsitem
    public function store(Request $request)
    {
        $validated = $request->validate([
            'title' => 'required|string|max:255',
            'content' => 'required|string',
            'image' => 'nullable|image|mimes:jpeg,png,jpg|max:2048',
            'published_at' => 'required|date',
        ]);

        // Afbeelding opslaan
        if ($request->hasFile('image')) {
            $path = $request->file('image')->store('news_images', 'public');
            $validated['image'] = $path;
        }

        News::create($validated);

        return redirect()->route('admin.news')->with('success', 'Nieuwsitem aangemaakt!');
    }

    // Toon het bewerkformulier
    public function edit($id)
    {
        $newsItem = News::findOrFail($id);
        return view('news.edit', compact('newsItem'));
    }

    // Update een nieuwsitem
    public function update(Request $request, $id)
    {
        $validated = $request->validate([
            'title' => 'required|string|max:255',
            'content' => 'required|string',
            'image' => 'nullable|image|mimes:jpeg,png,jpg|max:2048',
        ]);

        
        $newsItem = News::findOrFail($id);

        $newsItem->title = $request->input('title');
        $newsItem->content = $request->input('content');
        // Afbeelding bijwerken
        if ($request->hasFile('image')) {
            $path = $request->file('image')->store('news_images', 'public');
            $newsItem->image = $path;
        }

        $newsItem->save();      

        return redirect()->route('admin.news')->with('success', 'Nieuwsitem bijgewerkt!');
    }

    // Verwijder een nieuwsitem
    public function destroy(News $news)
    {
        if ($news->image) {
            Storage::disk('public')->delete($news->image);
        }

        $news->delete();

        return redirect()->route('admin.news')->with('success', 'Nieuwsitem verwijderd!');
    }
}