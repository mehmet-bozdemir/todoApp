<?php

namespace App\Http\Livewire;

use App\Models\Status;
use Illuminate\Support\Facades\Route;
use Livewire\Component;

class StatusFilters extends Component
{
    public $status;
    public $statusCount;

    public function mount()
    {
        $this->statusCount = Status::getCount();
        $this->status = request()->status ?? 'All';

        if (Route::currentRouteName() === 'todo.show') {
            $this->status = null;
        }
    }

    public function setStatus($newStatus)
    {
        $this->status = $newStatus;
        $this->emit('queryStringUpdatedStatus', $this->status);

        if ($this->getPreviousRouteName() === 'todo.show') {
            return redirect()->route('todo.index', [
                'status' => $this->status,
            ]);
        }
    }

    public function render()
    {
        return view('livewire.status-filters');
    }

    public function getPreviousRouteName()
    {
        return app('router')->getRoutes()->match(app('request')->create(url()->previous()))->getName();
    }
}
