@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-8 col-md-offset-2">
                <div class="panel panel-default">
                    <div class="panel-heading">Add Task</div>

                    <div class="panel-body">

                        @include('layouts.messages')
                        <form action="{{ route('task.task-create') }}" method="post">
                            {{ csrf_field() }}
                            <div class="form-group">
                                <label for="title">Title</label>
                                <input type="text" class="form-control" id="title" placeholder="Title" name="title">
                            </div>
                            <div class="form-group">
                                <label for="title">Description</label><br>
                               <textarea name="description" id="description" class="col-md-12"></textarea>
                            </div>
                            <br>
                            <div class="form-group">
                                <label for="duedate">Due Date</label>
                                <input type="date" class="form-control" id="duedate" name="duedate">
                            </div>

                            <button type="submit" class="btn btn-primary">Submit</button>
                        </form>

                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
