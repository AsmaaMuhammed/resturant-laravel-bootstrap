@extends('layouts.frontend.app')
@section('content')
    <div class="menu">
        <div class="container">
            <div class="menu-top">
                <div class="col-md-4 menu-left animated wow fadeInLeft" data-wow-duration="1000ms"
                     data-wow-delay="500ms">
                    <h3>Menu</h3>
                    <label><i class="glyphicon glyphicon-menu-up"></i></label>
                    <span>
                        @if($generalDesc->where('category',2)->first()!== null)
                            {{$generalDesc->where('category',2)->first()->title}}
                        @else
                            'About Description'
                        @endif
                    </span>
                </div>
                <div class="col-md-8 menu-right animated wow fadeInRight" data-wow-duration="1000ms"
                     data-wow-delay="500ms">
                    <p>
                        @if($generalDesc->where('category',2)->first()!== null)
                            {{$generalDesc->where('category',2)->first()->desc}}
                        @else
                            'About Description'
                        @endif
                    </p>
                </div>
                <div class="clearfix"></div>
            </div>

            <div class="menu-bottom animated wow fadeInUp" data-wow-duration="1000ms" data-wow-delay="500ms">
                @foreach($dishes as $i=>$row)
                    <div class="col-md-4 menu-bottom1">
                        <div class="btm-right">
                            <a href="{{url('comments/'.$row->id.'/dish')}}">
                                <img src="{{ url('storage/'.$row->photo) }}" alt="" class="img-responsive">
                                <div class="captn">
                                    <h4>{{$row->title}}</h4>
                                    <p>${{$row->price}}</p>
                                </div>
                            </a>
                        </div>
                    </div>
                @endforeach
                <div class="clearfix"></div>
            </div>
        </div>
    </div>
@endsection