<?php

namespace App\Http\Controllers;

use App\Models\Lead;
use App\Models\LeadComment;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CommentController extends Controller
{
    // view comments page
    public function commentPage($id)
    {
        $comment_list = Lead::find($id)->comment;
        $lead_id = $id;
        return view('admin.forms.commentlist', compact('comment_list', 'lead_id'));
    }

    //  create comment

    public function createComment(Request $request)
    {
        $validatedData = $request->validate([
            'comment' => ['required'],
        ]);

        $create_comment = new LeadComment;
        $create_comment->comment = $request->comment;
        $create_comment->lead_id = $request->lead_id;
        $create_comment->user_id = Auth::user()->id;
        $create_comment->active_time = now()->toDateTimeString();
        $create_comment->save();

        return back()->with('success', 'comment created sucessfully');
        // return $create_comment;
    }

    // go back to lead list page

    public function goBacktoLeadList()
    {
        return redirect('lead-list');
    }
}
