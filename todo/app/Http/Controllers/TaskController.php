<?php

namespace App\Http\Controllers;

use App\Models\Task;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class TaskController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
       //SELECT * FROM tasks;
       //Eloquent
       //$tasks = Task::all();
        //SELECT * FROM tasks order by title;
       //$tasks = Task::select()->orderby('title')->get();
       //return $tasks[0]->title;
    //    $task = Task::select()->orderby('title')->first();
    //    return $task;
        $tasks = Task::all();
        return view('task.index', ['tasks' => $tasks]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('task.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {

        $request->validate([
            'title' => 'required|string|max:190',
            'description' => 'required|string|max:1000',
            'completed' => 'nullable|boolean',
            'due_date' => 'nullable|date',
        ]);

        // redirect()->back()->withErrors(['title' => ['required' => 'message', 'string' => 'message'], 'decription' => []])=>withInputs([]);

        // return $request;
        // insert into tasks (...) values (?,?,?...);
        // lastIntedId
        // select * from id = lastinsrertid
        // fetch();
       $task = Task::create([
        'title' => $request->title,
        'description' => $request->description,
        'completed' => $request->input('completed', false),
        'due_date' => $request->due_date,
        'user_id' => 1
       ]);

       return redirect()->route('task.show', $task->id)->with('success','Task Created Successfully');
       // $_SESSION['success'] = 'Task Created Successfully';
    }

    /**
     * Display the specified resource.
     */
    public function show(Task $task)
    {
        //select * from task where id = $task; [0]
        return view('task.show', ['task' => $task]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Task $task)
    {
        return $task;
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Task $task)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Task $task)
    {
        //
    }
}
