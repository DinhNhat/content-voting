<?php

namespace App\Http\Livewire;

use App\Models\Comment;
use App\Models\Idea;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;
use Symfony\Component\HttpFoundation\Response;

class AddComment extends Component
{
    public $idea;
    public $comment;
    protected $rules = [
        'comment' => 'required|min:4'
    ];

    public function mount(Idea $idea)
    {
        $this->idea = $idea;
    }

    public function addComment()
    {
        if (! Auth::check()) {
            abort(Response::HTTP_FORBIDDEN);
        }

        $this->validate();

        Comment::create([
            'user_id' => Auth::id(),
            'idea_id' => $this->idea->id,
            'body' => $this->comment
        ]);

        $this->reset('comment');

        $this->emit('commentWasAdded', 'Comment was posted!');
    }

    public function render()
    {
        return view('livewire.add-comment');
    }
}
