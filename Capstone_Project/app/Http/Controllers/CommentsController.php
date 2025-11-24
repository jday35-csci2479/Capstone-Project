<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class CommentsController extends Controller
{
    public function store(Request $request, \App\Models\Forums $forum)
    {
        $request->validate([
            'body' => 'required|string|max:2000',
        ]);

        $forum->comments()->create([
            'body' => $request->input('body'),
            'user_id' => $request->user()->id,
        ]);

        return back()->with('success','Comment added.');
    }

    public function destroy(\App\Models\Comments $comment)
    {
        $comment->delete();

        return back()->with('success','Comment deleted.');
    }

    public function update(Request $request, \App\Models\Comments $comment)
    {
        $request->validate([
            'body' => 'required|string|max:2000',
        ]);

        $comment->update([
            'body' => $request->input('body'),
        ]);

        return back()->with('success','Comment updated.');
    }
}
