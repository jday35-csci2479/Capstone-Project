<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class CommentsController extends Controller
{
    public function store(Request $request, \App\Models\Forums $forum)
{
    $request->validate([
        'body' => 'required|string|max:2000',
        'user_id' => 'required|exists:users,id',
    ]);

    $forum->comments()->create([
        'body' => $request->input('body'),
        'user_id' => $request->user()->id,
    ]);

    return back()->with('success','Comment added.');
}

}
