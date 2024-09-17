@extends('layouts.app', ['activePage' => 'home', 'title' => ''])

@section('content')
<!--************************************
		Best Selling Start
*************************************-->
<section class="tg-sectionspace tg-haslayout">
    <div class="container">
        <div class="row">
            <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
                <div class="tg-sectionhead">
                    <h2><span>People's Choice</span>Bestselling Books</h2>
                    <a class="tg-btn" href="javascript:void(0);">View All</a>
                </div>
            </div>
            <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
                <div id="tg-bestsellingbooksslider" class="tg-bestsellingbooksslider tg-bestsellingbooks owl-carousel">
                    <div class="item">
                        <div class="tg-postbook">
                            <figure class="tg-featureimg">
                                <div class="tg-bookimg">
                                    <div class="tg-frontcover"><img src="{{ asset('frontend/images/books/img-01.jpg') }}" alt="image description"></div>
                                    <div class="tg-backcover"><img src="{{ asset('frontend/images/books/img-01.jpg') }}" alt="image description"></div>
                                </div>
                                <a class="tg-btnaddtowishlist" href="javascript:void(0);">
                                    <i class="icon-heart"></i>
                                    <span>add to wishlist</span>
                                </a>
                            </figure>
                            <div class="tg-postbookcontent">
                                <ul class="tg-bookscategories">
                                    <li><a href="javascript:void(0);">Adventure</a></li>
                                    <li><a href="javascript:void(0);">Fun</a></li>
                                </ul>
                                <div class="tg-themetagbox"><span class="tg-themetag">sale</span></div>
                                <div class="tg-booktitle">
                                    <h3><a href="javascript:void(0);">Help Me Find My Stomach</a></h3>
                                </div>
                                <span class="tg-bookwriter">By: <a href="javascript:void(0);">Angela Gunning</a></span>
                                <span class="tg-stars"><span></span></span>
                                <span class="tg-bookprice">
                                    <ins>$25.18</ins>
                                    <del>$27.20</del>
                                </span>
                                <a class="tg-btn tg-btnstyletwo" href="javascript:void(0);">
                                    <i class="fa fa-shopping-cart"></i>
                                    <em>Add to Cart</em>
                                </a>
                            </div>
                        </div>
                    </div>
                    <div class="item">
                        <div class="tg-postbook">
                            <figure class="tg-featureimg">
                                <div class="tg-bookimg">
                                    <div class="tg-frontcover"><img src="{{ asset('frontend/images/books/img-02.jpg') }}" alt="image description"></div>
                                    <div class="tg-backcover"><img src="{{ asset('frontend/images/books/img-02.jpg') }}" alt="image description"></div>
                                </div>
                                <a class="tg-btnaddtowishlist" href="javascript:void(0);">
                                    <i class="icon-heart"></i>
                                    <span>add to wishlist</span>
                                </a>
                            </figure>
                            <div class="tg-postbookcontent">
                                <ul class="tg-bookscategories">
                                    <li><a href="javascript:void(0);">Adventure</a></li>
                                    <li><a href="javascript:void(0);">Fun</a></li>
                                </ul>
                                <div class="tg-themetagbox"><span class="tg-themetag">sale</span></div>
                                <div class="tg-booktitle">
                                    <h3><a href="javascript:void(0);">Drive Safely, No Bumping</a></h3>
                                </div>
                                <span class="tg-bookwriter">By: <a href="javascript:void(0);">Angela Gunning</a></span>
                                <span class="tg-stars"><span></span></span>
                                <span class="tg-bookprice">
                                    <ins>$25.18</ins>
                                    <del>$27.20</del>
                                </span>
                                <a class="tg-btn tg-btnstyletwo" href="javascript:void(0);">
                                    <i class="fa fa-shopping-cart"></i>
                                    <em>Add to Cart</em>
                                </a>
                            </div>
                        </div>
                    </div>
                    <div class="item">
                        <div class="tg-postbook">
                            <figure class="tg-featureimg">
                                <div class="tg-bookimg">
                                    <div class="tg-frontcover"><img src="{{ asset('frontend/images/books/img-03.jpg') }}" alt="image description"></div>
                                    <div class="tg-backcover"><img src="{{ asset('frontend/images/books/img-03.jpg') }}" alt="image description"></div>
                                </div>
                                <a class="tg-btnaddtowishlist" href="javascript:void(0);">
                                    <i class="icon-heart"></i>
                                    <span>add to wishlist</span>
                                </a>
                            </figure>
                            <div class="tg-postbookcontent">
                                <ul class="tg-bookscategories">
                                    <li><a href="javascript:void(0);">Adventure</a></li>
                                    <li><a href="javascript:void(0);">Fun</a></li>
                                </ul>
                                <div class="tg-themetagbox"></div>
                                <div class="tg-booktitle">
                                    <h3><a href="javascript:void(0);">Let The Good Times Roll Up</a></h3>
                                </div>
                                <span class="tg-bookwriter">By: <a href="javascript:void(0);">Angela Gunning</a></span>
                                <span class="tg-stars"><span></span></span>
                                <span class="tg-bookprice">
                                    <ins>$25.18</ins>
                                    <del>$27.20</del>
                                </span>
                                <a class="tg-btn tg-btnstyletwo" href="javascript:void(0);">
                                    <i class="fa fa-shopping-cart"></i>
                                    <em>Add to Cart</em>
                                </a>
                            </div>
                        </div>
                    </div>
                    <div class="item">
                        <div class="tg-postbook">
                            <figure class="tg-featureimg">
                                <div class="tg-bookimg">
                                    <div class="tg-frontcover"><img src="{{ asset('frontend/images/books/img-04.jpg') }}" alt="image description"></div>
                                    <div class="tg-backcover"><img src="{{ asset('frontend/images/books/img-04.jpg') }}" alt="image description"></div>
                                </div>
                                <a class="tg-btnaddtowishlist" href="javascript:void(0);">
                                    <i class="icon-heart"></i>
                                    <span>add to wishlist</span>
                                </a>
                            </figure>
                            <div class="tg-postbookcontent">
                                <ul class="tg-bookscategories">
                                    <li><a href="javascript:void(0);">Adventure</a></li>
                                    <li><a href="javascript:void(0);">Fun</a></li>
                                </ul>
                                <div class="tg-themetagbox"><span class="tg-themetag">sale</span></div>
                                <div class="tg-booktitle">
                                    <h3><a href="javascript:void(0);">Our State Fair Is A Great State Fair</a></h3>
                                </div>
                                <span class="tg-bookwriter">By: <a href="javascript:void(0);">Angela Gunning</a></span>
                                <span class="tg-stars"><span></span></span>
                                <span class="tg-bookprice">
                                    <ins>$25.18</ins>
                                    <del>$27.20</del>
                                </span>
                                <a class="tg-btn tg-btnstyletwo" href="javascript:void(0);">
                                    <i class="fa fa-shopping-cart"></i>
                                    <em>Add to Cart</em>
                                </a>
                            </div>
                        </div>
                    </div>
                    <div class="item">
                        <div class="tg-postbook">
                            <figure class="tg-featureimg">
                                <div class="tg-bookimg">
                                    <div class="tg-frontcover"><img src="{{ asset('frontend/images/books/img-05.jpg') }}" alt="image description"></div>
                                    <div class="tg-backcover"><img src="{{ asset('frontend/images/books/img-05.jpg') }}" alt="image description"></div>
                                </div>
                                <a class="tg-btnaddtowishlist" href="javascript:void(0);">
                                    <i class="icon-heart"></i>
                                    <span>add to wishlist</span>
                                </a>
                            </figure>
                            <div class="tg-postbookcontent">
                                <ul class="tg-bookscategories">
                                    <li><a href="javascript:void(0);">Adventure</a></li>
                                    <li><a href="javascript:void(0);">Fun</a></li>
                                </ul>
                                <div class="tg-themetagbox"></div>
                                <div class="tg-booktitle">
                                    <h3><a href="javascript:void(0);">Put The Petal To The Metal</a></h3>
                                </div>
                                <span class="tg-bookwriter">By: <a href="javascript:void(0);">Angela Gunning</a></span>
                                <span class="tg-stars"><span></span></span>
                                <span class="tg-bookprice">
                                    <ins>$25.18</ins>
                                    <del>$27.20</del>
                                </span>
                                <a class="tg-btn tg-btnstyletwo" href="javascript:void(0);">
                                    <i class="fa fa-shopping-cart"></i>
                                    <em>Add to Cart</em>
                                </a>
                            </div>
                        </div>
                    </div>
                    <div class="item">
                        <div class="tg-postbook">
                            <figure class="tg-featureimg">
                                <div class="tg-bookimg">
                                    <div class="tg-frontcover"><img src="{{ asset('frontend/images/books/img-06.jpg') }}" alt="image description"></div>
                                    <div class="tg-backcover"><img src="{{ asset('frontend/images/books/img-06.jpg') }}" alt="image description"></div>
                                </div>
                                <a class="tg-btnaddtowishlist" href="javascript:void(0);">
                                    <i class="icon-heart"></i>
                                    <span>add to wishlist</span>
                                </a>
                            </figure>
                            <div class="tg-postbookcontent">
                                <ul class="tg-bookscategories">
                                    <li><a href="javascript:void(0);">Adventure</a></li>
                                    <li><a href="javascript:void(0);">Fun</a></li>
                                </ul>
                                <div class="tg-themetagbox"><span class="tg-themetag">sale</span></div>
                                <div class="tg-booktitle">
                                    <h3><a href="javascript:void(0);">Help Me Find My Stomach</a></h3>
                                </div>
                                <span class="tg-bookwriter">By: <a href="javascript:void(0);">Angela Gunning</a></span>
                                <span class="tg-stars"><span></span></span>
                                <span class="tg-bookprice">
                                    <ins>$25.18</ins>
                                    <del>$27.20</del>
                                </span>
                                <a class="tg-btn tg-btnstyletwo" href="javascript:void(0);">
                                    <i class="fa fa-shopping-cart"></i>
                                    <em>Add to Cart</em>
                                </a>
                            </div>
                        </div>
                    </div>
                    <div class="item">
                        <div class="tg-postbook">
                            <figure class="tg-featureimg">
                                <div class="tg-bookimg">
                                    <div class="tg-frontcover"><img src="{{ asset('frontend/images/books/img-03.jpg') }}" alt="image description"></div>
                                    <div class="tg-backcover"><img src="{{ asset('frontend/images/books/img-03.jpg') }}" alt="image description"></div>
                                </div>
                                <a class="tg-btnaddtowishlist" href="javascript:void(0);">
                                    <i class="icon-heart"></i>
                                    <span>add to wishlist</span>
                                </a>
                            </figure>
                            <div class="tg-postbookcontent">
                                <ul class="tg-bookscategories">
                                    <li><a href="javascript:void(0);">Adventure</a></li>
                                    <li><a href="javascript:void(0);">Fun</a></li>
                                </ul>
                                <div class="tg-themetagbox"></div>
                                <div class="tg-booktitle">
                                    <h3><a href="javascript:void(0);">Let The Good Times Roll Up</a></h3>
                                </div>
                                <span class="tg-bookwriter">By: <a href="javascript:void(0);">Angela Gunning</a></span>
                                <span class="tg-stars"><span></span></span>
                                <span class="tg-bookprice">
                                    <ins>$25.18</ins>
                                    <del>$27.20</del>
                                </span>
                                <a class="tg-btn tg-btnstyletwo" href="javascript:void(0);">
                                    <i class="fa fa-shopping-cart"></i>
                                    <em>Add to Cart</em>
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<!--************************************
        Best Selling End
