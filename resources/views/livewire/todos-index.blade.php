<div>
    <div class="filters flex flex-col md:flex-row md:space-x-6 space-y-3 md:space-y-0">
        <div class="w-full md:w-1/3">
            <select name="category" id="category" class="w-full rounded-xl bg-gray-100 px-4 py-2">
                <option value="Actegory One"> Category one</option>
                <option value="Actegory Two"> Category two</option>
                <option value="Actegory Three"> Category three</option>
                <option value="Actegory Four"> Category four</option>
            </select>
        </div>

        <div class="w-full md:w-2/3 relative">
            <div class="absolute top-0 flex items-center h-full ml-2">
                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-4 h-4">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M21 21l-5.197-5.197m0 0A7.5 7.5 0 105.196 5.196a7.5 7.5 0 0010.607 10.607z" />
                </svg>
            </div>

            <input type="search" placeholder="Find a TODO" class="w-full placeholder-gray-900 rounded-xl bg-gray-100 px-4 py-2 pl-8">
        </div>
    </div>

    <div class="todos-container space-y-6 my-6">
        @foreach($todos as $todo )
            <div class="todo-container rounded-xl bg-gray-100 hover:shadow-md transition duration-200 ease-in">
                <div class="flex flex-col items-center lg:flex-row  px-2 py-6">
                    <div class="mx-2 flex items-center justify-center w-1/3 lg:w-1/5">
                        <img src="{{ Storage::url($todo->image) }}" alt="todo" class="w-18 h-18 rounded-xl">
                    </div>
                    <div class="mx-4 flex-1 w-full">
                        <div class="flex flex-col lg:flex-row items-center">
                            <h4 class="todo-link text-xl font-semibold cursor-pointer">
                                <a href="{{ route('todo.show', $todo) }}">{{$todo->title}}</a>
                            </h4>
                            <div class="flex items-center space-x-2">
                                <div class="{{$todo->getTodoClass()}} text-xs font-bold uppercase leading-none rounded-full text-center w-28 h-7 py-2 px-4">
                                    {{$todo->status->name}}
                                </div>
                            </div>
                        </div>
                        <div class="text-gray-600 mt-3">
                            <p class="line-clamp-3">{{$todo->description}}</p>
                        </div>
                        <div class="flex flex-col lg:flex-row items-center justify-between mt-6">
                            <div class="flex items-center text-xs font-semibold space-x-2">
                                <div class="font-bold text-gray-900">{{$todo->user->name}}</div>
                                <div>{{$todo->created_at->diffForHumans()}}</div>
                                <div>&bull;</div>
                                <div>{{$todo->category->name}}</div>
                            </div>
                            <div class="flex items-center space-x-2">
                                <div class="bg-gray-200 text-xs font-bold uppercase leading-none rounded-full text-center w-28 h-7 py-2 px-4">
                                    Edit
                                </div>
                                {{--                                <livewire:edit-todo :todo="$todo"/>--}}
                                @auth()
                                    <livewire:delete-todo
                                        :key="$todo->id"
                                        :todo="$todo"
                                    />
                                @endauth
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        @endforeach
    </div>
    <div class="my-8">
        {{$todos->links()}}
    </div>
</div>
