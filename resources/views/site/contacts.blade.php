@extends('layouts.frontend.app')
@section('content')
    <div class="contact">
        <div class="container">
            <div class="menu-top">
                <div class="col-md-4 menu-left animated wow fadeInLeft" data-wow-duration="1000ms"
                     data-wow-delay="500ms">
                    <h3>Contact</h3>
                    <label><i class="glyphicon glyphicon-menu-up"></i></label>
                    <span>
                         @if($generalDesc->where('category',7)->first()!== null)
                            {{$generalDesc->where('category',7)->first()->title}}
                        @else
                            'About Description'
                        @endif
                    </span>
                </div>
                <div class="col-md-8 menu-right animated wow fadeInRight" data-wow-duration="1000ms"
                     data-wow-delay="500ms">
                    <p>
                        @if($generalDesc->where('category',7)->first()!== null)
                            {{$generalDesc->where('category',7)->first()->desc}}
                        @else
                            'About Description'
                        @endif
                    </p>
                </div>
                <div class="clearfix"></div>
            </div>
            <div class="contact-top">
                <div class="col-md-5 contact-map">
                    <h5>Google Map</h5>
                    <div class="map animated wow fadeInUp" data-wow-duration="1000ms" data-wow-delay="500ms">
                        <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d37494223.23909492!2d103!3d55!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x453c569a896724fb%3A0x1409fdf86611f613!2sRussia!5e0!3m2!1sen!2sin!4v1415776049771"></iframe>

                    </div>
                    {{--<div class="address">--}}
                        {{--<h4>Address</h4>--}}
                        {{--<p> Richard McClintock</p>--}}
                        {{--<p>Letraset sheets </p>--}}
                        {{--<p>ph : +123 859 6050</p>--}}
                        {{--<p>Email : <a href="mailto:example@gmail.com">example@gmail.com</a></p>--}}
                    {{--</div>--}}
                </div>
                <div class="col-md-7 contact-para animated wow fadeInDown" data-wow-duration="1000ms"
                     data-wow-delay="500ms">
                    <h5>Contact Form</h5>
                    <form method="POST" action="{{ url('contacts') }}" accept-charset="UTF-8" class="form-horizontal"
                          enctype="multipart/form-data">
                        {{ csrf_field() }}
                        <div class="grid-contact">
                            <div class="col-md-6 contact-grid">
                                <p class="your-para">Name </p>
                                <input required name="name" type="text" value="" onfocus="this.value='';"
                                       onblur="if (this.value == '') {this.value ='';}">
                            </div>
                            <div class="col-md-6 contact-grid">
                                <p class="your-para">Phone number</p>
                                <input required name="phone" type="text" value="" onfocus="this.value='';"
                                       onblur="if (this.value == '') {this.value ='';}">
                            </div>
                            <div class="clearfix"></div>
                        </div>
                        <div class="grid-contact">
                            <div class="col-md-6 contact-grid">
                                <p class="your-para">Email</p>
                                <input required name="email" type="email" value="" onfocus="this.value='';"
                                       onblur="if (this.value == '') {this.value ='';}">
                            </div>
                            <div class="clearfix"></div>
                        </div>
                        <p class="your-para msg-para">MESSAGE</p>
                        <textarea required name="message" cols="77" rows="6" value=" " onfocus="this.value='';"
                                  onblur="if (this.value == '') {this.value = '';}"></textarea>
                        <div class="send">
                            <input type="submit" value="Send ">
                        </div>
                    </form>
                </div>

                <div class="clearfix"></div>
            </div>
        </div>
    </div>
@endsection