
<div class="card bg-white ">
    <h3 class="card-header bg-white">Categories</h3>
    <div class="card-body">
        <ul class="nav flex-column nav-tabs">
            @if(count($allCategories)>0)
                @foreach($allCategories as $category)
                    <li class="nav-item"><a  class="nav-link h5 text-capitalize text-dark"href="{{route('category',$category->id)}}">{{$category->name}}</a></li>
                @endforeach
            @endif
        </ul>

    </div>
</div>

