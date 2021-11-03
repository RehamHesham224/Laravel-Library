@extends('adminlte::page')
@section('title','dashboard')
@section('content_header')
    <h1>Dashboard</h1>
@endsection

@section('content')
    <div class="box bg-white p-2">
        <div class="box-header with-border d-flex justify-content-between" >
            <h3 class="box-title">Categories</h3>
            <div class="box-tools pull-right">
                <!-- Buttons, labels, and many other things can be placed here! -->
                <!-- Here is a label for example -->
                <a href="{{route('categories.create')}}" class="btn btn-primary mb-3">Add Category</a>
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

                </tr>
                </thead>
                <tbody>
                {{--        dd($users);--}}
                @foreach($categories as $category)
                    <tr>
                        <th scope="row">{{$category->id}}</th>
                        <td>{{$category->name}}</td>
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
