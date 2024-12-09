<div class="text-2xl">
    <nav class="items-center space-x-4">
        <a href="{{ route('todos.list') }}" class="hover:underline">
            Todos
        </a>
    </nav>

    <div class="mt-5">
        <div class="flex justify-between items-center">
            <div>
                <input type="text"
                       class="p-2 border border-gray-200 rounded-lg"
                       placeholder="Search Todos"
                       wire:model.live.debounce.300ms="search"
                >
            </div>
            <div>
                <select
                    class="p-2 border border-gray-200 rounded-lg"
                    wire:model.live="status"
                >
                    <option value="all">All</option>

                    @foreach(\App\Enums\TodoStatus::cases() as $status)
                        <option value="{{ $status->value }}">{{ $status->description() }}</option>
                    @endforeach
                </select>
            </div>
        </div>

        <div class="mt-5">
            <table class="w-full border border-gray-200">
                <thead>
                    <tr>
                        <th class="p-2 border
                                    border-gray-200">Content</th>
                        <th class="p-2 border
                                    border-gray-200">Status</th>
                        <th class="p-2 border
                                    border-gray-200">Actions</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($todos as $todo)
                        <tr @class([
                            'bg-yellow-200' => $todo->color === 'yellow',
                            'bg-red-200' => $todo->color === 'red',
                            'bg-green-200' => $todo->color === 'green',
                            'bg-blue-200' => $todo->color === 'blue',
                        ])>
                            <td class="p-2 border
                                        border-gray-200">{{ $todo->content }}</td>
                            <td class="p-2 border
                                        border-gray-200">
                                {{ $todo->status->description() }}
                                @if ($todo->public)
                                    <span class="text-xs bg-green-500 text-white rounded-lg px-2">Public</span>
                                @endif

                            </td>
                            <td class="p-2 border
                                        border-gray-200">

                                <button
                                    wire:click="$refresh"
                                    wire:confirm="Its not done lol"
                                    class="p-2 bg-zinc-500 text-white rounded-lg"
                                >
                                    Edit
                                </button>

                                <button
                                    wire:click="delete({{ $todo->id }})"
                                    wire:confirm="Are you sure you want to delete this todo?"
                                    class="p-2 bg-red-700 text-white rounded-lg"
                                >
                                    Delete
                                </button>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>
