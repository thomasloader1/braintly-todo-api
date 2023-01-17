<?php

namespace App\Http\Controllers;

use App\Http\Requests\TaskStoreRequest;
use App\Models\Task;
use Illuminate\Http\Request;

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

    public function destroy(Request $request, $id){
        $task = Task::where("id",$id)->first();
        $task->delete();
        return response()->json($task, 200);
    }

    public function update(Request $request, $id){
        $task = Task::where("id",$id)->first();
        $task->update($request->all());
        return response()->json($task, 200);
    }

    
}
