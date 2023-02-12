<?php

namespace App\Http\Livewire;

use Illuminate\Http\Response;
use Livewire\Component;
use Livewire\WithFileUploads;

class EditTodo extends Component
{
    use WithFileUploads;

    public $todo;
    public $categories;
    public $title;
    public $category;
    public $description;
    public $updatedImage;

    protected $rules = [
        'title' => 'required|min:6',
        'description' => 'required|min:16',
    ];

    public function editTodo()
    {
        $todoId = $this->todo->id;

        if($this->updatedImage) {
            $editImage = $this->updatedImage->store('public/todos');

        }else{
            $editImage = $this->todo->image;
        }

        if(auth()->check()) {
            $this->validate();

            $this->todo->update([
                'category_id' => $this->category,
                'title' => $this->title,
                'image' => $editImage,
                'description' => $this->description,
            ]);

            $this->reset();

            return redirect()->route('todo.show' , $todoId);
        }

        abort(Response::HTTP_FORBIDDEN);

    }
    public function render()
    {
        return view('livewire.edit-todo');
    }
}
