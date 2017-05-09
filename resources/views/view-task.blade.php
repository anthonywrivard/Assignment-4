@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-8 col-md-offset-2">
                <div class="panel panel-default">
                    <div class="panel-heading">View Task</div>

                    <div class="panel-body">

                        <div class="col-md-12 pull-right">

                            @if(Auth::user()->name == "Task Worker")
                            @if($task->task_status->title == "Pending")
                            <a href="{{ route('task.start', $task->id) }}" class="btn btn-primary">Start</a>
                            @endif

                            @if($task->task_status->title == "Ongoing")
                                <a href="{{ route('task.delete', $task->id) }}" class="btn btn-success">Complete</a>
                            @endif

                            @endif

                            @if(Auth::user()->name == "Administrator")
                            <a href="{{ route('task.delete', $task->id) }}" class="btn btn-danger">Delete</a>
                            @endif
                        </div>
                    <br>

                        @include('layouts.messages')
                    <div>
                     <label>Name</label>
                    <p>{{ $task->title }}</p>
                        <br>

                        <label>Description</label>
                        <p>{{ $task->description }}</p>
                        <br>

                        <label>Date Created</label>
                        <p>{{ Carbon\Carbon::parse($task->created_at)->format('d-m-Y') }}</p>
                        <br>

                        <label>Date Due</label>
                        <p>{{ Carbon\Carbon::parse($task->due_date)->format('d-m-Y') }} </p>
                        <br>

                        <label>Status</label>
                        <p>{{ $task->task_status->title }} </p>
                        <br>
                    </div>





                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
