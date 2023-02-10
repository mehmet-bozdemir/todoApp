<x-app-layout>
    <div>
        <a href="{{route('todo.index')}}" class="flex items-center font-semibold hover:underline">
            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-4 h-4">
                <path stroke-linecap="round" stroke-linejoin="round" d="M15.75 19.5L8.25 12l7.5-7.5" />
            </svg>
            <span class="ml-2">All TODOs</span>
        </a>
    </div>

    <div class="todo-container rounded-xl bg-gray-100 mt-4">
        <div class="flex flex-col md:flex-row items-center justify-center px-2 py-6">
            <div class="mx-4 flex items-center justify-center w-1/5">
                <img src="https://images.unsplash.com/photo-1484480974693-6ca0a78fb36b?ixlib=rb-4.0.3&ixid=MnwxMjA3fDB8MHxzZWFyY2h8MXx8dG9kb3xlbnwwfHwwfHw%3D&auto=format&fit=crop&w=800&q=60" alt="todo" class="w-18 h-18 rounded-xl">
            </div>
            <div class="mx-4 flex-1 w-full">
                <div class="flex items-center">
                    <h4 class="text-xl font-semibold">
                        {{$todo->title}}
                    </h4>
                    <div class="flex items-center space-x-2">
                        <div class="{{$todo->getTodoClass()}} text-xs font-bold uppercase leading-none rounded-full text-center w-28 h-7 py-2 px-4">
                            {{$todo->status->name}}
                        </div>
                    </div>
                    @if($todo->status_id == 1)
                        <livewire:change-status :todo="$todo"/>
                    @endif
                </div>
                <div class="text-gray-600 mt-3">
                    <p>{{$todo->description}}</p>
                </div>
                <div class="flex flex-col md:flex-row items-center justify-between mt-6">
                    <div class="flex items-center text-xs font-semibold space-x-2">
                        <div class="font-bold text-gray-900">{{$todo->user->name}}</div>
                        <div>{{$todo->created_at->diffForHumans()}}</div>
                        <div>&bull;</div>
                        <div>{{$todo->category->name}}</div>
                    </div>
                    <div class="flex items-center space-x-2">
                        <a href="{{route('todo.edit', $todo)}}" class="bg-gray-200 text-xs font-bold uppercase leading-none rounded-full text-center w-28 h-7 py-2 px-4">
                            Edit
                        </a>
                    </div>
                    @auth()
                        <livewire:delete-todo :todo="$todo"/>
                    @endauth
                </div>
            </div>
        </div>
    </div>

    <div class="my-6 uppercase font-semibold">
        <h1>similar todos</h1>
    </div>
    <div class="similar-todos-container flex-row lg:flex lg:space-x-6 my-6">
        @foreach($similarTodos as $similarTodo)
            <div class="similar-todo-container lg:w-1/3 rounded-xl bg-gray-100 mb-6 hover:shadow-md transition duration-200 ease-in">
                <div class="flex flex-col items-center px-2 py-6">
                    <div class="mx-2 flex items-center justify-center w-1/3 lg:w-1/5">
                        <img src="{{ Storage::url($similarTodo->image) }}" alt="todo" class="w-18 h-18 rounded-xl">
                    </div>
                    <div class="mx-4 flex-1 w-full">
                        <div class="flex flex-col items-center">
                            <h4 class="todo-link text-xl font-semibold cursor-pointer">
                                <a href="{{ route('todo.show', $similarTodo) }}">{{$similarTodo->title}}</a>
                            </h4>
                            <div class="flex items-center space-x-2">
                                <div class="{{$similarTodo->getTodoClass()}} text-xs font-bold uppercase leading-none rounded-full text-center w-28 h-7 py-2 px-4">
                                    {{$similarTodo->status->name}}
                                </div>
                            </div>
                        </div>
                        <div class="text-gray-600 mt-3">
                            <p class="line-clamp-3">{{$similarTodo->description}}</p>
                        </div>
                        <div class="items-center justify-between mt-6">
                            <div class="flex items-center text-xs font-semibold space-x-2">
                                <div class="font-bold text-gray-900">{{$similarTodo->user->name}}</div>
                                <div>{{$similarTodo->created_at->diffForHumans()}}</div>
                                <div>&bull;</div>
                                <div>{{$similarTodo->category->name}}</div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        @endforeach
    </div>


{{--    <div class="similar-todos-container my-6" >--}}
{{--        <div class="border grid grid-cols-2 gap-4 justify-betweensimilar-todo">--}}
{{--            <div class="px-2 py-6 rounded-xl bg-gray-100 hover:shadow-md transition duration-200 ease-in">--}}
{{--                container-1--}}
{{--            </div>--}}
{{--            <div class="px-2 py-6 rounded-xl bg-gray-100 hover:shadow-md transition duration-200 ease-in">--}}
{{--                container-1--}}
{{--            </div>--}}
{{--            <div class="px-2 py-6 rounded-xl bg-gray-100 hover:shadow-md transition duration-200 ease-in">--}}
{{--                container-1--}}
{{--            </div>--}}
{{--        </div>--}}
{{--    </div>--}}
</x-app-layout>
