<?php

namespace App\Http\Controllers;

use App\Models\ForumPost;
use Illuminate\Http\Request;

class ForumPostController extends Controller
{
    public function index()
    {
        $posts = ForumPost::with('user')->latest()->get();
        return view('forum.index', compact('posts'));
    }

    public function create()
    {
        return view('forum.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'title_en' => 'required',
            'title_fr' => 'required',
            'content_en' => 'required',
            'content_fr' => 'required',
        ]);

        ForumPost::create([
            'user_id'    => auth()->id(),
            'title_en'   => $request->title_en,
            'title_fr'   => $request->title_fr,
            'content_en' => $request->content_en,
            'content_fr' => $request->content_fr,
        ]);

        return redirect()->route('forum.index');
    }

    public function show(ForumPost $forum)
    {
        return view('forum.show', compact('forum'));
    }

    public function edit(ForumPost $forum)
    {
        if ($forum->user_id !== auth()->id()) {
            abort(403);
        }
        return view('forum.edit', compact('forum'));
    }

    public function update(Request $request, ForumPost $forum)
    {
        if ($forum->user_id !== auth()->id()) {
            abort(403);
        }

        $forum->update($request->only(['title_en', 'title_fr', 'content_en', 'content_fr']));
        return redirect()->route('forum.index');
    }

    public function destroy(ForumPost $forum)
    {
        if ($forum->user_id !== auth()->id()) {
            abort(403);
        }

        $forum->delete();
        return redirect()->route('forum.index');
    }
}