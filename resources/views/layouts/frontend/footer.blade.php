<div class="footer">
    <div class="container">
        <div class="footer-head">
            <div class="col-md-8 footer-top animated wow fadeInRight" data-wow-duration="1000ms" data-wow-delay="500ms">
                <ul class=" in">
                    <li><a href="{{url('/')}}">Home</a></li>
                    <li><a  href="{{url('menu')}}">Menu</a></li>
                    <li><a  href="{{url('blog')}}">Blog</a></li>
                    <li><a  href="{{url('events')}}">Events</a></li>
                    <li><a  href="{{url('contacts')}}">Contact</a></li>
                </ul>
                <span>There are many variations of passages</span>
            </div>
            <div class="col-md-4 footer-bottom  animated wow fadeInLeft" data-wow-duration="1000ms" data-wow-delay="500ms">
                <h2>Follow Us</h2>
                <label><i class="glyphicon glyphicon-menu-up"></i></label>
                <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis.</p>
                <ul class="social-ic">
                    <li><a href="#"><i></i></a></li>
                    <li><a href="{{\App\Models\FollowUs::where('social_type','Google')->first()->value}}"><i class="ic"></i></a></li>
                    <li><a href="{{\App\Models\FollowUs::where('social_type','Instagram')->first()->value}}"><i class="ic1"></i></a></li>
                    <li><a href="{{\App\Models\FollowUs::where('social_type','Youtube')->first()->value}}"><i class="ic2"></i></a></li>
                    <li><a href="{{\App\Models\FollowUs::where('social_type','Facebook')->first()->value}}"><i class="ic3"></i></a></li>
                </ul>

            </div>
            <div class="clearfix"> </div>

        </div>
        <p class="footer-class animated wow bounce" data-wow-duration="1000ms" data-wow-delay="500ms">&copy; 2016 Cookery . All Rights Reserved | Design by  <a href="http://Asma.com/" target="_blank">Asma Company</a> </p>
    </div>
</div>