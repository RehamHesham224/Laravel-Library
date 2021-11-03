@extends('layouts.app')

@section('content')

                <div class="card  mt-4">
                    <div class="card-header">Upload File</div>

                    <div class="card-body">
                        @include('layouts.partial.alerts')
                        <form action="{{route('upload.save')}}" method="post" enctype="multipart/form-data">
                            @csrf
                            <div class="form-group">
                                <input type="text" name="title" id="title" class="form-control" placeholder="Enter Book Title">
                            </div>
                            <div class="form-group">
                                <input type="text" name="author" id="author" class="form-control" placeholder="Enter Book Author">
                            </div>
                            <div class="form-group">
                                <input type="text" name="info" id="info" class="form-control" placeholder="Enter Book Info">
                            </div>
                            <div class="form-group">
                                <select class="form-control" name="category">
                                    @if(count($allCategories)>0)
                                        @foreach($allCategories as $category)
                                            <option value="{{$category->id}}">{{$category->name}}</option>
                                        @endforeach
                                    @endif

                                </select>
                            </div>
{{--                            <lable class="custom-file-label">Image</lable>--}}
{{--                            <input type="file" name="image" id="image" class="form-control-file p-1">--}}
                            <div class="form-group">
                                <lable >Book Image</lable>
                                <input type="file" name="image" id="image" class="form-control p-1">
                            </div>
                            <div class="form-group">
                                <lablel >Book PDF File</lablel>
                                <input type="file" name="bookfile" id="bookfile" class="form-control p-1" >

                            </div>
                            <div class="form-group">
                                <button type="submit" name="upload" id="upload" class="btn btn-primary btn-block">Upload Book</button>
                            </div>
                        </form>
                    </div>
                </div>

@endsection
