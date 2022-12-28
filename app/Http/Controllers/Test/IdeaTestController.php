<?php

namespace App\Http\Controllers\Test;

use App\Http\Controllers\Controller;
use App\Models\Idea;
use App\Models\Vote;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class IdeaTestController extends Controller
{
    public function index(Request $request)
    {
        return view('test.idea.index');
    }

    public function show(Idea $idea)
    {
        return view('test.idea.show', [
            'idea' => $idea,
            'votesCount' => $idea->votes()->count()
        ]);
    }
}
