<div class="content-top-top">
    <div class="container">
        <div class="content-top">
            <div class="col-md-4 content-left animated wow fadeInLeft" data-wow-duration="1000ms"
                 data-wow-delay="500ms">
                <h3>About</h3>
                <label><i class="glyphicon glyphicon-menu-up"></i></label>
                <span>
                    @if($generalDesc->where('category',1)->first()!== null)
                        {{$generalDesc->where('category',1)->first()->title}}
                    @else
                        'About Title'
                    @endif
                </span>
            </div>
            <div class="col-md-8 content-right animated wow fadeInRight" data-wow-duration="1000ms"
                 data-wow-delay="500ms">
                <p>
                    @if($generalDesc->where('category',1)->first()!== null)
                        {{$generalDesc->where('category',1)->first()->desc}}
                    @else
                        'About Description'
                    @endif
                </p>
            </div>
            <div class="clearfix"></div>
        </div>
        <div class="content-mid">
            @foreach($aboutData as $i=>$row)
                <div class="col-md-4 food-grid animated wow {{$row->id===1?'fadeInUp':$row->id===2?'fadeInLeft':'fadeInDown'}}" data-wow-duration="1000ms" data-wow-delay="500ms">
                    <div class=" hover-fold">
                        <h4>{{$row->title}}</h4>
                        <div class="top">
                            <div class="front face {{$row->id===1?'front1':'front2'}}"></div>
                            <div class="back face">
                                <p>
                                    {{$row->desc}}
                                </p>
                            </div>
                        </div>
                        <div class="bottom {{$row->id===1?'bottom1':'bottom2'}}"></div>
                    </div>
                </div>
            @endforeach

            <div class="clearfix"></div>
        </div>
    </div>
</div>