<?php

namespace App\Http\Livewire;

use App\Models\Todo;
use Livewire\Component;

class TodoIndex extends Component
{

//    public function index()
//    {
//        return view('todo.index', [
//            'todos' => Todo::with('user', 'category', 'status')->latest()->simplePaginate(5),
//        ]);
//    }
    public function render()
    {
        return view('livewire.todo-index', [
        'todos' => Todo::with('user', 'category', 'status')->latest()->simplePaginate(5),
        ]);
    }
}
