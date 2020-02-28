@extends('layouts.master')

@section('content')

<h1>Edit Task</h1>
<p class="lead">Edit a task.</p>
<hr>
@if($errors->any())
    <div class="alert alert-danger">
        @foreach($errors->all() as $error)
            <p>{{ $error }}</p>
        @endforeach
    </div>
@endif

@if(Session::has('flash_message'))
    <div class="alert alert-success">
        {{ Session::get('flash_message') }}
    </div>
@endif

<div class="row justify-content-center">
    <div class="col-md-8">
        <form method="POST" action="{{URL::to("/tasks/$task->id")}}">
            @csrf
            @method("PUT")
            <div class="form-group">
                <label for="name">Task Name</label>
                <input type="text" required class="form-control" id="name" name="name" value="{{$task->name}}">
            </div>
            <div class="form-group">
                <label for="priority">Task Priority</label>
                <select class="form-control" name="priority" id="priority">
                    <option value="1" {{$task->priority == 1 ? 'selected' : ''}}>Critical Priority</option>
                    <option value="2" {{$task->priority == 2 ? 'selected' : ''}}>High Priority</option>
                    <option value="3" {{$task->priority == 3 ? 'selected' : ''}}>Medium Priority</option>
                    <option value="4" {{$task->priority == 4 ? 'selected' : ''}}>Normal Priority</option>
                </select>
            </div>
            <div class="form-group">
                <label for="project">Project</label>
                <select class="form-control"  name="project_id" id="project">
                    @foreach($projects as $project)
                        <option {{$task->project_id == $project->id ? 'selected' : ''}} value="{{$project->id}}">{{$project->name}}</option>
                    @endforeach
                </select>
            </div>
            <br/>
            <div class="col-sm-8">
                <button type="submit" class="btn btn-primary">Save</button>
            </div>
    </div>
</div>
</div>

@stop
