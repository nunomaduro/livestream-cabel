<?php

namespace App\Livewire;

use App\Models\Todo;
use Illuminate\Contracts\View\View;
use Livewire\Component;

class TodoList extends Component
{
    public string $search = '';

    public string $status = 'all';

    public function delete(Todo $todo): void
    {
        $todo->delete();
    }

    public function render(): View
    {
        $todos = Todo::query()
            ->when($this->status !== 'all', fn ($query) => $query->where('status', $this->status))
            ->when($this->search !== '', fn ($query) => $query->where('content', 'like', "%{$this->search}%"))
            ->get();

        return view('livewire.todo-list', [
            'todos' => $todos,
        ]);
    }
}
