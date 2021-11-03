@if(session('msg'))
    <div class="alert alert-success ">
        <button type="button" class="close" data-bs-dismiss="alert" aria-label="Close">&times;</button>

           {{session('msg')}}

    </div>
@endif

@if(count($errors)>0)
<div class="alert alert-danger">
    <button type="button" class="close" data-bs-dismiss="alert" aria-label="Close">&times;</button>
    <strong>Error</strong>
    <ul>
            @foreach($errors->all() as $error)
        <li>
            {{$error}}
        </li>
            @endforeach
    </ul>
</div>
@endif
