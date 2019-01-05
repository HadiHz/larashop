{{--<a href="{{ route('frontend.category.index' , $category->id) }}">{{ $category->name }}</a>--}}


{{--@if(isset($categories[$category->id]))--}}
    {{--<ul class="dropdown-menu">--}}
        {{--@include('frontend.category.list' , ['items' => $categories[$category->id] ])--}}
    {{--</ul>--}}
{{--@endif--}}


<a href="{{ route('frontend.category.index' , $category->id) }}" class="dropdown-toggle">{{ $category->name }}</a>
@if(isset($categories[$category->id]))
<ul class="dropdown-menu">
            @include('frontend.category.list' , ['items' => $categories[$category->id] ])

</ul>
@endif
