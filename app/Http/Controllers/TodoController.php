<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreTodoRequest;
use App\Http\Requests\UpdateTodoRequest;
use App\Models\Category;
use App\Models\Todo;
use Illuminate\Http\Request;


class TodoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     */
    public function index()
    {
        return view('todo.index', [
            'todos' => Todo::with('user', 'category', 'status')->latest()->simplePaginate(5),
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoreTodoRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreTodoRequest $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Todo  $todo
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     */
    public function show(Todo $todo)
    {
        $categoryItems = Todo::where('category_id', $todo->category_id)->latest()->take(4)->get();
        $similarTodos = $categoryItems->whereNotIn('id', $todo->id);


        return view('todo.show', [
            'todo' => $todo,
            'similarTodos' => $similarTodos,
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Todo  $todo
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     */
    public function edit(Todo $todo)
    {
        return view('todo.edit', [
            'todo' => $todo,
            'categories' => Category::all()
        ]);
    }



    public function update(Request $request, Todo $todo)
    {
        $request->validate([
            'title' => 'required|min:6',
            'category_id' => 'required',
            'description' => 'required|min:16',
        ]);

        $todo->update($request->all());

        return redirect()->route('todo.show' , $todo)
            ->with('success','Todo updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Todo  $todo
     * @return \Illuminate\Http\Response
     */
    public function destroy(Todo $todo)
    {
        //
    }
}
