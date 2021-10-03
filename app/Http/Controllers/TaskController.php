<?php

namespace App\Http\Controllers;

use App\Models\Task;
use Illuminate\Http\Request;

class TaskController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $tasks = auth()->user()->tasks()->paginate(5);
        return view('tasks.browse', compact('tasks'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('tasks.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request, [
            'description' => ['required',],
            'name' => ['required', 'min:5']
        ]);
        $task = new Task();
        $task->name = $request->name;
        $task->description = $request->description;
        $task->user_id = auth()->user()->id;
        $task->save();
        return redirect(route('tasks.index'));
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Task  $task
     * @return \Illuminate\Http\Response
     */
    public function show(Task $task)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Task  $task
     * @return \Illuminate\Http\Response
     */
    public function edit(Task $task)
    {
        if (auth()->user()->id == $task->user_id) {
            return view('tasks.edit', compact('task'));
        } else {
            return redirect(route('tasks.index'));
        }
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Task  $task
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Task $task)
    {
        if (isset($_POST['delete'])) {
            $task->delete();
            return redirect(route('tasks.index'));
        } else {
            $this->validate($request, [
                'description' => ['required',],
                'name' => ['required', 'min:5']
            ]);

            $task->name = $request->name;
            $task->description = $request->description;
            $task->save();

            return redirect(route('tasks.index'));
        }
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Task  $task
     * @return \Illuminate\Http\Response
     */
    public function delete(Task $task)
    {
        return view('tasks.delete', compact('task'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Task  $task
     * @return \Illuminate\Http\Response
     */
    public function destroy(Task $task)
    {
        $task->delete();
        return redirect(route('tasks.index'));
    }
}
