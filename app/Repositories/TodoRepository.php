<?php

namespace App\Repositories;

use App\Models\Todo;

class TodoRepository
{
    public function todosWithRelations()
    {
        return Todo::with('user', 'category', 'status')->latest()->simplePaginate(5);
    }

//    public function  findTodoWithCategoryId($todo)
//    {
//        return Todo::where('category_id', $todo->category_id)->latest()->take(4)->get();
//    }

    public function  findSimilarTodos($todo)
    {
        $categoryItems = Todo::where('category_id', $todo->category_id)->latest()->take(4)->get();
        $similarTodos = $categoryItems->whereNotIn('id', $todo->id);
        return $similarTodos;
    }
}
