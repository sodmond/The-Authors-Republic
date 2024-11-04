<footer id="tg-footer" class="tg-footer tg-haslayout">
    <div class="tg-footerarea">
        <div class="container">
            <div class="row">
                <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
                    <ul class="tg-clientservices">
                        <li class="tg-devlivery">
                            <span class="tg-clientserviceicon"><i class="fa fa-rocket"></i></span>
                            <div class="tg-titlesubtitle">
                                <h3>Fast Delivery</h3>
                                <p>Shipping Worldwide</p>
                            </div>
                        </li>
                        <li class="tg-discount">
                            <span class="tg-clientserviceicon"><i class="fa fa-tag"></i></span>
                            <div class="tg-titlesubtitle">
                                <h3>Open Discount</h3>
                                <p>Offering Open Discount</p>
                            </div>
                        </li>
                        <li class="tg-quality">
                            <span class="tg-clientserviceicon"><i class="fa fa-leaf"></i></span>
                            <div class="tg-titlesubtitle">
                                <h3>Eyes On Quality</h3>
                                <p>Publishing Quality Work</p>
                            </div>
                        </li>
                        <li class="tg-support">
                            <span class="tg-clientserviceicon"><i class="fa fa-heart-o"></i></span>
                            <div class="tg-titlesubtitle">
                                <h3>24/7 Support</h3>
                                <p>Serving Every Moments</p>
                            </div>
                        </li>
                    </ul>
                </div>
                <div class="tg-threecolumns" style="padding-bottom:30px;">
                    <div class="col-xs-12 col-sm-6 col-md-4 col-lg-4">
                        <div class="tg-footercol">
                            <strong class="tg-logo"><a href="javascript:void(0);"><img src="{{ asset('img/logo-footer.jpg') }}" alt="The Authors Republic" style="max-width:190px;"></a></strong>
                            <ul class="tg-contactinfo">
                                <li>
                                    <i class="fa fa-phone"></i>
                                    <span>
                                        <em>0903 488 2719</em>
                                    </span>
                                </li>
                                <li>
                                    <i class="fa fa-envelope-o"></i>
                                    <span>
                                        <em><a href="mailto:orders@theauthorsrepublic.com">orders@theauthorsrepublic.com</a></em>
                                        <em><a href="mailto:info@theauthorsrepublic.com">info@theauthorsrepublic.com</a></em>
                                    </span>
                                </li>
                            </ul>
                            <ul class="tg-socialicons">
                                <li class="tg-facebook"><a href="https://web.facebook.com/profile.php?id=61567154038913" target="_blank"><i class="fa fa-facebook"></i></a></li>
                                <li class="tg-googleplus"><a href="https://instagram.com/Theauthorsrepublic" target="_blank"><i class="fa fa-instagram"></i></a></li>
                                <li class="tg-twitter"><a href="https://x.com/Theauthorsrepublic" target="_blank"><i class="fa fa-twitter"></i></a></li>
                                <li class="tg-googleplus"><a href="https://tiktok.com/@Theauthorsrepublic" target="_blank"><i class="fab fa-tiktok"></i></a></li>
                            </ul>
                        </div>
                    </div>
                    <div class="col-xs-12 col-sm-6 col-md-4 col-lg-4">
                        <div class="tg-footercol tg-widget tg-widgetnavigation">
                            <div class="tg-widgettitle">
                                <h3>Useful Links</h3>
                            </div>
                            <div class="tg-widgetcontent">
                                <ul>
                                    <li><a href="{{ route('tandc') }}">Terms & Conditions</a></li>
                                    <li><a href="javascript:void(0);">Returns Policy</a></li>
                                    <li><a href="javascript:void(0);">Privacy Policy</a></li>
                                </ul>
                                <ul>
                                    <li><a href="{{ route('about') }}">About Us</a></li>
                                    <li><a href="{{ route('authors') }}">Authors</a></li>
                                    <li><a href="{{ route('contact') }}">Contact Us</a></li>
                                    <li><a href="{{ route('faq') }}">FAQ</a></li>
                                </ul>
                            </div>
                        </div>
                    </div>
                    <div class="col-xs-12 col-sm-12 col-md-4 col-lg-4">
                        <div class="tg-footercol tg-widget tg-widgettopsellingauthors">
                            <div class="tg-widgettitle">
                                <h3>Latest Blog/Podcast</h3>
                            </div>
                            <div class="tg-widgetcontent">
                                <ul>
                                    @foreach($topAuthorBlogs as $blog)
                                    <li>
                                        @php 
                                            $slug = \App\Models\Article::getSlug($blog->title);
                                            $link = route('authors.blog', ['id' => $blog->id, 'slug' => $slug]);
                                        @endphp
                                        <figure><a href="{{ $link }}"><img src="{{ asset('storage/author/blog/image/thumbnail/'.$blog->image) }}" alt="image" style="max-width:70px;"></a></figure>
                                        <div class="tg-authornamebooks">
                                            <h4><a href="{{ $link }}">{{ ucwords($blog->title) }}</a></h4>
                                            {{--<p>By {{ ucwords($blog->author->firstname.' '.$blog->author->lastname) }}</p>--}}
                                            <p><i class="fa fa-calendar"></i><i>Published on: {{ date('M j, Y', strtotime($blog->published_at)) }}</i></p>
                                        </div>
                                    </li>
                                    @endforeach
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="tg-newsletter">
        <div class="container">
            <div class="row">
                <div class="col-xs-12 col-sm-12 col-md-6 col-lg-6">
                    <h4>Signup Newsletter!</h4>
                    <h5>Sign up to receive great offers and exciting updates from us</h5>
                </div>
                <div class="col-xs-12 col-sm-12 col-md-6 col-lg-6">
                    <form class="tg-formtheme tg-formnewsletter" method="POST" action="{{ route('newsletter') }}">
                        @csrf
                        <fieldset>
                            <input type="email" name="email" class="form-control" placeholder="Enter Your Email Address">
                            <button type="button"><i class="fa fa-envelope-o"></i></button>
                        </fieldset>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <div class="tg-footerbar">
        <a id="tg-btnbacktotop" class="tg-btnbacktotop" href="javascript:void(0);"><i class="fa fa-chevron-up"></i></a>
        <div class="container">
            <div class="row">
                <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
                    <span class="tg-paymenttype">Website by <a href="https://wmatechjunkies.com">WMA Tech Junkies</a></span>
                    <span class="tg-copyright">&copy; {{date('Y')}} All Rights Reserved By {{ config('app.name') }} | Powered by Just Curious Enterprises</span>
                </div>
            </div>
        </div>
    </div>
</footer>

<div class="modal" tabindex="-1" id="statusModal" style="z-index:9999;">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-body text-center">
                <p class="h5">Book Added to Cart</p>
                <img src="{{ asset('img/verified.gif') }}" alt="" style="width:120px;">
            </div>
        </div>
    </div>
</div>

<div class="modal" tabindex="-1" id="newsletterModal" style="z-index:9999;">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-body text-center">
                <p class="h5">You have successfully subscribed to our newsletter</p>
                <img src="{{ asset('img/verified.gif') }}" alt="" style="width:120px;">
            </div>
        </div>
    </div>
</div>

<div class="modal fade" tabindex="-1" id="searchModal" style="z-index:9999;">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            
        </div>
    </div>
</div>