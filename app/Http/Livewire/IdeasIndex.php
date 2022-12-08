<?php

namespace App\Http\Livewire;

use App\Models\Idea;
use App\Models\Vote;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;
use Livewire\WithPagination;

class IdeasIndex extends Component
{
    use WithPagination;

    public function render()
    {
        return view('livewire.ideas-index', [
            'ideas' => Idea::with(['user', 'category', 'status'])
                ->addSelect(['voted_by_user' => Vote::select('id')
                    ->where('user_id', Auth::id())
                    ->whereColumn('idea_id', 'ideas.id')
                ])
                ->withCount('votes')
                ->orderBy('id', 'desc')
                ->simplePaginate(Idea::PAGINATION_COUNT)
        ]);
    }
}
