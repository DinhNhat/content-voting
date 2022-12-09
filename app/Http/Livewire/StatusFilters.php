<?php

namespace App\Http\Livewire;

use App\Models\Idea;
use App\Models\Status;
use Illuminate\Support\Facades\Request;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\URL;
use Livewire\Component;
//use RalphJSmit\Livewire\Urls\Facades\Url;

class StatusFilters extends Component
{
    public $status;
    public $statusCount;
    public $currentRouteName;

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

        if ($this->currentRouteName === 'idea.show') {
            return redirect()->route('idea.index', [
                'status' => $this->status
            ]);
        }
    }

    public function mount()
    {
        $this->currentRouteName = Route::currentRouteName();
        $this->status = request()->status ?? 'All';

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
//        return Route::getRoutes()->match(Request::create(URL::previous()))->getName() !== 'idea.index';
//    }
}
