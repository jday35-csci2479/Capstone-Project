<?php

namespace App\Http\Controllers;

use App\Models\Forums;
use Illuminate\Http\Request;


class ForumsController extends Controller
{
   public function create()
   {
        return view('forums.crud.create');
   }

   public function edit(Forums $forum)
   {
        return view('forums.crud.edit', compact('forum'));
   }

   public function update(Request $request, Forums $forum)
   {
        $request->validate([
            'title' => 'required|string|max:255',
            'body' => 'required|string',
        ]);

        $forum->update($request->only('title', 'body'));

        return redirect()->route('forums.' . $forum->category, $forum)->with('success', 'Forum updated successfully.');
   }

   public function destroy(Forums $forum)
   {        
        $forum->delete();

        return redirect()->route('forums.' . $forum->category, $forum)->with('success', 'Forum deleted successfully.');
   }

   public function show(Forums $forum)
   {
        return view('forums.crud.show', compact('forum'));
   }

   public function store(Request $request)
   {
        $request->validate([
            'title' => 'required|string|max:255',
            'body' => 'required|string',
            'category' => 'required|string|max:100',
        ]);

        $forum = Forums::create([
            'title' => $request->input('title'),
            'body' => $request->input('body'),
            'category' => $request->input('category'),
            'user_id' => $request->user()->id,
        ]);

        return redirect()->route('forums.' . $forum->category, $forum)->with('success', 'Forum created successfully.');
   }
}
