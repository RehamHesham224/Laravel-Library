@if($book)
@extends('layouts.app')

@section('content')

    <div class="card  mt-4">
        <h1 class="card-header bg-white">Book Info</h1>

        <div class="card-body">
            <div class="row mb-5">
                <div class="col-md-3">
                    <div class="img-bordered-sm">
                        <img src="{{asset('storage/thumbnails/'. $book->image)}}" class="h-100 w-100 img-size-64">
                    </div>
                </div>
                <div class="col-md-9">
                    <h2>{{$book->title}}</h2>
                    <p>{{$book->info}}</p>
                    <p>Author: {{$book->author}}</p>
                    <a href="{{asset('storage/thumbnails/'. $book->bookfile)}}" class="btn btn-primary">Download</a>
{{--                    <a href="" class="btn btn-info text-white ml-3">More Info</a>--}}
                </div>
            </div>
        </div>
    </div>
<hr>
    @include('commentbox')
@endsection
@else
    Error No Book Found
@endif
