{{--<li class="dropdown">--}}
    {{--@foreach($items as $category)--}}

        {{--@include('frontend.category.item')--}}

    {{--@endforeach--}}

{{--</li>--}}


<li class="dropdown">
        @foreach($items as $category)
                @include('frontend.category.item')
        @endforeach
</li>