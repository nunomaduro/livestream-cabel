<div class="text-2xl">
    <nav class="items-center space-x-4">
        <a href="{{ route('todos.list') }}" class="hover:underline">
            Todos
        </a>

        <span>/</span>

        <span>Create Todo</span>
    </nav>

    <div class="mt-5">
        <form wire:submit.prevent="store">
            <div class="items-center space-y-5">
                <div>
                    <!-- add a missing label here -->
                    <label for="content" class="block">Content (this is required)</label>

                    <textarea type="text"
                           class="p-2 border border-gray-200 rounded-lg"
                           placeholder="Todo Content"
                           wire:model="content"
                    ></textarea>

                    @error('content')
                        <span class="text-red-500">{{ $message }}</span>
                    @enderror
                </div>
                <div>
                    <label for="status" class="block">Status</label>

                    <select
                        class="p-2 border border-gray-200 rounded-lg"
                        wire:model="status"
                    >
                        @foreach(\App\Enums\TodoStatus::cases() as $status)
                            <option value="{{ $status->value }}">{{ $status->description() }}</option>
                        @endforeach
                    </select>
                </div>

                <div>
                    <label for="color" class="block">Color</label>

                    <select
                        class="p-2 border border-gray-200 rounded-lg"
                        wire:model="color"
                    >
                        <option value="zinc">Zinc</option>
                        <option value="yellow">Yellow</option>
                        <option value="red">Red</option>
                        <option value="green">Green</option>
                        <option value="blue">Blue</option>
                    </select>
                </div>

                <div>
                    <label for="visibility" class="block">Visibility</label>

                    <select
                        class="p-2 border border-gray-200 rounded-lg"
                        wire:model="public"
                    >
                        <option value="0">Private</option>
                        <option value="1">Public</option>
                    </select>
                </div>
            </div>

            <div class="mt-5">
                <a href="{{ route('todos.list') }}">
                    <button type="button"
                            class="p-2 bg-zinc-500 text-white rounded-lg"
                    >
                        Back
                    </button>
                </a>

                <button type="submit"
                        class="p-2 bg-blue-500 text-white rounded-lg"
                >
                    Create Todo
                </button>
            </div>
        </form>
    </div>
</div>
