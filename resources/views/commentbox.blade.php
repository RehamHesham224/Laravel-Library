<div class="card  mt-4">
    <h3 class="card-header bg-white">comment</h3>

    <div class="card-body">
        @include('layouts.partial.alerts')
        <form action="{{route('comment',$book->id)}}" method="post">
            @csrf
            <div class="form-group">
                <textarea type="text" name="comment" id="comment" class="form-control" placeholder="Enter Book comment"></textarea>
            </div>
            <div class="form-group">
                <button type="submit" name="addComment"  class="btn btn-primary" >Add Comment</button>
            </div>
        </form>

{{--        @dd($book->category)--}}
        @if(count($book->comments)>0)
            @foreach($book->comments as $comment)

                <div class="flex-column">
                   <div> <h4 class="d-inline-block text-info"> {{$comment->user->name}}</h4>

                       <span class="text-muted ">{{$comment->created_at}}</span></div>
                    <p>{{$comment->comment}}</p>

                </div>
            @endforeach
        @endif
    </div>
</div>
