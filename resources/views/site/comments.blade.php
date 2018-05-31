@extends('layouts.frontend.app')
@section('scripts')
    <script>
        $(document).ready(function () {
            $('.replybtn').on('click', function () {
                var action = $('#action-form').val();
                var hostAddress = action.split('/')[2];
                var newAction = 'http://' + hostAddress + '/reply';
                $('#form1').attr('action', newAction);
                $('#action-form').val(newAction);
                var comment_id = $(this).val();
                $('#comment_id').val(comment_id);
                $('html, body').animate({
                    scrollTop: $("#leave").offset().top
                }, 2000);
            });
            var popupMeta = {
                width: 400,
                height: 400
            };
            $(document).on('click', '.social-share', function(event){
                event.preventDefault();

                var vPosition = Math.floor(($(window).width() - popupMeta.width) / 2);
                var hPosition = Math.floor(($(window).height() - popupMeta.height) / 2);

                var url = $(this).attr('href');
                var popup = window.open(url, 'Social Share',
                        'width='+popupMeta.width+',height='+popupMeta.height+
                        ',left='+vPosition+',top='+hPosition+
                        ',location=0,menubar=0,toolbar=0,status=0,scrollbars=1,resizable=1');

                if (popup) {
                    popup.focus();
                    return false;
                }
            });
        });
    </script>
@endsection
@section('content')
    <div class="blog">
        <div class="container">

            <div class="col-md-9 ">
                <!--content-->
                <div class="single">

                    <div class="single-top">
                        <img class="img-responsive wow fadeInUp animated" width="100%" height="20% !important"
                             data-wow-delay=".5s"
                             src="{{url('storage/'.$row->photo)}}"
                             alt=""/>
                        <div class="lone-line">
                            <h4>{{$row->title}}</h4>
                            <ul class="grid-blog">
                                <li><span><i class="glyphicon glyphicon-time"> </i>{{$row->created_at}}</span></li>
                                <li><a href="#"><i class="glyphicon glyphicon-comment"> </i>{{$row->comments->count()}}
                                        Comment</a></li>
                                {{--<li><a href="{{url('share')}}"><i class="glyphicon glyphicon-share"> </i>Share</a></li>--}}
                                <li>
                                    <a href="https://www.facebook.com/sharer/sharer.php?u={{ urlencode(Request::fullUrl()) }}"
                                       target="_blank" class="social-share fa fa-facebook">
                                        Share
                                    </a>
                                </li>
                                <li>
                                    <a href="https://twitter.com/intent/tweet?url={{ urlencode(Request::fullUrl()) }}"
                                       target="_blank" class="social-share fa fa-twitter">
                                        Share
                                    </a>
                                </li>
                                <li>
                                    <a href="https://plus.google.com/share?url={{ urlencode(Request::fullUrl()) }}"
                                       target="_blank" class="social-share fa fa-google">
                                        Share
                                    </a>
                                </li>
                            </ul>
                            <p class="wow fadeInLeft animated" data-wow-delay=".5s">
                                {{$row->desc}}
                            </p>
                        </div>
                    </div>
                    <div class="comment">
                        <h3>Comments</h3>
                        @foreach($row->comments as $comment)
                            <div class="media wow fadeInLeft animated" data-wow-delay=".5s">
                                <div class="code-in">
                                    <p class="smith"><a href="#">{{$comment->client->name}}</a>
                                        <span>{{$comment->created_at}}</span>
                                    </p>

                                    <p class="reply">
                                        <button class="replybtn" value="{{$comment->id}}">
                                            REPLY
                                        </button>
                                    </p>

                                    <div class="clearfix"></div>
                                </div>
                                <div class="media-left">
                                    <a href="#">
                                        <img src="{{url('storage/'.$comment->client->photo)}}" alt="">
                                    </a>
                                </div>
                                <div class="media-body">

                                    <p>
                                        {{$comment->comment}}
                                    </p>

                                </div>
                            </div>

                            @foreach($comment->replies as $reply)
                                <div class="media media-1 wow fadeInUp animated" data-wow-delay=".5s">
                                    <div class="code-in">
                                        <p class="smith"><a href="#"> {{$reply->client->name}}</a>
                                            <span>{{$reply->created_at}}</span></p>
                                        <div class="clearfix"></div>
                                    </div>
                                    <div class="media-left">
                                        <a href="#">
                                            <img src="{{url('storage/'.$reply->client->photo)}}" alt="">
                                        </a>
                                    </div>
                                    <div class="media-body">

                                        <p>
                                            {{$reply->reply}}
                                        </p>
                                    </div>
                                </div>
                            @endforeach
                        @endforeach
                    </div>
                    <div class="leave" id="leave">
                        <h3>Leave a comment</h3>
                        <form method="POST" id="form1" action="{{url('add-comment')}}" accept-charset="UTF-8"
                              class="form-horizontal"
                              enctype="multipart/form-data">
                            {{ csrf_field() }}

                            <input type="hidden" value="{{url($action)}}" id="action-form">
                            <input type="hidden" value="{{$row->id}}" name="type_id">
                            <input type="hidden" name="comment_id" id="comment_id">
                            <input type="hidden" value="{{request()->segment(3)}}" name="type">

                            <div class="single-grid wow fadeInLeft animated" data-wow-delay=".5s">

                                <input type="text" name="name" required placeholder="Name" onfocus="this.value='';"
                                       onblur="if (this.value == '') {this.value = 'Name';}">

                                <input type="text" name="email" required placeholder="E-mail" onfocus="this.value='';"
                                       onblur="if (this.value == '') {this.value = 'E-mail';}">

                                <input type="text" name="phone" required placeholder="Phone" onfocus="this.value='';"
                                       onblur="if (this.value == '') {this.value = 'Phone';}">

                                <br> <br>

                                <input id="photo" required name="photo" type="file">
                                <button class="btn btn-default" id="reset-image-uploader" type="button">reset</button>

                                <textarea name="comment" required onfocus="this.value='';"
                                          onblur="if (this.value == '') {this.value = 'Comment';}"></textarea>
                                <label class="hvr-rectangle-out">
                                    <input type="submit" value="Send">
                                </label>
                            </div>
                        </form>
                    </div>

                </div>
                <!---->
                <!--//content-->

            </div>
            @include('layouts.frontend.sidebar',['posts'=>\App\Models\Post::all()])
            <div class="clearfix"></div>
        </div>
    </div>
@endsection
