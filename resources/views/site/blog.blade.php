@extends('layouts.frontend.app')
@section('content')
    <div class="blog">
        <div class="container">
            <div class="menu-top">
                <div class="col-md-4 menu-left">
                    <h3>Blog</h3>
                    <label><i class="glyphicon glyphicon-menu-up"></i></label>
                    <span>
                    @if($generalDesc->where('category',5)->first()!== null)
                            {{$generalDesc->where('category',5)->first()->title}}
                        @else
                            'Blog Description'
                        @endif
                </span>
                </div>
                <div class="col-md-8 menu-right">
                    <p>
                        @if($generalDesc->where('category',5)->first()!== null)
                            {{$generalDesc->where('category',5)->first()->desc}}
                        @else
                            'Blog Description'
                        @endif
                    </p>
                </div>
                <div class="clearfix"></div>
            </div>
            <form>
                <div class="col-md-9 blog-header">
                    <div class=" blog-head">
                        @foreach($dishes as $i=>$row)
                            <div class="col-md-4 blog-top">
                                <div class="blog-in">
                                    <a href="{{url('comments/'.$row->id.'/dish')}}">
                                        <img src="{{ url('storage/'.$row->photo) }}" alt="" class="img-responsive">
                                    </a>
                                    <div class="blog-grid">
                                        <h3>
                                            <a href="{{url('menu')}}">
                                                {{$row->title}}
                                                <input type="hidden" name="title" value="{{$row->title}}">
                                            </a>
                                        </h3>
                                        <div class="date">
                                        <span class="date-in"><i class="glyphicon glyphicon-calendar"> </i>
                                            {{$row->created_at}}
                                        </span>
                                            <a href="{{url('comments/'.$row->id.'/dish')}}" class="comments">
                                                <i class="glyphicon glyphicon-comment"></i>
                                                {{$row->comments->count()}}
                                            </a>
                                            <div class="clearfix"></div>
                                        </div>
                                        <p>
                                            {{$row->desc}}
                                        </p>
                                        <div class="more">
                                            <a class="link link-yaku">
                                                <span></span>
                                            </a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    </div>
                </div>
            </form>
            @include('layouts.frontend.sidebar',['posts'=>\App\Models\Post::all()])
        </div>
    </div>
@endsection