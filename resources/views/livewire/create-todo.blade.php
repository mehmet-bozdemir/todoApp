<form wire:submit.prevent="createTodo" enctype="multipart/form-data" action="#" method="POST" class="space-y-4 px-4 py-6">
    <div>
        <input wire:model.defer="title" type="text" class="w-full text-sm bg-gray-100 rounded-xl placeholder-gray-900 px-4 py-2" placeholder="Title of TODO">
        @error('title')
            <div class="text-red-900 text-xs mt-1">{{$message}}</div>
        @enderror
    </div>
    <div>
        <select wire:model.defer="category" name="category_add" id="category_add" class="w-full text-sm rounded-xl bg-gray-100 px-4 py-2">
            @foreach($categories as $category)
                <option value="{{$category->id}}">{{$category->name}}</option>
            @endforeach
        </select>
    </div>
    @error('category')
        <div class="text-red-900 text-xs mt-1">{{$message}}</div>
    @enderror
    <div>
        <textarea wire:model.defer="description" name="content" id="content" cols="30" rows="4" class="w-full text-sm bg-gray-100 rounded-xl placeholder-gray-900 px-4 py-2" placeholder="Details of TODO"></textarea>
        @error('description')
        <div class="text-red-900 text-xs mt-1">{{$message}}</div>
        @enderror
    </div>
    @if ($newImage)
        <div class="border border-gray-300 rounded-lg">
            <img class="rounded-lg" src="{{ $newImage->temporaryUrl() }}">
        </div>
    @endif
    <div class="flex items-center space-between space-x-3">

            <label for="dropzone-file" class="flex space-x-3 items-center justify-center w-1/2 h-11 text-xs bg-gray-200 font-semibold rounded-xl border border-gray-200 hover:border-gray-400 transition duration-150 ease-in px-6 py-3 cursor-pointer">
                <svg aria-hidden="true" class="w-6 h-6 text-gray-700" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M7 16a4 4 0 01-.88-7.903A5 5 0 1115.9 6L16 6a5 5 0 011 9.9M15 13l-3-3m0 0l-3 3m3-3v12"></path></svg>
                <span class="text-center">Add Image</span>
                <input wire:model.defer="newImage" name="image" id="dropzone-file" type="file" class="hidden" />
            </label>

        <button type="submit" class="flex items-center justify-center w-1/2 h-11 text-xs bg-green-300 font-bold rounded-xl border border-gray-200 hover:border-gray-400 transition duration-150 ease-in px-6 py-3 uppercase">
            <span>Submit</span>
        </button>
    </div>
    
    <div>
        @if(session('success_message'))
            <div
                x-data="{isVisible: true}"
                x-init="
                    setTimeout(()=>{
                        isVisible = false
                    }, 2000)
                "
                x-show.transition.duration.1000ms="isVisible"
                class="text-red-400 mt-4"
            >
                {{session('success_message')}}
            </div>
        @endif
    </div>
</form>
