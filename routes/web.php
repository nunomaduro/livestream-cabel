<?php

use App\Livewire\TodoCreate;
use App\Livewire\TodoList;
use App\Livewire\About;
use Illuminate\Support\Facades\Route;

Route::get('/', About::class)->name('welcome');
Route::get('todos', TodoList::class)->name('todos.list');
Route::get('todos/create', TodoCreate::class)->name('todos.create');
