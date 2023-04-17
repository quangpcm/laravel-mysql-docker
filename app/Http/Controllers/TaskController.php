<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreTaskRequest;
use App\Http\Requests\UpdateTaskRequest;
use App\Models\Task;
use Symfony\Component\HttpFoundation\Request;

class TaskController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $tasks = Task::query();
        
        $title = $request->query->get('title');
        if ($title != null) {
            $tasks->where('title', 'LIKE', '%'.$title.'%' );    
        }

        $desc = $request->query->get('description');
        if ($desc != null) {
            $tasks->where('description', 'LIKE', '%'.$desc.'%' );    
        }

        $status = $request->query->get('status');
        if ($status != null) {
            $tasks->where('status', 'LIKE', $status );    
        }

        $type = $request->query->get('type');
        if ($type != null) {
            $tasks->where('type', 'LIKE', $type );    
        }

        return $tasks->get();
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
    public function store(StoreTaskRequest $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(Task $task)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Task $task)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateTaskRequest $request, Task $task)
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
