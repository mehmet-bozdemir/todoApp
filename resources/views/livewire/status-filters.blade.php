<div>
    <nav class="hidden md:flex items-center justify-between text-xs text-gray-400">
        <ul class="flex uppercase font-semibold border-b-4 pb-3 space-x-10">
            <li><a wire:click.prevent="setStatus('All')" href="{{ route('todo.index', ['status' => 'All']) }}" class="border-b-4 pb-3 @if($status === 'All') border-blue-300 text-gray-900 @endif">All Todos ({{ $statusCount['all_statuses'] }})</a></li>
            <li><a wire:click.prevent="setStatus('Pending')" href="{{ route('todo.index', ['status' => 'Pending']) }}" class="transition duration-100 ease-in border-b-4 pb-3 @if($status === 'Pending') border-blue-300 text-gray-900 @endif">Pending ({{ $statusCount['pending'] }})</a></li>
            <li><a wire:click.prevent="setStatus('Done')" href="{{ route('todo.index', ['status' => 'Done']) }}" class="transition duration-100 ease-in border-b-4 pb-3 @if($status === 'Done') border-blue-300 text-gray-900 @endif">Done ({{ $statusCount['done'] }})</a></li>
        </ul>
    </nav>
</div>
