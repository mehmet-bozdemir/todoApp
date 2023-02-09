<?php

namespace App\Http\Livewire;

use App\Models\Todo;
use Livewire\Component;

class DeleteTodo extends Component
{
    public $todo;

    public function deleteTodo()
    {
        try{
            $this->todo->delete();
            session()->flash('success',"Post Deleted Successfully!!");
        }catch(\Exception $e){
            session()->flash('error',"Something goes wrong!!");
        }
        return redirect()->route('todo.index');
    }
}
