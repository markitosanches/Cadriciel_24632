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
        return view('task.edit', ['task' => $task]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Task $task)
    {
        $request->validate([
            'title' => 'required|string|max:190',
            'description' => 'required|string|max:1000',
            'completed' => 'nullable|boolean',
            'due_date' => 'nullable|date',
        ]);
     
        $task->update([
            'title' => $request->title,
            'description' => $request->description,
            'completed' => $request->input('completed', false),
            'due_date' => $request->due_date,
        ]);

        return redirect()->route('task.show', $task->id)->withSuccess('Task Updated Successfully!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Task $task)
    {
        $task->delete();

        return redirect()->route('task.index')->withSuccess('Task Deleted Successfully!');
    }

    public function query(){

        //$stmt = $pdo->query(SELECT * FROM tasks);
        //$stmt->fetchAll();

        //$tasks = Task::all();
        //$tasks = Task::select()->get();

        // SELECT * FROM tasks LIMIT 1;
        //$tasks = Task::select()->first();

        // SELECT * FROM tasks ORDER By title;
        //$tasks = Task::orderby('title')->get();
        //$tasks = Task::Select()->orderby('title')->get();

        // SELECT title, description FROM tasks ORDER By title;
        // $tasks = Task::Select('title', 'description')->orderby('title')->get();

        // SELECT * FROM tasks WHERE title =  'Task 1';
        // $tasks = Task::where('title', 'Task 1')->get();
        // $tasks = Task::select()->where('title', 'Task 1')->get();

        
        // SELECT * FROM tasks WHERE title LIKE 'Task%';
        // $tasks = Task::where('title', 'like','Task%')->get();

         // SELECT * FROM tasks WHERE id = 1;
        // $tasks = Task::where('id', 10)->get();
        // return $tasks[0]; 

        // $tasks = Task::where('id', 10)->first();
        // $tasks = Task::find(10);

        // SELECT * FROM tasks WHERE title LIKE 'Task%' order by 'title' DESC;
        //  $tasks = Task::where('title', 'like','Task%')->orderby('title', 'DESC')->get();
        // $tasks = Task::where('title', 'like','Task%')->orderby('title', 'DESC')->get();

        // SELECT * FROM tasks WHERE title LIKE 'Task%' AND user_id = 1;
        //  $tasks = Task::where('title', 'like','Task%')
        //             ->where('user_id', 1)
        //             ->get();

        // SELECT * FROM tasks WHERE title LIKE 'Task%' OR user_id = 1;
        // $tasks = Task::where('title', 'like','Task%')
        //             ->orWhere('user_id', 1)
        //             ->get();

        // SELECT * FROM tasks INNER JOIN users on users.id = user_id; 
        // $tasks = Task::select()
        //                 ->join('users', 'users.id', 'user_id')
        //                 ->get();

        // SELECT * FROM tasks right OUTER JOIN users on users.id = user_id;
        // $tasks = Task::select()
        //                 ->rightJoin('users', 'users.id', 'user_id')
        //                 ->get();

        
        
        return $tasks; 
    }
}
