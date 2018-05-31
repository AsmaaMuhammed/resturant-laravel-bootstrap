<div class="col-md-3 categories-grid">
    <div class="search-in animated wow fadeInUp" data-wow-duration="1000ms" data-wow-delay="500ms">
        <h4>Search</h4>
        <div class="search">
            <form action="{{url('search-for-dishes')}}" method="get" id="form-search">
                <input type="text" name="search" id="search" placeholder="Search" required="">
                <input type="submit" value="">
            </form>
        </div>
    </div>
    <div class="grid-categories animated wow fadeInLeft" data-wow-duration="1000ms" data-wow-delay="500ms">
        <h4>Categories</h4>
        <ul class="popular">
            @foreach (json_decode('{"1": "Breakfast", "2": "Lunch", "3": "Dinner", "4": "Dessert"}', true) as $optionKey => $optionValue)
                <li><a href="#" class="cat" id="{{$optionKey}}"><i
                                class="glyphicon glyphicon-menu-right"> </i>{{$optionValue}}</a></li>
            @endforeach

        </ul>
    </div>
    <div class="blog-bottom animated wow fadeInDown" data-wow-duration="1000ms" data-wow-delay="500ms">
        <h4>Recent Posts</h4>
        @foreach($posts as $post)
            <div class="product-go">
                <a href="{{url('comments/'.$post->id.'/post')}}" class="fashion"><img class="img-responsive " src="{{url('storage/'.$post->photo)}}"
                                                 alt=""></a>
                <div class="grid-product">
                    <a href="{{url('comments/'.$post->id.'/post')}}" class="elit">{{$post->title}}</a>
                    <p>{{$post->desc}}</p>
                </div>
                <div class="clearfix"></div>
            </div>
        @endforeach

    </div>

</div>
<div class="clearfix"></div>
@section('scripts')
    <script type="application/javascript">
        $('.cat').on('click', function () {
            var category = $(this).attr('id');
            $('#search').val(category);
            $("#form-search").submit();
        });
    </script>
@endsection