<?php

namespace App\Http\Livewire;

use App\Models\Status;
use App\Models\Todo;
use Livewire\Component;
use Livewire\WithPagination;

class TodosIndex extends Component
{
    use WithPagination;

    public $status;
    protected $queryString = [
        'status',
    ];

    protected $listeners = ['queryStringUpdatedStatus'];

    public function mount()
    {
        $this->status = request()->status ?? 'All';
    }

    public function queryStringUpdatedStatus($newStatus)
    {
        $this->resetPage();
        $this->status = $newStatus;
    }


    public function render()
    {
        $statuses = Status::all()->pluck('id', 'name');

        return view('livewire.todos-index', [
            'todos' => Todo::with('user', 'category', 'status')
                ->when($this->status && $this->status !== 'All', function ($query) use ($statuses) {
                    return $query->where('status_id', $statuses->get($this->status));
                })
                ->latest()
                ->simplePaginate(5)
                ->withQueryString(),

        ]);
    }
}
