<?php

namespace App\Http\Controllers;

use App\Task;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class TaskController extends Controller
{
    public function index(){
      

        $tasks=Task::all();
   
        return view('tasks.index', compact('tasks'));

    }

    public function store(Request $request){

     //validation 
    $request->validate([


        'title'=>'required'


    ]);
         
    // dd($request->title);
    Task::create([

            'title'=>$request->title
          ]);

          
         session()->flash('massage', 'Task has been created');
         
          return redirect('/');
          
    }


    public function destroy($id){

        Task::destroy($id);

      
        return redirect()->back()->with('massage','The Task has been Deleted');
        
    }


}
