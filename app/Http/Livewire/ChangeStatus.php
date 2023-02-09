<?php

namespace App\Http\Livewire;

use App\Models\Todo;
use Livewire\Component;

class ChangeStatus extends Component
{
    public $todo;

    public function changeStatus()
    {
        $todoId = $this->todo->id;
        $this->todo->update([
            'status_id' => 2,
        ]);

        $this->reset();

        return redirect()->route('todo.show', $todoId);
    }
}
