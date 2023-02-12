<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreTodoRequest;
use App\Http\Requests\UpdateTodoRequest;
use App\Models\Category;
use App\Models\Todo;
use App\Repositories\CategoryRepository;
use App\Repositories\TodoRepository;
use Illuminate\Http\Request;


class TodoController extends Controller
{

private $todoRepository;
private $categoryRepository;

    /**
     * @param $todoRepository
     */
    public function __construct(
        TodoRepository $todoRepository,
        CategoryRepository $categoryRepository
    )
    {
        $this->todoRepository = $todoRepository;
        $this->categoryRepository = $categoryRepository;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     */
    public function index()
    {
//        return $this->todoRepository->all();
        return view('todo.index', [
            $this->todoRepository->todosWithRelations()
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
        $similarTodos = $this->todoRepository->findSimilarTodos($todo);

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
            'categories' => $this->categoryRepository->all(),
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
