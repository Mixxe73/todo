<?php

namespace App\Http\Controllers;

use App\Http\Requests\TodoRequest;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;

class TodoController extends Controller
{
    public function index()
    {
        $todos = Auth::user()->todos()->orderBy('is_favorited', 'desc')->get();
        return view('todos.index', [
            'todos' => $todos
        ]);
    }

    public function create()
    {
        return view('todos.create');
    }

    public function store(TodoRequest $request)
    {
        $user = Auth::user();
        
        $user->todos()->create([
            'title' => $request->todo_title,
            'subtitle' => $request->todo_subtitle,
            'description' => $request->todo_description,
            'is_closed' => false
        ]);

        return Redirect::route('todos.index')->with('status', 'success');
    }

    public function edit($id)
    {
        $todo = Auth::user()->todos()->find($id);
        
        if (!$todo) {
            return Redirect::route('todos.index')->with('status', 'error');
        }

        return view('todos.edit', ['todo' => $todo]);
    }

    public function update(TodoRequest $request)
    {
        $user = Auth::user();
        $todo = $user->todos()->find($request->todo_id);
        
        if (!$todo) {
            return Redirect::route('todos.index')->with('status', 'error');
        }

        $todo->update([
            'title' => $request->todo_title,
            'subtitle' => $request->todo_subtitle,
            'description' => $request->todo_description
        ]);

        return Redirect::route('todos.index')->with('status', 'success');
    }

    public function toggleStatus($id)
    {
        $user = Auth::user();
        $todo = $user->todos()->find($id);
        
        if (!$todo) {
            return Redirect::route('todos.index')->with('status', 'error');
        }

        $todo->update(['is_closed' => !$todo->is_closed]);

        return Redirect::route('todos.index')->with('status', 'success');
    }

    public function toggleFavorite($id)
    {
        $user = Auth::user();
        $todo = $user->todos()->find($id);
        
        if (!$todo) {
            return Redirect::route('todos.index')->with('status', 'error');
        }

        $todo->update(['is_favorited' => !$todo->is_favorited]);

        return Redirect::route('todos.index')->with('status', 'success');
    }

    public function destroy($id)
    {
        $user = Auth::user();
        $todo = $user->todos()->find($id);
        
        if (!$todo) {
            return Redirect::route('todos.index')->with('status', 'error');
        }

        $todo->delete();

        return Redirect::route('todos.index')->with('status', 'success');
    }
}