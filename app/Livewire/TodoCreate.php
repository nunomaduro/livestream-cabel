<?php

namespace App\Livewire;

use App\Models\Todo;
use Illuminate\Contracts\View\View;
use Livewire\Component;

class TodoCreate extends Component
{
    public string $content = '';

    public string $status = 'pending';

    public string $color = 'blue';

    public bool $public = false;

    public function store(): void
    {
        $this->validate([
            'content' => 'required|string',
            'status' => 'required|string',
            'color' => 'required|string',
            'public' => 'required|boolean',
        ]);

        Todo::create([
            'content' => $this->content,
            'status' => $this->status,
            'color' => $this->color,
            'public' => $this->public,
        ]);

        $this->redirect(route('todos.list'));
    }

    public function render(): View
    {
        return view('livewire.todo-create');
    }
}