*************************************-->
<!--************************************
        Collection Count Start
*************************************-->
<section class="tg-parallax tg-bgcollectioncount tg-haslayout" data-z-index="-100" data-appear-top-offset="600" data-parallax="scroll" data-image-src="{{ asset('frontend/images/bg/01.jpg') }}">
    <div class="tg-sectionspace tg-collectioncount tg-haslayout">
        <div class="container">
            <div class="row">
                <div id="tg-collectioncounters" class="tg-collectioncounters">
                    <div class="tg-collectioncounter tg-drama">
                        <div class="tg-collectioncountericon">
                            <i class="icon-bubble"></i>
                        </div>
                        <div class="tg-titlepluscounter">
                            <h2>Drama</h2>
                            <h3 data-from="0" data-to="6179213" data-speed="8000" data-refresh-interval="50">6,179,213</h3>
                        </div>
                    </div>
                    <div class="tg-collectioncounter tg-horror">
                        <div class="tg-collectioncountericon">
                            <i class="icon-heart-pulse"></i>
                        </div>
                        <div class="tg-titlepluscounter">
                            <h2>Horror</h2>
                            <h3 data-from="0" data-to="3121242" data-speed="8000" data-refresh-interval="50">3,121,242</h3>
                        </div>
                    </div>
                    <div class="tg-collectioncounter tg-romance">
                        <div class="tg-collectioncountericon">
                            <i class="icon-heart"></i>
                        </div>
                        <div class="tg-titlepluscounter">
                            <h2>Romance</h2>
                            <h3 data-from="0" data-to="2101012" data-speed="8000" data-refresh-interval="50">2,101,012</h3>
                        </div>
                    </div>
                    <div class="tg-collectioncounter tg-fashion">
                        <div class="tg-collectioncountericon">
                            <i class="icon-star"></i>
                        </div>
                        <div class="tg-titlepluscounter">
                            <h2>Fashion</h2>
                            <h3 data-from="0" data-to="1158245" data-speed="8000" data-refresh-interval="50">1,158,245</h3>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<!--************************************
        Collection Count End
