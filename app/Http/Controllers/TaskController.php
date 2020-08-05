<?php

namespace App\Http\Controllers;

use App\Task;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;

class TaskController extends Controller
{

    /**
     *get all tasks
     * @return JsonResponse
     */
    public function index()
    {
        $tasks = Task::all();


        return response()->json($tasks);
    }

    /**
     * create a task
     * @param Request $request
     * @return JsonResponse
     */
    public function create(Request $request)
    {
        $data = $request->all();

        $task = new Task();

        $task->name = $data['name'];
        $task->user_id = $data['user_id'];

        if(! $task->save()) {

            return response()->json('something went wrong!');
        }


        return response()->json($task);
    }


    public function detail($taskId)
    {
        $task = Task::find($taskId);

        if(! $task ){

            return response()->json('task not found');
        }


        return response()->json($task);
    }


    public function update($taskId, Request $request)
    {
        $data = $request->all();

        $task = Task::find($taskId);

        if(! $task ){

            return response()->json('task not found');
        }

        $task->name = $data['name'];
        $task->status = $data['status'];

        $task->update();


        return response()->json($task);
    }

    public function delete($taskId)
    {
        $task = Task::find($taskId);

        if(! $task ){

            return response()->json('task not found');
        }


        $task->delete();


        return response()->json('ok');
    }
}
