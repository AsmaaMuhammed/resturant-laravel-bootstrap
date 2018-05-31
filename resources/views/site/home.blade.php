@extends('layouts.frontend.app')

@section('content')
    <div class="content" id="content-down">
        @include('site.about',['generalDesc'=>$generalDesc, 'aboutData'=>$aboutData])
        @include('site.services',['generalDesc'=>$generalDesc, 'servicesData'=>$servicesData])
        @include('site.news',['generalDesc'=>$generalDesc, 'newsData'=>$newsData])
    </div>
@endsection