*************************************-->
<!--************************************
        New Release Start
*************************************-->
<section class="tg-sectionspace tg-haslayout">
    <div class="container">
        <div class="row">
            <div class="tg-newrelease">
                <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
                    <div class="tg-sectionhead">
                        <h2><span>Taste The New Spice</span>New Release Books</h2>
                    </div>
                    <div class="tg-description">
                        <p>Consectetur adipisicing elit sed do eiusmod tempor incididunt labore toloregna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamcoiars nisiuip commodo consequat aute irure dolor in aprehenderit aveli esseati cillum dolor fugiat nulla pariatur cepteur sint occaecat cupidatat.</p>
                    </div>
                    <div class="tg-products">
                        <div class="tg-productgrid">
                            @foreach($books as $book)
                            <div class="col-xs-6 col-sm-6 col-md-4 col-lg-2">
                                <div class="tg-postbook">
                                    <figure class="tg-featureimg">
                                        <div class="tg-bookimg">
                                            <div class="tg-frontcover"><img src="{{ asset('frontend/images/books/img-01.jpg') }}" alt="image description"></div>
                                            <div class="tg-backcover"><img src="{{ asset('frontend/images/books/img-01.jpg') }}" alt="image description"></div>
                                        </div>
                                        <a class="tg-btnaddtowishlist" href="javascript:void(0);">
                                            <i class="icon-heart"></i>
                                            <span>add to wishlist</span>
                                        </a>
                                    </figure>
                                    <div class="tg-postbookcontent">
                                        <ul class="tg-bookscategories">
                                            <li><a href="javascript:void(0);">{{ \App\Models\Book::getCategoryName($book->category_id) }}</a></li>
                                        </ul>
                                        <div class="tg-themetagbox"><span class="tg-themetag">sale</span></div>
                                        <div class="tg-booktitle">
                                            @php $slug = \App\Models\Book::getSlug($book->title); @endphp
                                            <h3><a href="{{ route('book', ['id' => $book->id, 'slug' => $slug]) }}">{{ ucwords($book->title) }}</a></h3>
                                        </div>
                                        <span class="tg-bookwriter">By: <a href="javascript:void(0);">Angela Gunning</a></span>
                                        <span class="tg-stars"><span></span></span>
                                        <span class="tg-bookprice">
                                            <ins>$25.18</ins>
                                            <del>$27.20</del>
                                        </span>
                                        <a class="tg-btn tg-btnstyletwo" href="javascript:void(0);">
                                            <i class="fa fa-shopping-cart"></i>
                                            <em>Add To Cart</em>
                                        </a>
                                    </div>
                                </div>
                            </div>
                            @endforeach
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<!--************************************
        New Release End
