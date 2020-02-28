@extends('layouts.master') @section('content')

<h1>Tasks List</h1>
<p class="lead">Select a project to show its tasks.</p>
<hr>
<div class="row justify-content-center">
    <div class="col-md-8">
        <div class="form-group">
            <label for="project">Project list:</label>
            <select class="form-control" name="project_id" id="project">
                @foreach($projects as $project)
                    <option {{$project->id == $prid ? 'selected' : ''}} value="{{$project->id}}">{{$project['name']}}</option>
                @endforeach
            </select>
        </div>
    </div>
</div>
<hr>
<div class="row justify-content-center">
    <div class="col-md-10">
        <table class="table table-hover table-striped">
            <thead>
                <th>
                    Task Name
                </th>
                <th>
                    Task Priority
                </th>
                <th>
                    Task Create Date and Time
                </th>
                <th>
                    Task Update Date and Time
                </th>
                <th></th>
            </thead>
            <tbody>
                @foreach($tasks as $task)
                <tr>
                    <td>{{$task->name}}</td>
                    <td>
                        @switch($task->priority)
                        @case(1)
                        Critical
                        @break
                        @case(2)
                        High
                        @break
                        @case(3)
                        Medium
                        @break
                        @case(4)
                        Normal
                        @break
                        @endswitch
                    </td>
                    <td>{{$task->created_at}}</td>
                    <td>{{$task->updates_at}}</td>
                    <td>
                        <a href="#" class="btn btn-sm btn-warning">Edit</a>
                        <a href="#" class="btn btn-sm btn-danger">Delete</a>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>
<script>
    $( document ).ready(function() {
        $('#mySelect').val('');
        $("#project").change(function(){
            var pid = $(this).children("option:selected").val();
            var url = '{{ route("home", ":pid")}}';
            url = url.replace(':pid', pid);
            window.location.href = url;
        });
    });
</script>
@stop
