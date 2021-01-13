<?php

namespace App\Http\Controllers;

use App\Models\Task;
use Illuminate\Http\Request;
use Validator;

class TaskController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $tasks = Task::all();
        return response()->json([
            "success" => true,
            "message" => "Tasks List",
            "data" => $tasks
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $input = $request->all();
        $validator = Validator::make($input,[
            'body'=>'required'    
        ]);

        if ($validator->fails()){
            return response()->json(['Validation Error', $validator->errors()]);
        }
        
        $task = Task::create($input);
        return response()->json([
            "success" => true,
            "message" => "Task created successfully",
            "data" => $task
        ]);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\int  $task
     * @return \Illuminate\Http\Response
     */
    public function show(int $task)
    {
        $tasks = Task::find($task);
        if(is_null($tasks)){
            return response()->json(['errors'=>array(['code'=>404,'message'=>'Task not found'])],404);
        }
        return response()->json([
            "success" => true,
            "message" => "Task retrieved sucessfully",
            "data" => $tasks
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Task  $task
     * @return \Illuminate\Http\Response
     */
    public function edit(Task $task)
    {
        //
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
        $input = $request->all();
        $validator = Validator::make( $input, [
            "body"=>'required'
        ]);

        if ($validator->fails()){
            return response()->json(['errors'=>array(['code'=>422,'message'=>'Faltan valores para completar el procesamiento.'])],422);
        }
        $task->body = $input['body'];

        $task->save();
        return response()->json([
            "success"=> true,
            "message" => "Task updated successfully",
            "data" => $task
        ]);
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
        return response()->json([
            "success" => true,
            "message" => "Task deleted successfully",
            "data" => $task
        ]);
    }
}
