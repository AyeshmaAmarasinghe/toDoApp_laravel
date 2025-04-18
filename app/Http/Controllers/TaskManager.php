<?php

namespace App\Http\Controllers;

use App\Models\Tasks;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class TaskManager extends Controller
{
    function listTask()
    {
        //return all the tasks in db using a json
        $tasks = Tasks::where("user_id", Auth::user()->id)->where("status", null)->paginate(3);
        return view("welcome", compact("tasks"));
    }

    function addTask()

    {
        return view('tasks.add');
    }

    function addTaskPost(Request $request)
    {

        $request->validate([
            'title' => 'required',
            'description' => 'required',
            'deadline' => 'required',
        ]);

        $task = new Tasks();

        $task->title = $request->title;
        $task->description = $request->description;
        $task->deadline = $request->deadline;
        $task->user_id = Auth::user()->id; //saving user id

        if ($task->save()) {
            //if task was added successfully, u ll be taken to home page thru this route
            return redirect(route('home'))->with("success", "Task added successfully");
        }
        //if task adding was failed, u ll be taken to the add task page thru this route
        return redirect(route("tasks.add"))->with("error", "Task was not added");
    }

    function updateTaskStatus($id)
    {
        if (Tasks::where("user_id", Auth::user()->id)->where('id', $id)->update(['status' => "completed"])) {
            return redirect(route("home"))->with("success", "Task updated successfully");
        }
        return redirect(route("home"))->with("error", "Error occurred while updating, Try again");
    }

    function deleteTask($id)
    {
        if (Tasks::where("user_id", Auth::user()->id)->where('id', $id)->delete()) {
            return redirect(route("home"))->with("success", "Task deleted successfully");
        }
        return redirect(route("home"))->with("error", "Error occurred while deleting, Try again");
    }
};
