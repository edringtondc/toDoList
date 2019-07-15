<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use App\Models\Task;


class TasksController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $tasks = Task:: orderBy('due_date', 'asc')->paginate(2);

        return view('tasks.index')->with('tasks', $tasks);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    //  /tasks/create
    public function create()
    {
        return view('tasks.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //    validate data
        $this->validate($request, [
            'name' => 'required|string|max:255|min:3' ,
            'description' => 'required|string|max:10000|min:10',
            'due_date' => 'required|date|'
        ]);
        //    create new Task

        $task = new Task;

        //     assign task data from request
        $task->name = $request->name;
        $task->description = $request->description;
        $task->due_date = $request->due_date;
        //    save task
            $task->save();
        //    flash session message with success
        Session::flash('success', 'Created Task Successfully');
        //    return a redirect

        return redirect()->route('task.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $task = Task::find($id);
        $task->dueDateFormatting = false;

        return view('tasks.edit')->withTask($task);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
             //    validate data
             $this->validate($request, [
                'name' => 'required|string|max:255|min:3' ,
                'description' => 'required|string|max:10000|min:10',
                'due_date' => 'required|date|'
            ]);

            //    find the related Task
            $task = Task::find($id);
    
            //     assign task data from request
            $task->name = $request->name;
            $task->description = $request->description;
            $task->due_date = $request->due_date;
            //    save task
                $task->save();
            //    flash session message with success
            Session::flash('success', 'Saved Task Successfully');
            //    return a redirect
    
            return redirect()->route('task.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