*************************************-->
<!--************************************
        Testimonials Start
*************************************-->
<section class="tg-parallax tg-bgtestimonials tg-haslayout" data-z-index="-100" data-appear-top-offset="600" data-parallax="scroll" data-image-src="{{ asset('frontend/images/bg/02.jpg') }}">
    <div class="tg-sectionspace tg-haslayout">
        <div class="container">
            <div class="row">
                <div class="col-xs-12 col-sm-12 col-md-12 col-lg-8 col-lg-push-2">
                    <div id="tg-testimonialsslider" class="tg-testimonialsslider tg-testimonials owl-carousel">
                        <div class="item tg-testimonial">
                            <figure><img src="{{ asset('frontend/images/author/imag-02.jpg') }}" alt="image description"></figure>
                            <blockquote><q>Consectetur adipisicing elit sed do eiusmod tempor incididunt ut labore tolore magna aliqua enim ad minim veniam, quis nostrud exercitation ullamcoiars nisi ut aliquip commodo.</q></blockquote>
                            <div class="tg-testimonialauthor">
                                <h3>Holli Fenstermacher</h3>
                                <span>Manager @ CIFP</span>
                            </div>
                        </div>
                        <div class="item tg-testimonial">
                            <figure><img src="{{ asset('frontend/images/author/imag-02.jpg') }}" alt="image description"></figure>
                            <blockquote><q>Consectetur adipisicing elit sed do eiusmod tempor incididunt ut labore tolore magna aliqua enim ad minim veniam, quis nostrud exercitation ullamcoiars nisi ut aliquip commodo.</q></blockquote>
                            <div class="tg-testimonialauthor">
                                <h3>Holli Fenstermacher</h3>
                                <span>Manager @ CIFP</span>
                            </div>
                        </div>
                        <div class="item tg-testimonial">
                            <figure><img src="{{ asset('frontend/images/author/imag-02.jpg') }}" alt="image description"></figure>
                            <blockquote><q>Consectetur adipisicing elit sed do eiusmod tempor incididunt ut labore tolore magna aliqua enim ad minim veniam, quis nostrud exercitation ullamcoiars nisi ut aliquip commodo.</q></blockquote>
                            <div class="tg-testimonialauthor">
                                <h3>Holli Fenstermacher</h3>
                                <span>Manager @ CIFP</span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<!--************************************
        Testimonials End
