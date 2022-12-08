<?php

namespace App\Http\Livewire;

use Illuminate\Support\Facades\Route;
use Livewire\Component;

class StatusFilters extends Component
{
    public $status = 'All';

    protected $queryString = [
        'status'
    ];

    public function setStatus($newStatus)
    {
        $this->status = $newStatus;

        return redirect()->route('idea.index', [
            'status' => $this->status
        ]);

//        if (app('router')->getRoutes()->match(app('request')->create(url()->previous()))->getName()
//            === 'idea.show') {
//
//        }
    }

    public function mount()
    {
        if (Route::currentRouteName() == 'idea.show') {
            $this->status = null;
            $this->queryString = [];
        }
    }

    public function render()
    {
        return view('livewire.status-filters');
    }
}
