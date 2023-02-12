<div>
    <h1 class="px-4 font-semibold text-base">Edit TODO</h1>
    <form wire:submit.prevent="editTodo" enctype="multipart/form-data" action="#" method="POST" class="space-y-4 px-4 py-6">
        <div>
            <input  wire:model.defer="title"
                    type="text"
                    name="title"
                    value="{{$todo->title}}"
                    class="w-full text-sm  rounded-xl placeholder-gray-900 px-4 py-2"
            >
            @error('title')
                        <div class="text-red-900 text-xs mt-1">{{$message}}</div>
            @enderror
        </div>
        <div>
            <select wire:model.defer="category"
                    name="category_id"
                    id="category"

                    class="w-full text-sm rounded-xl px-4 py-2">
                @foreach($categories as $category)
                    <option value="{{$category->id}}">{{$category->name}}</option>
                @endforeach

            </select>
        </div>
        @error('category')
        <div class="text-red-900 text-xs mt-1">{{$message}}</div>
        @enderror
        <div>
            <textarea wire:model.defer="description" name="description" id="description" cols="30" rows="4" class="w-full text-sm  rounded-xl placeholder-gray-900 px-4 py-2" >{{$todo->description}}</textarea>

        </div>
        <div class="mx-2 flex items-center justify-center w-1/3 lg:w-1/5">
            @if($todo->image)
                <img src="{{ Storage::url($todo->image) }}" alt="todo" class="w-18 h-18 rounded-xl">
            @else
                <img src="https://via.placeholder.com/300/09f/fff.png" alt="todo" class="w-18 h-18 rounded-xl">
            @endif
        </div>

        @if ($updatedImage)
            <div class="border border-gray-300 rounded-lg">
                <img class="rounded-lg" src="{{ $updatedImage->temporaryUrl() }}">
            </div>
        @endif
        <div class="flex items-center space-between space-x-3">
            <input wire:model.defer="updatedImage" name="editImage" class="flex space-x-3 items-center justify-center w-full sm:w-1/2 h-11 text-xs bg-gray-200 font-semibold rounded-xl border border-gray-200 hover:border-gray-400 transition duration-150 ease-in px-6 py-3 cursor-pointer" id="file_input" type="file">

            <button type="submit" class="flex items-center justify-center w-1/2 h-11 text-xs bg-green-300 font-bold rounded-xl border border-gray-200 hover:border-gray-400 transition duration-150 ease-in px-6 py-3 uppercase">
                <span>Submit</span>
            </button>
        </div>
    </form>
</div>
