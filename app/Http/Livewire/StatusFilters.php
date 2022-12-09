<?php

namespace App\Http\Livewire;

use App\Models\Idea;
use App\Models\Status;
use Illuminate\Support\Facades\Route;
use Livewire\Component;
use RalphJSmit\Livewire\Urls\Facades\Url;

class StatusFilters extends Component
{
    public $status;
    public $statusCount;

    protected $queryString = [
        'status',
    ];

    public function setStatus($newStatus)
    {
        $this->status = $newStatus;
        $this->emit('queryStringUpdatedStatus', $this->status);

        // URL string modification
//        $previousUrl = url()->previous();
//        $queryStringPosition = stripos($previousUrl, '?');
//        $urlWithoutQueryString = mb_substr($previousUrl, 0, $queryStringPosition);

        if (Url::currentRoute() === 'idea.show') {
            return redirect()->route('idea.index', [
                'status' => $this->status
            ]);
        }
    }

    public function mount()
    {
        // Get all the idea status count
        $this->statusCount = Status::getCount();

        if (Route::currentRouteName() === 'idea.show') {
            $this->status = null;
        }
    }

    public function render()
    {
        return view('livewire.status-filters');
    }

//    private function getPreviousRouteName()
//    {
//        return app('router')->getRoutes()->match(app('request')->create(url()->previous()))->getName();
//    }
}
