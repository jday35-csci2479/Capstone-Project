<?php

namespace App\Http\Controllers;

use App\Models\Reaction;
use Illuminate\Http\Request;

class ForumReactionController extends Controller
{
    public function react(Request $request, $forumId)
    {
        $request->validate([
            'type' => 'required|in:like,dislike',
        ]);

        $reaction = Reaction::where('user_id', $request->user()->id)
            ->where('forum_id', $forumId)
            ->first();

        if ($reaction) {
            if ($reaction->type === $request->input('type')) {
                // If the same reaction exists, remove it (toggle off)
                $reaction->delete();
            } else {
                // Update the reaction type
                $reaction->type = $request->input('type');
                $reaction->update(['type' => $reaction->type]);
    }
        } else {
            // Create a new reaction
            Reaction::create([
                'user_id' => $request->user()->id,
                'forum_id' => $forumId,
                'type' => $request->input('type'),
            ]);
        }
        return back();
    }
}
