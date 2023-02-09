
<x-app-layout>
    <form action="{{route('todo.update', $todo->id)}}" method="POST" class="space-y-4 px-4 py-6">
        @csrf
        @method('PUT')
        <div>
            <input  type="text"
                    name="title"
                    value="{{$todo->title}}"
                    class="w-full text-sm bg-gray-100 rounded-xl placeholder-gray-900 px-4 py-2"
            >
            @error('title')
{{--            <div class="text-red-900 text-xs mt-1">{{$message}}</div>--}}
            @enderror
        </div>
        <div>
            <select name="category_id"
                    id="category"
                    class="w-full text-sm rounded-xl bg-gray-100 px-4 py-2">
                @foreach($categories as $category)
                    <option value="{{$category->id}}">{{$category->name}}</option>
                @endforeach

            </select>
        </div>
        @error('category')
        <div class="text-red-900 text-xs mt-1">{{$message}}</div>
        @enderror
        <div>
            <textarea name="description" id="description" cols="30" rows="4" class="w-full text-sm bg-gray-100 rounded-xl placeholder-gray-900 px-4 py-2" placeholder="Details of TODO">{{$todo->description}}</textarea>
            @error('description')
            <div class="text-red-900 text-xs mt-1">{{$message}}</div>
            @enderror
        </div>
        <div class="flex items-center space-between space-x-3">
            <button type="button" class="flex items-center justify-center w-1/2 h-11 text-xs bg-gray-200 font-semibold rounded-xl border border-gray-200 hover:border-gray-400 transition duration-150 ease-in px-6 py-3">
                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6 -rotate-45">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M18.375 12.739l-7.693 7.693a4.5 4.5 0 01-6.364-6.364l10.94-10.94A3 3 0 1119.5 7.372L8.552 18.32m.009-.01l-.01.01m5.699-9.941l-7.81 7.81a1.5 1.5 0 002.112 2.13" />
                </svg>
                <span>Add Image</span>
            </button>
            <button type="submit" class="flex items-center justify-center w-1/2 h-11 text-xs bg-green-300 font-bold rounded-xl border border-gray-200 hover:border-gray-400 transition duration-150 ease-in px-6 py-3 uppercase">
                <span>Submit</span>
            </button>
        </div>
    </form>
</x-app-layout>
