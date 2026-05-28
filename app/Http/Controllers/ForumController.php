<?php

namespace App\Http\Controllers;

use App\Models\ForumThread;
use App\Models\ForumMessage;
use Illuminate\Http\Request;

class ForumController extends Controller
{
    public function index()
    {
        $threads = ForumThread::with(['user', 'messages'])
            ->latest()
            ->get();

        return view('forums.index', compact('threads'));
    }

    public function create()
    {
        return view('forums.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required|max:255',
            'message' => 'required'
        ]);

        $thread = ForumThread::create([
            'user_id' => auth()->id(),
            'title' => $request->title
        ]);

        ForumMessage::create([
            'thread_id' => $thread->id,
            'user_id' => auth()->id(),
            'message' => $request->message
        ]);

        return redirect()->route('forums.show', $thread);
    }

    public function show(ForumThread $thread)
    {
        $thread->load(['messages.user', 'user']);

        return view('forums.show', compact('thread'));
    }

    public function message(Request $request, ForumThread $thread)
    {
        $request->validate([
            'message' => 'required'
        ]);

        ForumMessage::create([
            'thread_id' => $thread->id,
            'user_id' => auth()->id(),
            'message' => $request->message
        ]);

        return redirect()->back();
    }

    public function myForums()
    {
        $threads = ForumThread::whereHas('messages', function ($query)
        {
            $query->where('user_id', auth()->id());
        })
            ->with(['user', 'messages'])
            ->latest()
            ->get();

        return view('forums.my-forums', compact('threads'));
    }
}
