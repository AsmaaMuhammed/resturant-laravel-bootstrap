<div class="content-top-top">
    <div class="container">
        <div class="content-top">
            <div class="col-md-4 content-left animated wow fadeInLeft" data-wow-duration="1000ms"
                 data-wow-delay="500ms">
                <h3>News</h3>
                <label><i class="glyphicon glyphicon-menu-up"></i></label>
                <span>
                    @if($generalDesc->where('category',6)->first()!== null)
                        {{$generalDesc->where('category',6)->first()->title}}
                    @else
                        'News Description'
                    @endif
                </span>
            </div>
            <div class="col-md-8 content-right animated wow fadeInRight" data-wow-duration="1000ms"
                 data-wow-delay="500ms">
                <p>
                    @if($generalDesc->where('category',6)->first()!== null)
                        {{$generalDesc->where('category',6)->first()->desc}}
                    @else
                        'News Description'
                    @endif
                </p>
            </div>
            <div class="clearfix"></div>
        </div>
        <div class="news-bottom">
            <div class="news-bot">
                @foreach($newsData as $i=>$row)
                    <div class="col-md-6 news-bottom1 animated wow {{$row->id === 1?'fadeInUp': $row->id===2?'fadeInRight': $row->id===3?'fadeInLeft': $row->id===4?'fadeInDown':''}}"
                         data-wow-duration="1000ms"
                         data-wow-delay="500ms">
                        <a href="{{url('comments/'.$row->id.'/news')}}">
                            <div class="content-item {{$row->id === 2?'content-item1':$row->id===3?'content-item2':$row->id===4?'content-item3':''}}">
                                <div class="overlay"></div>
                                <div class=" news-bottom2">
                                    <ul class="grid-news">
                                        <li><span><i class="glyphicon glyphicon-calendar"> </i>08.09.2014</span><b>/</b>
                                        </li>
                                        <li><span><i class="glyphicon glyphicon-comment"> </i>{{$row->comments->count()}} Comment</span>
                                        </li>
                                        {{--<li><span><i class="glyphicon glyphicon-share"> </i>Share</span></li>--}}
                                    </ul>
                                    <p>{{$row->title}}</p>
                                </div>
                            </div>
                        </a>
                    </div>
                @endforeach
                <div class="clearfix"></div>
            </div>
        </div>
    </div>
</div>