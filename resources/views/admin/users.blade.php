@extends('adminlte::page')
@section('title','dashboard')
@section('content_header')
    <h1>Dashboard</h1>
@endsection

@section('content')
    <div class="box bg-white p-2">
        <div class="box-header with-border d-flex justify-content-between" >
            <h3 class="box-title">Users</h3>
            <div class="box-tools pull-right">
                <!-- Buttons, labels, and many other things can be placed here! -->
                <!-- Here is a label for example -->
                <button class="btn btn-primary mb-3">Add user</button>
            </div>
            <!-- /.box-tools -->
        </div>
        <!-- /.box-header -->
        <div class="box-body">
            <table class="table table-bordered">
                <thead>
                <tr>
                    <th scope="col">#</th>
                    <th scope="col">Name</th>
                    <th scope="col">Email</th>

                </tr>
                </thead>
                <tbody>
                {{--        dd($users);--}}
                @foreach($users as $user)
                    <tr>
                        <th scope="row">{{$user->id}}</th>
                        <td>{{$user->name}}</td>
                        <td>{{$user->email}}</td>

                    </tr>
                @endforeach
                </tbody>
            </table>
        </div>
        <!-- /.box-body -->
        <div class="box-footer">
            The footer of the box
        </div>
        <!-- box-footer -->
    </div>
    <!-- /.box -->

@endsection
