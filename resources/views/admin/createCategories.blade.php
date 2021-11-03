@extends('adminlte::page')
@section('title','dashboard')
@section('content_header')
    <h1>Dashboard</h1>
@endsection

@section('content')
    <div class="box bg-white p-2">
        <div class="box-header with-border d-flex justify-content-between" >
            <h3 class="box-title">Add Category</h3>
            <div class="box-tools pull-right">
                <!-- Buttons, labels, and many other things can be placed here! -->
                <!-- Here is a label for example -->
              <a href="{{route('categories.index')}}" class="btn btn-primary mb-3">Categories</a>
            </div>
            <!-- /.box-tools -->
        </div>
        <!-- /.box-header -->
        <div class="box-body">

           <form action="{{route('categories.store')}}" method="post">
               @csrf
               <div class="form-group">
                   <input type="text" name="name" id="name" class="form-control" placeholder="Enter Category">
               </div>
               <div class="form-group">
                   <button type="submit" name="add" id="name" class="btn btn-primary btn-block">Add Category</button>
               </div>
           </form>
        </div>
        <!-- /.box-body -->
        <div class="box-footer">
            The footer of the box
        </div>
        <!-- box-footer -->
    </div>
    <!-- /.box -->

@endsection
