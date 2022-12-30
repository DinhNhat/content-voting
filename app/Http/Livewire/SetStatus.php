<?php

namespace App\Http\Livewire;

use App\Models\Idea;
use App\Models\Status;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Gate;
use Livewire\Component;
use Symfony\Component\HttpFoundation\Response;

class SetStatus extends Component
{
    public $idea;
    public $status;

    public function mount(Idea $idea)
    {
        $this->idea = $idea;
        $this->status = $this->idea->status_id;
    }

    public function setStatus()
    {
//        if (! Auth::check() || ! Auth::user()->isAdmin()) {
//            abort(Response::HTTP_FORBIDDEN);
//        }
        // Call the gate update idea status authorization
        if (Gate::denies('update-idea-status')) {
            abort(Response::HTTP_FORBIDDEN);
        }

        // Update the idea status
        $this->idea->status_id = $this->status;
        $this->idea->save();

        // emit the event to parent UI
        $this->emit('statusWasUpdated');
    }

    public function render()
    {
        return view('livewire.set-status', [
            'statuses' => Status::getCount()
        ]);
    }
}
