@extends('layouts.master')

@section('content')

<h1>Add a New Task</h1>
<p class="lead">Add to your task list below.</p>
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
        <form method="POST" action="{{URL('/tasks')}}">
            @csrf
            <div class="form-group">
                <label for="name">Task Name</label>
                <input type="text" required class="form-control" id="name" name="name" placeholder="Enter task name">
            </div>
            <div class="form-group">
                <label for="priority">Task Priority</label>
                <input type="number" class="form-control"  name="priority" id="priority" value="1" min="1" max="10" maxlength="2" step="1">
            </div>
            <div class="form-group">
                <label for="project">Project</label>
                <select class="form-control"  name="project_id" id="project">
                    @foreach($projects as $project)
                        <option value="{{$project->id}}">{{$project->name}}</option>
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
