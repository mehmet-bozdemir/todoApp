<?php

namespace App\Http\Livewire;

use Livewire\WithFileUploads;
use App\Models\Category;
use App\Models\Todo;
use Illuminate\Http\Response;
use Livewire\Component;

class CreateTodo extends Component
{

    use WithFileUploads;

    public $title;
    public $category = 1;
    public $description;
    public $newImage;

    protected $rules = [
        'title' => 'required|min:6',
        'category' => 'required|integer',
        'description' => 'required|min:16',
    ];

    public function createTodo()
    {
        $image = $this->newImage->store('public/todos');
        if(auth()->check()) {
            $this->validate();


            Todo::create([
                'user_id' => auth()->id(),
                'category_id' => $this->category,
                'status_id' => 1,
                'title' => $this->title,
                'image' => $image,
                'description' => $this->description,
            ]);

            session()->flash('success_message', 'Todo was successfully added.');

            $this->reset();

            return redirect()->route('todo.index');
        }

        abort(Response::HTTP_FORBIDDEN);

    }

    public function render()
    {
        return view('livewire.create-todo', [
           'categories' => Category::all(),
        ]);
    }
}