*************************************-->
<!--************************************
        Authors Start
*************************************-->
<section class="tg-sectionspace tg-haslayout">
    <div class="container">
        <div class="row">
            <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
                <div class="tg-sectionhead">
                    <h2><span>Strong Minds Behind Us</span>Most Popular Authors</h2>
                    <a class="tg-btn" href="javascript:void(0);">View All</a>
                </div>
            </div>
            <div id="tg-authorsslider" class="tg-authors tg-authorsslider owl-carousel">
                <div class="item tg-author">
                    <figure><a href="javascript:void(0);"><img src="{{ asset('frontend/images/author/imag-03.jpg') }}" alt="image description"></a></figure>
                    <div class="tg-authorcontent">
                        <h2><a href="javascript:void(0);">Jude Morphew</a></h2>
                        <span>21,658 Published Books</span>
                        <ul class="tg-socialicons">
                            <li class="tg-facebook"><a href="javascript:void(0);"><i class="fa fa-facebook"></i></a></li>
                            <li class="tg-twitter"><a href="javascript:void(0);"><i class="fa fa-twitter"></i></a></li>
                            <li class="tg-linkedin"><a href="javascript:void(0);"><i class="fa fa-linkedin"></i></a></li>
                        </ul>
                    </div>
                </div>
                <div class="item tg-author">
                    <figure><a href="javascript:void(0);"><img src="{{ asset('frontend/images/author/imag-04.jpg') }}" alt="image description"></a></figure>
                    <div class="tg-authorcontent">
                        <h2><a href="javascript:void(0);">Book Burger</a></h2>
                        <span>20,257 Published Books</span>
                        <ul class="tg-socialicons">
                            <li class="tg-facebook"><a href="javascript:void(0);"><i class="fa fa-facebook"></i></a></li>
                            <li class="tg-twitter"><a href="javascript:void(0);"><i class="fa fa-twitter"></i></a></li>
                            <li class="tg-linkedin"><a href="javascript:void(0);"><i class="fa fa-linkedin"></i></a></li>
                        </ul>
                    </div>
                </div>
                <div class="item tg-author">
                    <figure><a href="javascript:void(0);"><img src="{{ asset('frontend/images/author/imag-05.jpg') }}" alt="image description"></a></figure>
                    <div class="tg-authorcontent">
                        <h2><a href="javascript:void(0);">Book Ship &amp; Co.</a></h2>
                        <span>15,686 Published Books</span>
                        <ul class="tg-socialicons">
                            <li class="tg-facebook"><a href="javascript:void(0);"><i class="fa fa-facebook"></i></a></li>
                            <li class="tg-twitter"><a href="javascript:void(0);"><i class="fa fa-twitter"></i></a></li>
                            <li class="tg-linkedin"><a href="javascript:void(0);"><i class="fa fa-linkedin"></i></a></li>
                        </ul>
                    </div>
                </div>
                <div class="item tg-author">
                    <figure><a href="javascript:void(0);"><img src="{{ asset('frontend/images/author/imag-06.jpg') }}" alt="image description"></a></figure>
                    <div class="tg-authorcontent">
                        <h2><a href="javascript:void(0);">Enoch Gallion</a></h2>
                        <span>12,435 Published Books</span>
                        <ul class="tg-socialicons">
                            <li class="tg-facebook"><a href="javascript:void(0);"><i class="fa fa-facebook"></i></a></li>
                            <li class="tg-twitter"><a href="javascript:void(0);"><i class="fa fa-twitter"></i></a></li>
                            <li class="tg-linkedin"><a href="javascript:void(0);"><i class="fa fa-linkedin"></i></a></li>
                        </ul>
                    </div>
                </div>
                <div class="item tg-author">
                    <figure><a href="javascript:void(0);"><img src="{{ asset('frontend/images/author/imag-07.jpg') }}" alt="image description"></a></figure>
                    <div class="tg-authorcontent">
                        <h2><a href="javascript:void(0);">Book House</a></h2>
                        <span>15,953 Published Books</span>
                        <ul class="tg-socialicons">
                            <li class="tg-facebook"><a href="javascript:void(0);"><i class="fa fa-facebook"></i></a></li>
                            <li class="tg-twitter"><a href="javascript:void(0);"><i class="fa fa-twitter"></i></a></li>
                            <li class="tg-linkedin"><a href="javascript:void(0);"><i class="fa fa-linkedin"></i></a></li>
                        </ul>
                    </div>
                </div>
                <div class="item tg-author">
                    <figure><a href="javascript:void(0);"><img src="{{ asset('frontend/images/author/imag-08.jpg') }}" alt="image description"></a></figure>
                    <div class="tg-authorcontent">
                        <h2><a href="javascript:void(0);">Linnie Klimek</a></h2>
                        <span>65,720 Published Books</span>
                        <ul class="tg-socialicons">
                            <li class="tg-facebook"><a href="javascript:void(0);"><i class="fa fa-facebook"></i></a></li>
                            <li class="tg-twitter"><a href="javascript:void(0);"><i class="fa fa-twitter"></i></a></li>
                            <li class="tg-linkedin"><a href="javascript:void(0);"><i class="fa fa-linkedin"></i></a></li>
                        </ul>
                    </div>
                </div>
                <div class="item tg-author">
                    <figure><a href="javascript:void(0);"><img src="{{ asset('frontend/images/author/imag-05.jpg') }}" alt="image description"></a></figure>
                    <div class="tg-authorcontent">
                        <h2><a href="javascript:void(0);">Book Ship &amp; Co.</a></h2>
                        <span>15,686 Published Books</span>
                        <ul class="tg-socialicons">
                            <li class="tg-facebook"><a href="javascript:void(0);"><i class="fa fa-facebook"></i></a></li>
                            <li class="tg-twitter"><a href="javascript:void(0);"><i class="fa fa-twitter"></i></a></li>
                            <li class="tg-linkedin"><a href="javascript:void(0);"><i class="fa fa-linkedin"></i></a></li>
                        </ul>
                    </div>
                </div>
                <div class="item tg-author">
                    <figure><a href="javascript:void(0);"><img src="{{ asset('frontend/images/author/imag-06.jpg') }}" alt="image description"></a></figure>
                    <div class="tg-authorcontent">
                        <h2><a href="javascript:void(0);">Enoch Gallion</a></h2>
                        <span>12,435 Published Books</span>
                        <ul class="tg-socialicons">
                            <li class="tg-facebook"><a href="javascript:void(0);"><i class="fa fa-facebook"></i></a></li>
                            <li class="tg-twitter"><a href="javascript:void(0);"><i class="fa fa-twitter"></i></a></li>
                            <li class="tg-linkedin"><a href="javascript:void(0);"><i class="fa fa-linkedin"></i></a></li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<!--************************************
        Authors End
