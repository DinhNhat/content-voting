<?php

namespace App\Http\Controllers\Test\Api;

use App\Http\Controllers\Controller;
use App\Models\Idea;
use App\Models\Vote;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class IdeaApiTestController extends Controller
{
    public function index()
    {
        $listIdeas = Idea::with(['user', 'category', 'status'])
            ->addSelect(['voted_by_user' => Vote::select('id')
                ->where('user_id', Auth::id())
                ->whereColumn('idea_id', 'ideas.id')
            ])
            ->withCount('votes')
            ->orderBy('id', 'desc')
            ->get();

        return $listIdeas;
    }
}
