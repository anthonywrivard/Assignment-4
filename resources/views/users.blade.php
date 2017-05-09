@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-8 col-md-offset-2">
                <div class="panel panel-default">
                    <div class="panel-heading">Dashboard</div>

                    <div class="panel-body">
                        <div class="right">
                            <a href="{{ route('user.add') }}">
                                <button class="btn btn-primary col-md-2 col-xs-12">Add User</button></a>
                        </div>
                        <br>
                        <table class="table table-bordered">
                            <th>Name</th>
                            <th>Email</th>
                            <th>Action</th>

                            @foreach($users as $user)
                                <tr class="gradeX">
                                    <td>{{ $user->name }}</td>
                                    <td>{{ $user->email }}</td>
                                    <td>
                                        <div class="rt-meeting-content-actions admin">
                                            <a href="{{ route('user.viewuser', $user->id) }}"><button type="button" class="btn btn-success rt-meeting-update col-xs-12">View</button></a>
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
