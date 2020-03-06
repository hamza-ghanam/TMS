<?php

namespace App\Http\Controllers;

use App\Task;
use App\Project;
use Illuminate\Http\Request;
use Session;

class TaskController extends Controller
{

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index($pid)
    {
        return view('index')
            ->with(['prid' => $pid, 'projects' => Project::all(), 'tasks' => Task::where('project_id', $pid)->orderBy('priority')->get()]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('create')->with(['projects' => Project::all()]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request, [
            'name' => 'required',
            'priority' => 'required',
            'project_id' => 'required',
        ]);

        Session::flash('flash_message', 'Task successfully added!');

        $task = Task::create($request->all());

        return redirect()->back();
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        return view('edit')->with(['task' => Task::findOrFail($id), 'projects' => Project::all()]);
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
        $task = Task::findOrFail($id);

        $this->validate($request, [
            'name' => 'required',
            'priority' => 'required',
            'project_id' => 'required',
        ]);

        $input = $request->all();

        $task->fill($input)->save();

        Session::flash('flash_message', 'Task successfully updated!');

        return redirect()->back();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $task = Task::findOrFail($id);

        $task->delete();

        Session::flash('flash_message', 'Task successfully deleted!');

        return redirect()->back();
    }

    /**
     * Re-order the tasks.
     *
     * @return \Illuminate\Http\Response
     */
    public function reorder(Request $request)
    {
        $data = json_decode($request->getContent(), true);

        foreach($data as $dtask){
            $task = Task::findOrFail($dtask['tid']);
            $task->priority = $dtask['prio'];
            $task->save();
        }

        return response()->json('OK', 200);
    }
}
