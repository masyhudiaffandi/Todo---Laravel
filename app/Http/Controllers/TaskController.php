<?php

namespace App\Http\Controllers;

use App\Models\task;
use Illuminate\Console\View\Components\Task as ComponentsTask;
use Illuminate\Http\Request;
use App\Http\Controllers\CategoryController;
use App\Models\category;

class TaskController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $tasks = task::with('category')->get();
        $categories = category::all();

        return view('dashboard', compact('tasks', 'categories'));
    }


    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'category_id' => 'required|exists:categories,id',
        ]);

        task::create([
            'name' => $request->name,
            'category_id' => $request->category_id,
        ]);

        return redirect()->route('dashboard')->with('success', 'Task berhasil ditambahkan.');
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
    public function edit($id)
    {
        $task = task::findOrFail($id);
        $categories = category::all();

        return view('edit', compact('task', 'categories'));
    }

    /**
     * Update the specified resource in storage.*/
    public function update(Request $request, $id)
    {
        $request->validate([
            'name' => 'required',
            'category_id' => 'required',
        ]);

        $task = category::findOrFail($id);

        $task->update([
            'name' => $request->name,
            'category_id' => $request->category_id,
        ]);

        return to_route('dashboard');
    }


    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $task = task::findOrFail($id);
        $task->delete();

        return redirect()->route('dashboard');
    }

}
