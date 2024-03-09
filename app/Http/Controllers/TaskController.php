<?php

namespace App\Http\Controllers;

use App\Models\task;
use Illuminate\Http\Request;
use Illuminate\Http\RedirectResponse;
use Illuminste\View\View;

class TaskController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $tasks = Task::latest()->paginate(3);
        return view('index', ['tasks' => $tasks]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request): RedirectResponse
    {

        $request-> validate([
            'title' =>'required',
            'description' =>'required',
        ]);

        Task::create($request->all());
        return redirect()->route('tasks.index')->with('success', 'New task created successfully');
    }

    /**
     * Display the specified resource.
     */
    public function show(task $task)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(task $task)
    {
        return view('edit', ['task' => $task]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, task $task):RedirectResponse
        {
    
            $request-> validate([
                'title' =>'required',
                'description' =>'required',
            ]);
        $task->update($request->all());
        return redirect()->route('tasks.index')->with('success', 'New task created successfully');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(task $task): RedirectResponse
    {
        $task->delete();
        return redirect()->route('tasks.index')->with('success', 'Task deleted successfully');
    }
}
