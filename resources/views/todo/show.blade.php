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
        <div class="flex px-2 py-6">
            <div class="mx-4 flex items-center justify-center w-1/5">
                <img src="https://images.unsplash.com/photo-1484480974693-6ca0a78fb36b?ixlib=rb-4.0.3&ixid=MnwxMjA3fDB8MHxzZWFyY2h8MXx8dG9kb3xlbnwwfHwwfHw%3D&auto=format&fit=crop&w=800&q=60" alt="todo" class="w-18 h-18 rounded-xl">
            </div>
            <div class="mx-4 flex-1 w-full">
                <div class="flex items-center">
                    <h4 class="text-xl font-semibold">
                        {{$todo->title}}
                    </h4>
                    <div class="flex items-center space-x-2">
                        <div class="bg-green-300 text-xs font-bold uppercase leading-none rounded-full text-center w-28 h-7 py-2 px-4">
                            Done
                        </div>
                    </div>
                </div>
                <div class="text-gray-600 mt-3">
                    <p>{{$todo->description}}</p>
                </div>
                <div class="flex items-center justify-between mt-6">
                    <div class="flex items-center text-xs font-semibold space-x-2">
                        <div class="font-bold text-gray-900">{{$todo->user->name}}</div>
                        <div>{{$todo->created_at->diffForHumans()}}</div>
                        <div>&bull;</div>
                        <div>{{$todo->category->name}}</div>
                        <div>&bull;</div>
                        <div>3 comments</div>
                    </div>
                    <div class="flex items-center space-x-2">
                        <div class="bg-gray-200 text-xs font-bold uppercase leading-none rounded-full text-center w-28 h-7 py-2 px-4">
                            Edit
                        </div>
                    </div>
                    <div class="flex items-center space-x-2">
                        <div class="bg-gray-200 text-xs font-bold uppercase leading-none rounded-full text-center w-28 h-7 py-2 px-4">
                            Delete
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="similar-todos-container my-6" >
        <div class="flex space-x-6  similar-todo">
            <div class="flex-1 w-1/2 px-2 py-6 rounded-xl bg-gray-100 hover:shadow-md transition duration-200 ease-in">
                container-1
            </div>
            <div class="flex-1 w-1/2 px-2 py-6 rounded-xl bg-gray-100 hover:shadow-md transition duration-200 ease-in">
                container-1
            </div>
            <div class="flex-1 w-1/2 px-2 py-6 rounded-xl bg-gray-100 hover:shadow-md transition duration-200 ease-in">
                container-1
            </div>
        </div>
    </div>

    <div class="similar-todos-container my-6" >
        <div class="border grid grid-cols-2 gap-4 justify-betweensimilar-todo">
            <div class="px-2 py-6 rounded-xl bg-gray-100 hover:shadow-md transition duration-200 ease-in">
                container-1
            </div>
            <div class="px-2 py-6 rounded-xl bg-gray-100 hover:shadow-md transition duration-200 ease-in">
                container-1
            </div>
            <div class="px-2 py-6 rounded-xl bg-gray-100 hover:shadow-md transition duration-200 ease-in">
                container-1
            </div>
        </div>
    </div>

</x-app-layout>
