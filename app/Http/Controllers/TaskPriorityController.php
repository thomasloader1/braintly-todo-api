<?php

namespace App\Http\Controllers;

use App\Models\TaskPriority;
use Illuminate\Http\Request;

class TaskPriorityController extends Controller
{
    public function index(){
        $priorities = TaskPriority::all();
        return response()->json($priorities);
    }
}
