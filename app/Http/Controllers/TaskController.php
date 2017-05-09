<?php

namespace App\Http\Controllers;

use App\Tasks;
use App\TaskStatus;
use Illuminate\Http\Request;
use Validator;
use Illuminate\Support\Facades\Redirect;

class TaskController extends Controller
{


    public function addTask(){
        return view('add-task');
    }

    //get single task
    public function getTask($id){
        $task = Tasks::with('task_status')->where("id","=",$id)->first();
        return view('view-task',['task' => $task]);
    }

    //add post
    public function addTaskPost(Request $request){
        $validate = Validator::make($request->all(), [
            'title' => 'required',
            'description' => 'required',
            'duedate' => 'required',
        ]);

        if ($validate->fails()) {
            return back()->withInput()->withErrors($validate->errors());
        }

        $taskstatus = TaskStatus::where('title','Pending')->first();

        $task = new Tasks();
        $task -> title = $request->input('title');
        $task -> description = $request->input('description');
        $task -> due_date = $request->input('duedate');
        $task -> status_id = $taskstatus->id;
        $task -> save();

        return redirect()->route('task.add')->with('success' , 'Task has been created Successfully');
    }


//delete task
    public function deleteTask($id){
        $task = Tasks::where(['id' => $id])->first();
        $task -> delete();
        return Redirect::to('/home')->with('message', 'Task has been deleted Successfully');
    }

    //start task
    public function startTask($id){
        $mytask = Tasks::where(['id' => $id])->first();

        $taskstatus = TaskStatus::where(['title' => 'Ongoing'])->first();

        $mytask -> status_id = $taskstatus->id;
        $mytask->save();

        $task = Tasks::with('task_status')->where("id","==",$id)->first();

        return redirect()->route(['task.viewtask',$id])->with('success' , 'Task has been Started');

    }


    //complete task
    public function completeTask($id){
        $mytask = Tasks::where(['id' => $id])->first();

        $taskstatus = TaskStatus::where(['title' => 'Complete'])->first();

        $mytask -> status_id = $taskstatus->id;
        $mytask->save();

        $task = Tasks::with('task_status')->where("id","==",$id)->first();

        return redirect()->route(['task.viewtask',$id])->with('success' , 'Task has been Completed');

    }

}