*************************************-->
<!--************************************
        Call to Action Start
*************************************-->
<section class="tg-parallax tg-bgcalltoaction tg-haslayout" data-z-index="-100" data-appear-top-offset="600" data-parallax="scroll" data-image-src="{{ asset('frontend/images/bg/03.jpg') }}">
    <div class="tg-sectionspace tg-haslayout">
        <div class="container">
            <div class="row">
                <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
                    <div class="tg-calltoaction">
                        <h2>Open Discount For All</h2>
                        <h3>Consectetur adipisicing elit sed do eiusmod tempor incididunt ut labore et dolore.</h3>
                        <a class="tg-btn tg-active" href="javascript:void(0);">Read More</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<!--************************************
        Call to Action End
*************************************-->
<!--************************************
        Latest News Start
*************************************-->
<section class="tg-sectionspace tg-haslayout">
    <div class="container">
        <div class="row">
            <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
                <div class="tg-sectionhead">
                    <h2><span>Latest News &amp; Articles</span>What's Hot in The News</h2>
                    <a class="tg-btn" href="javascript:void(0);">View All</a>
                </div>
            </div>
            <div id="tg-postslider" class="tg-postslider tg-blogpost owl-carousel">
                <article class="item tg-post">
                    <figure><a href="javascript:void(0);"><img src="{{ asset('frontend/images/blog/img-01.jpg') }}" alt="image description"></a></figure>
                    <div class="tg-postcontent">
                        <ul class="tg-bookscategories">
                            <li><a href="javascript:void(0);">Adventure</a></li>
                            <li><a href="javascript:void(0);">Fun</a></li>
                        </ul>
                        <div class="tg-themetagbox"><span class="tg-themetag">featured</span></div>
                        <div class="tg-posttitle">
                            <h3><a href="javascript:void(0);">Where The Wild Things Are</a></h3>
                        </div>
                        <span class="tg-bookwriter">By: <a href="javascript:void(0);">Kathrine Culbertson</a></span>
                        <ul class="tg-postmetadata">
                            <li><a href="javascript:void(0);"><i class="fa fa-comment-o"></i><i>21,415 Comments</i></a></li>
                            <li><a href="javascript:void(0);"><i class="fa fa-eye"></i><i>24,565 Views</i></a></li>
                        </ul>
                    </div>
                </article>
                <article class="item tg-post">
                    <figure><a href="javascript:void(0);"><img src="{{ asset('frontend/images/blog/img-02.jpg') }}" alt="image description"></a></figure>
                    <div class="tg-postcontent">
                        <ul class="tg-bookscategories">
                            <li><a href="javascript:void(0);">Adventure</a></li>
                            <li><a href="javascript:void(0);">Fun</a></li>
                        </ul>
                        <div class="tg-themetagbox"><span class="tg-themetag">featured</span></div>
                        <div class="tg-posttitle">
                            <h3><a href="javascript:void(0);">All She Wants To Do Is Dance</a></h3>
                        </div>
                        <span class="tg-bookwriter">By: <a href="javascript:void(0);">Kathrine Culbertson</a></span>
                        <ul class="tg-postmetadata">
                            <li><a href="javascript:void(0);"><i class="fa fa-comment-o"></i><i>21,415 Comments</i></a></li>
                            <li><a href="javascript:void(0);"><i class="fa fa-eye"></i><i>24,565 Views</i></a></li>
                        </ul>
                    </div>
                </article>
                <article class="item tg-post">
                    <figure><a href="javascript:void(0);"><img src="{{ asset('frontend/images/blog/img-03.jpg') }}" alt="image description"></a></figure>
                    <div class="tg-postcontent">
                        <ul class="tg-bookscategories">
                            <li><a href="javascript:void(0);">Adventure</a></li>
                            <li><a href="javascript:void(0);">Fun</a></li>
                        </ul>
                        <div class="tg-themetagbox"><span class="tg-themetag">featured</span></div>
                        <div class="tg-posttitle">
                            <h3><a href="javascript:void(0);">Why Walk When You Can Climb?</a></h3>
                        </div>
                        <span class="tg-bookwriter">By: <a href="javascript:void(0);">Kathrine Culbertson</a></span>
                        <ul class="tg-postmetadata">
                            <li><a href="javascript:void(0);"><i class="fa fa-comment-o"></i><i>21,415 Comments</i></a></li>
                            <li><a href="javascript:void(0);"><i class="fa fa-eye"></i><i>24,565 Views</i></a></li>
                        </ul>
                    </div>
                </article>
                <article class="item tg-post">
                    <figure><a href="javascript:void(0);"><img src="{{ asset('frontend/images/blog/img-04.jpg') }}" alt="image description"></a></figure>
                    <div class="tg-postcontent">
                        <ul class="tg-bookscategories">
                            <li><a href="javascript:void(0);">Adventure</a></li>
                            <li><a href="javascript:void(0);">Fun</a></li>
                        </ul>
                        <div class="tg-themetagbox"><span class="tg-themetag">featured</span></div>
                        <div class="tg-posttitle">
                            <h3><a href="javascript:void(0);">Dance Like Nobody’s Watching</a></h3>
                        </div>
                        <span class="tg-bookwriter">By: <a href="javascript:void(0);">Kathrine Culbertson</a></span>
                        <ul class="tg-postmetadata">
                            <li><a href="javascript:void(0);"><i class="fa fa-comment-o"></i><i>21,415 Comments</i></a></li>
                            <li><a href="javascript:void(0);"><i class="fa fa-eye"></i><i>24,565 Views</i></a></li>
                        </ul>
                    </div>
                </article>
                <article class="item tg-post">
                    <figure><a href="javascript:void(0);"><img src="{{ asset('frontend/images/blog/img-02.jpg') }}" alt="image description"></a></figure>
                    <div class="tg-postcontent">
                        <ul class="tg-bookscategories">
                            <li><a href="javascript:void(0);">Adventure</a></li>
                            <li><a href="javascript:void(0);">Fun</a></li>
                        </ul>
                        <div class="tg-themetagbox"><span class="tg-themetag">featured</span></div>
                        <div class="tg-posttitle">
                            <h3><a href="javascript:void(0);">All She Wants To Do Is Dance</a></h3>
                        </div>
                        <span class="tg-bookwriter">By: <a href="javascript:void(0);">Kathrine Culbertson</a></span>
                        <ul class="tg-postmetadata">
                            <li><a href="javascript:void(0);"><i class="fa fa-comment-o"></i><i>21,415 Comments</i></a></li>
                            <li><a href="javascript:void(0);"><i class="fa fa-eye"></i><i>24,565 Views</i></a></li>
                        </ul>
                    </div>
                </article>
                <article class="item tg-post">
                    <figure><a href="javascript:void(0);"><img src="{{ asset('frontend/images/blog/img-03.jpg') }}" alt="image description"></a></figure>
                    <div class="tg-postcontent">
                        <ul class="tg-bookscategories">
                            <li><a href="javascript:void(0);">Adventure</a></li>
                            <li><a href="javascript:void(0);">Fun</a></li>
                        </ul>
                        <div class="tg-themetagbox"><span class="tg-themetag">featured</span></div>
                        <div class="tg-posttitle">
                            <h3><a href="javascript:void(0);">Why Walk When You Can Climb?</a></h3>
                        </div>
                        <span class="tg-bookwriter">By: <a href="javascript:void(0);">Kathrine Culbertson</a></span>
                        <ul class="tg-postmetadata">
                            <li><a href="javascript:void(0);"><i class="fa fa-comment-o"></i><i>21,415 Comments</i></a></li>
                            <li><a href="javascript:void(0);"><i class="fa fa-eye"></i><i>24,565 Views</i></a></li>
                        </ul>
                    </div>
                </article>
            </div>
        </div>
    </div>
</section>
<!--************************************
		Latest News End
*************************************-->
@endsection
