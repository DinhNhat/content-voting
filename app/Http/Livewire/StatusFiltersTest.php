<?php

namespace App\Http\Livewire;

use App\Models\Status;
use Illuminate\Support\Facades\Route;
use Livewire\Component;

class StatusFiltersTest extends Component
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

        if ($this->currentRouteName === 'idea.show-test') {
            return redirect()->route('idea.index-test', [
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

        if (Route::currentRouteName() === 'idea.show-test') {
            $this->status = null;
        }
    }

    public function render()
    {
        return view('livewire.status-filters-test');
    }
}
