@extends('layouts.master') @section('content')

<h1>Tasks List</h1>
<p class="lead">Select a project to show its tasks.</p>
<hr>
@if(Session::has('flash_message'))
    <div class="alert alert-success">
        {{ Session::get('flash_message') }}
    </div>
@endif

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
            <tbody id="sortable">
                @foreach($tasks as $key => $task)
                <tr id="{{$task->id}}">
                    <td>{{$task->name}}</td>
                    <td class="prio">
                        {{$task->priority}}
                    </td>
                    <td>{{$task->created_at}}</td>
                    <td>{{$task->updated_at}}</td>
                    <td>
                        <div class="row">
                            <a href="{{URL::to("/tasks/$task->id/edit")}}" class="btn btn-sm btn-warning mr-3">Edit</a>
                            <form id="form_{{$task->id}}" method="POST" action="{{URL::to("/tasks/$task->id")}}">
                                @csrf
                                @method("DELETE")
                                <input type="hidden" name="id" value="{{ $task->id }}">
                                <button data-id="{{$task->id}}" type="button" class="btn btn-sm btn-danger deleteRecord">Delete</button>
                            </form>
                        </div>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>
<script>
    $( "#sortable" ).sortable({
        update: function( event, ui ) {
            var itemid = ui.item.attr('id');
              var order = [];
               $('#sortable tr').each( function(e) {
                $(this).children('td.prio').html($(this).index() + 1);
                order.push( {'tid': $(this).attr('id'), 'prio': ( $(this).index() + 1 ) } );
              });

              $.ajaxSetup({ headers: { 'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content') } });
              $.ajax({
                type: "POST",
                url:"{{ route('reorder') }}",
                data: JSON.stringify(order),
                success:function(data) {
                    alert(data + ', task order updated!');
                },
                error: function (request, status, error) {
                    console.log(request.responseText);
                }
            });

        }
    });
    $("#sortable").disableSelection();

    $( document ).ready(function() {

        $('#mySelect').val('');
        $("#project").change(function(){
            var pid = $(this).children("option:selected").val();
            var url = '{{ route("home", ":pid")}}';
            url = url.replace(':pid', pid);
            window.location.href = url;
        });

        $(".deleteRecord").click(function(){
            var res = confirm('Are you sure?!');

            if(res){
                id = $(this).data("id");
                $("#form_" + id).submit();
            }
        });
    });
</script>
@stop
