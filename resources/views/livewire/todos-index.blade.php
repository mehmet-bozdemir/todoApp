<div>
    <div class="todos-container space-y-6 my-6">
        @foreach($todos as $todo )
            <div class="todo-container rounded-xl bg-gray-100 hover:shadow-md transition duration-200 ease-in">
                <div class="flex flex-col items-center lg:flex-row  px-2 py-6">
                    <div class="mx-2 flex items-center justify-center w-1/3 lg:w-1/5">
                        @if($todo->image)
                        <img src="{{ Storage::url($todo->image) }}" alt="todo" class="w-18 h-18 rounded-xl">
                        @else
                            <img src="https://via.placeholder.com/300/09f/fff.png" alt="todo" class="w-18 h-18 rounded-xl">
                        @endif
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
                                @auth()
                                    <a href="{{route('todo.edit', $todo)}}" class="bg-gray-200 text-xs font-bold uppercase leading-none rounded-full text-center w-28 h-7 py-2 px-4">
                                        Edit
                                    </a>
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
