<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\Request;
use Inertia\Inertia;
use Illuminate\Support\Facades\Auth;

class FreedomWallController extends Controller
{
    // 1. Display the Wall
    public function index()
    {
        return Inertia::render('FreedomWall', [
            // Fetch posts ordered by newest first
            'posts' => Post::latest()->get()->map(function ($post) {
                return [
                    'id' => $post->id,
                    'text' => $post->content,
                    'mood' => $post->mood,
                    // We DO NOT return user_id here to ensure anonymity in the browser
                    'time_ago' => $post->created_at->diffForHumans(),
                ];
            })
        ]);
    }

    // 2. Store a New Post
    public function store(Request $request)
    {
        // Validate the input
        $validated = $request->validate([
            'content' => 'required|string|max:500', // Limit length to prevent spam
            'mood' => 'required|in:grateful,stressed,anxious,motivated,hopeful,tired',
        ]);

        // Create the post linked to the current user (for admin safety only)
        $request->user()->posts()->create([
            'content' => $validated['content'],
            'mood' => $validated['mood'],
        ]);

        // Redirect back (Inertia handles this smoothly without full reload)
        return redirect()->back();
    }
}
