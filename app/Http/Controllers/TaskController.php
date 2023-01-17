<?php

namespace App\Http\Controllers;

use App\Http\Requests\TaskStoreRequest;
use App\Models\Task;

class TaskController extends Controller
{
    public function index(){
        $tasks = Task::select("tasks.*", "priorities.name as priority_name")->join("priorities","tasks.priority_id","=","priorities.id")->get();
        return response()->json($tasks);
    }

    public function store(TaskStoreRequest $request){
        $newTask = Task::create($request->all());
        return response()->json($newTask, 201);
    }
}
