<?php

namespace App\Http\Livewire;

use App\Models\Comment;
use App\Models\Idea;
use Livewire\Component;
use Livewire\WithPagination;

class IdeaComments extends Component
{
    use withPagination;

    public $idea;

    protected $listeners = ['commentWasAdded'];

    public function mount(Idea $idea)
    {
        $this->idea = $idea;
    }

    public function commentWasAdded()
    {
        $this->idea->refresh();
        $this->gotoPage($this->idea->comments()->paginate()->lastPage());
    }

    public function render()
    {
        return view('livewire.idea-comments', [
            'comments' => Comment::with('user')->where('idea_id', $this->idea->id)->paginate()->withQueryString(),
//            'comments' => $this->idea->comments()->with('user')->orderBy('created_at')->paginate()->withQueryString()
        ]);
    }
}
