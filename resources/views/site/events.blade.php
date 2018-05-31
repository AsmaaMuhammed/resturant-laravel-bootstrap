@extends('layouts.frontend.app')
@section('content')
    <div class="content">
        <div class="events">
            <div class="container">
                <div class="events-top">
                    <div class="col-md-4 events-left animated wow fadeInLeft" data-wow-duration="1000ms"
                         data-wow-delay="500ms">
                        <h3>Events</h3>
                        <label><i class="glyphicon glyphicon-menu-up"></i></label>
                        <span>
                             @if($generalDesc->where('category',3)->first()!== null)
                                {{$generalDesc->where('category',3)->first()->title}}
                            @else
                                'Events Description'
                            @endif
                        </span>
                    </div>
                    <div class="col-md-8 events-right animated wow fadeInRight" data-wow-duration="1000ms"
                         data-wow-delay="500ms">
                        <p>
                            @if($generalDesc->where('category',3)->first()!== null)
                                {{$generalDesc->where('category',3)->first()->desc}}
                            @else
                                'Events Description'
                            @endif
                        </p>
                    </div>
                    <div class="clearfix"></div>
                </div>
                @foreach($events as $i=>$row)
                    <div class="events-bottom">
                        <div class="col-md-5 events-bottom1 animated wow fadeInRight" data-wow-duration="1000ms"
                             data-wow-delay="500ms">
                            <a href="{{url('comments/'.$row->id.'/event')}}"><img src="{{url('storage/'.$row->photo)}}" alt="" class="img-responsive"></a>
                        </div>
                        <div class="col-md-7 events-bottom2 animated wow fadeInLeft" data-wow-duration="1000ms"
                             data-wow-delay="500ms">
                            <h3>{{$row->title}}</h3>
                            <label><i class="glyphicon glyphicon-menu-up"></i></label>
                            <p>
                                {{$row->desc}}
                            </p>
                            <div class="read-more">
                                <a class="link link-yaku" href="{{url('comments/'.$row->id.'/event')}}">
                                    <span></span>
                                </a>
                            </div>
                        </div>
                        <div class="clearfix"></div>
                    </div>
                @endforeach
            </div>
        </div>
    </div>
@endsection