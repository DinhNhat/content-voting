<?php

namespace App\Http\Livewire;

use App\Helpers\Helper;
use App\Models\Idea;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;
use PHPUnit\TextUI\Help;

class IdeaIndex extends Component
{
    public $idea;
    public $votesCount;
    public $hasVoted;
    public $search;

    public function mount(Idea $idea, $votesCount, $search)
    {
        $this->idea = $idea;
        $this->votesCount = $votesCount;
        $this->hasVoted = $idea->voted_by_user;
        $this->search = $this->doesIdeaTitleContainSearch($this->idea->title, $search);
    }

    public function vote()
    {
        if (! Auth::check()) {
            return redirect(route('login'));
        }

        if ($this->hasVoted) {
            $this->idea->removeVote(Auth::user());
            $this->votesCount--;
            $this->hasVoted = false;
        } else {
            $this->idea->vote(Auth::user());
            $this->votesCount++;
            $this->hasVoted = true;
        }
    }

    public function render()
    {
        return view('livewire.idea-index');
    }

    private function doesIdeaTitleContainSearch($title, $search) {
        if ($search && strlen($search) >= 3) {
            if (Helper::getSubString($title, $search)) {
                $cssText = 'bg-peach text-peach';
                $subStrSearch = Helper::getSubString($title, $search);
//                return '<span class="bg-peach text-peach">'.$subStrSearch.'</span>';
                return $subStrSearch;
            }
        }
    }
}
