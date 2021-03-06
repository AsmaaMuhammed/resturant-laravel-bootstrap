<div class="services">
    <div class="container">
        <div class="services-top">
            <div class="col-md-8 services-right animated wow fadeInLeft" data-wow-duration="1000ms"
                 data-wow-delay="500ms">
                <p>
                    @if($generalDesc->where('category',4)->first()!== null)
                        {{$generalDesc->where('category',4)->first()->desc}}
                    @else
                        'Services Description'
                    @endif
                </p>
            </div>
            <div class="col-md-4 services-left animated wow fadeInRight" data-wow-duration="1000ms"
                 data-wow-delay="500ms">
                <h3>Services</h3>
                <label><i class="glyphicon glyphicon-menu-up"></i></label>
                <span>
                    @if($generalDesc->where('category',4)->first()!== null)
                        {{$generalDesc->where('category',4)->first()->title}}
                    @else
                        'Services Title'
                    @endif
                </span>
            </div>
            <div class="clearfix"></div>
        </div>
        <div class="service-top">
            <div class="col-md-5 service-top animated wow fadeInLeft" data-wow-duration="1000ms" data-wow-delay="500ms">
                <div class=" service-grid">
                    <div class="col-md-6 service-grid1">
                        <div class="hi-icon-wrap hi-icon-effect-5 hi-icon-effect-5a">
                            <a href="#" class="hi-icon hi-icon-mobile glyphicon glyphicon-leaf"></a>
                        </div>
                    </div>
                    <div class="col-md-6 service-grid1">
                        <div class="hi-icon-wrap hi-icon-effect-5 hi-icon-effect-5a">
                            <a href="#" class="hi-icon hi-icon-mobile glyphicon glyphicon-star-empty"></a>
                        </div>
                    </div>
                    <div class="clearfix"></div>
                </div>
                <div class=" service-grid">
                    <div class="col-md-6 service-grid1">
                        <div class="hi-icon-wrap hi-icon-effect-5 hi-icon-effect-5a">
                            <a href="#" class="hi-icon hi-icon-mobile glyphicon glyphicon-folder-open"></a>
                        </div>
                    </div>
                    <div class="col-md-6 service-grid1">
                        <div class="hi-icon-wrap hi-icon-effect-5 hi-icon-effect-5a">
                            <a href="#" class="hi-icon hi-icon-mobile glyphicon glyphicon-home"></a>
                        </div>
                    </div>
                    <div class="clearfix"></div>
                </div>

            </div>
            <div class="col-md-7 service-bottom animated wow fadeInRight" data-wow-duration="1000ms"
                 data-wow-delay="500ms">

                @foreach($servicesData as $i=>$row)
                    <div class=" service-bottom1">
                        <div class=" ser-bottom">
                            <img src="{{ url('storage/'.$row->photo) }}" class="img-responsive" alt="">
                        </div>
                        <div class="ser-top ">
                            <h5>{{$row->title}}</h5>
                            <p>
                                {{$row->desc}}
                            </p>
                        </div>
                        <div class="clearfix"></div>
                    </div>
                @endforeach
            </div>
            <div class="clearfix"></div>
        </div>
    </div>
</div>