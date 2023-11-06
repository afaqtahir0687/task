<?php

namespace App\Http\Controllers;

use App\Models\Task;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class TaskController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $tasks = Task::selectRaw("GROUP_CONCAT(users.name SEPARATOR ', ') as user_names")
            ->selectRaw("DATE_FORMAT(tasks.created_at, '%d-%M-%Y') as task_created_at")
            ->join('users', 'tasks.user_id', '=', 'users.id')
            ->groupBy('task_created_at')
            ->get()->toArray();
        foreach ($tasks as $key=>$task) {
            $submittedUserNames = [];
            $userNames = explode(', ', $task['user_names']);
            $submittedUserNames = array_merge($submittedUserNames, $userNames);
           $usersNotSubmitted = User::whereNotIn('name', $submittedUserNames)->pluck('name')->toArray();
            $tags = implode(', ', $usersNotSubmitted);
          $tasks[$key]['notsubmit']=$tags;
        }
        return view('taskindex', compact('tasks'));
    }
    //     public function index()
    // {
    //     $tasks = Task::select('users.name as user_name', 'tasks.task_name as user_task', 'tasks.created_at as task_created_at')
    //         ->join('users', 'tasks.user_id', '=', 'users.id')
    //         ->get();
    //     return view('taskindex', compact('tasks'));
    // }

    // public function index()
    // {
    //    $task = User::select('users.id as user_id','users.name as user_name','tasks.task_name as user_task')
    //     ->join('tasks', function($join) {
    //     $join->on('tasks.user_id', '=', 'users.id');
    //     })
    //     ->get()->toArray();
    //     return view('taskindex', compact('task'));
    // }
    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $users = User::all();
        return view('task', compact('users'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'task' => 'required',
        ]);

        $task = new Task();
        $task->user_id = $request->name;
        $task->task_name = $request->task;
        // $task->date('dd, mm, YY')('created_at');
        $task->save();
        return back()->with('success', 'Your form has been submitted.');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
