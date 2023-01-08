<?php

namespace App\Http\Livewire;

use App\Models\Category;
use App\Models\Idea;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;
use Symfony\Component\HttpFoundation\Response;

class EditIdea extends Component
{
    public $title;
    public $category;
    public $description;
    public $idea;

    protected $rules = [
        'title' => 'required|min:4',
        'category' => 'required|integer|exists:categories,id',
        'description' => 'required|min:4'
    ];

    public function mount(Idea $idea)
    {
        $this->idea = $idea;
        $this->title = $idea->title;
        $this->description = $idea->description;
        $this->category = $idea->category_id;
    }

    public function updateIdea()
    {
        // Authorization
        if (! Auth::check() || Auth::user()->cannot('update', $this->idea)) {
            abort(Response::HTTP_FORBIDDEN);
        }

        // Validation
        $this->validate();

        $this->idea->update([
            'title' => $this->title,
            'description' => $this->description,
            'category_id' => $this->category
        ]);

        // emit the event to parent UI
        $this->emit('ideaWasUpdated');
    }

    public function render()
    {
        return view('livewire.edit-idea', [
            'categories' => Category::all()
        ]);
    }
}
