@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">Dashboard</div>

                @if(sizeof($tasks) == 0)
                    <p class="alert alert-danger">There are no tasks at the moment.</p>
                @endif
                <div class="panel-body">

                    @if(Auth::user()->name == "Administrator")
                    <div class="right">
                        <a href="{{ route('task.add') }}">
                            <button class="btn btn-primary col-md-2 col-xs-12">Add Task</button></a>
                    </div>
                    @endif

                    <br>
                    @include('layouts.messages')
                    <table class="table table-bordered">
                        <th>Title</th>
                        <th>Date Created</th>
                        <th>Date Due</th>
                        <th>Status</th>
                        <th>Action</th>

                        @foreach($tasks as $task)
                            <tr class="gradeX">
                                <td>{{ $task->title }}</td>
                                <td>{{ Carbon\Carbon::parse($task->created_at)->format('d-m-Y') }}</td>
                                <td>{{ Carbon\Carbon::parse($task->due_date)->format('d-m-Y') }}</td>
                                <td>{{ $task->task_status->title }}</td>
                                <td>
                                    <div class="rt-meeting-content-actions admin">
                                        <a href="{{ route('task.viewtask', $task->id) }}"><button type="button" class="btn btn-success rt-meeting-update col-xs-12">View</button></a>
                                    </div>
                                </td>
                            </tr>
                        @endforeach

                    </table>



                </div>
            </div>
        </div>
    </div>
</div>
@endsection
