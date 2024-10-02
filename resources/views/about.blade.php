@extends('layouts.app', ['activePage' => 'about', 'title' => 'About Us'])

@section('content')
<!--************************************
        Call to Action Start
*************************************-->
<section class="tg-parallax tg-bgcalltoaction tg-haslayout" data-z-index="-100" data-appear-top-offset="600" data-parallax="scroll" {{--data-image-src="{{ asset('frontend/images/parallax/bgparallax-06.jpg') }}"--}}>
    <div class="tg-sectionspace tg-haslayout">
        <div class="container">
            <div class="row">
                <div class="col-xs-12 col-sm-12 col-md-6 col-lg-6 mb-3">
                    <div class="tg-calltoaction" style="padding-right:50px !important;">
                        <h2 style="color:#000;">Vision Statement</h2>
                        <h4>To create a vibrant and inclusive community that empowers authors, Poets and book writers to showcase their literary craftsmanship, 
                            collaborate, educate and inspire one another on their creative journey of shaping the society with words.</h4>
                    </div>
                </div>
                <div class="col-xs-12 col-sm-12 col-md-6 col-lg-6">
                    <div class="tg-calltoaction" style="padding-right:50px !important;">
                        <h2 style="color:#000;">Mission Statement</h2>
                        <h4>The Authors' Republic aims to be the unique digital platform that fosters connections, networking, facilitates the exchange of ideas, 
                            and provides opportunities for authors, Poets and book writers to grow, learn, and achieve their literary aspirations.</h4>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<!--************************************
        Call to Action End
*************************************-->

<section class="tg-haslayout">
    <div class="container">
        <div class="row">
            <div class="tg-aboutus">
                <div class="col-xs-12 col-sm-12 col-md-6 col-lg-6">
                    <div class="tg-aboutusshortcode">
                        <div class="tg-sectionhead">
                            <h2><span>Greetings &amp; Welcome</span>Know More About Us</h2>
                        </div>
                        <div class="tg-description">
                            <p>Where creativity thrives and voices unite</p>
                            <p>Consectetur adipisicing elit sed do eiusmod tempor incididunt labore toloregna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamcoiars nisiuip commodo consequat aute irure dolor in aprehenderit aveli esseati cillum dolor fugiat nulla pariatur cepteur sint occaecat cupidatat.</p>
                        </div>
                        <div class="tg-btns">
                            <a class="tg-btn tg-active" href="javascript:void(0);">Our History</a>
                            <a class="tg-btn" href="javascript:void(0);">Meet Our Team</a>
                        </div>
                    </div>
                </div>
                <div class="col-xs-12 col-sm-12 col-md-6 col-lg-6">
                    <figure>
                        <img src="{{ asset('frontend/images/placeholder.jpg') }}" alt="image description">
                        <iframe src="https://www.youtube.com/embed/acwr_Islo9A?rel=0&amp;controls=0&amp;showinfo=0"></iframe>
                    </figure>
                </div>
            </div>
        </div>
    </div>
</section>
<!--************************************
        About Us End
*************************************-->
<!--************************************
        Success Start
*************************************-->
<section class="tg-sectionspace tg-haslayout">
    <div class="container">
        <div class="row">
            <div class="tg-successstory">
                <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
                    <div class="tg-sectionhead">
                        <h2><span>Our Pride Moments</span>Journey of Success</h2>
                    </div>
                    <div id="tg-successslider" class="tg-successslider tg-success owl-carousel">
                        <div class="item">
                            <figure>
                                <img src="{{ asset('frontend/images/img-01.jpg') }}" alt="image description">
                            </figure>
                            <div class="tg-successcontent">
                                <div class="tg-sectionhead">
                                    <h2><span>June 27, 2017</span>First Step Toward Success</h2>
                                </div>
                                <div class="tg-description">
                                    <p>Consectetur adipisicing elit sed do eiusmod tempor incididunt labore toloregna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamcoiars nisiuip commodo consequat aute irure dolor in aprehenderit aveli esseati cillum dolor fugiat nulla pariatur cepteur sint occaecat cupidatat.</p>
                                </div>
                            </div>
                        </div>
                        <div class="item">
                            <figure>
                                <img src="{{ asset('frontend/images/img-01.jpg') }}" alt="image description">
                            </figure>
                            <div class="tg-successcontent">
                                <div class="tg-sectionhead">
                                    <h2><span>June 27, 2017</span>First Step Toward Success</h2>
                                </div>
                                <div class="tg-description">
                                    <p>Consectetur adipisicing elit sed do eiusmod tempor incididunt labore toloregna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamcoiars nisiuip commodo consequat aute irure dolor in aprehenderit aveli esseati cillum dolor fugiat nulla pariatur cepteur sint occaecat cupidatat.</p>
                                </div>
                            </div>
                        </div>
                        <div class="item">
                            <figure>
                                <img src="{{ asset('frontend/images/img-01.jpg') }}" alt="image description">
                            </figure>
                            <div class="tg-successcontent">
                                <div class="tg-sectionhead">
                                    <h2><span>June 27, 2017</span>First Step Toward Success</h2>
                                </div>
                                <div class="tg-description">
                                    <p>Consectetur adipisicing elit sed do eiusmod tempor incididunt labore toloregna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamcoiars nisiuip commodo consequat aute irure dolor in aprehenderit aveli esseati cillum dolor fugiat nulla pariatur cepteur sint occaecat cupidatat.</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<!--************************************
        Success End
*************************************-->
@endsection