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
                    {{--<a class="tg-btn" href="javascript:void(0);">View All</a>--}}
                </div>
            </div>
            <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
                <div id="tg-bestsellingbooksslider" class="tg-bestsellingbooksslider tg-bestsellingbooks owl-carousel">
                    @foreach($books as $book)
                    <div class="item">
                        <div class="tg-postbook">
                            <figure class="tg-featureimg">
                                <div class="tg-bookimg">
                                    <div class="tg-frontcover"><img src="{{ asset('frontend/images/books/img-01.jpg') }}" alt="image description"></div>
                                    <div class="tg-backcover"><img src="{{ asset('frontend/images/books/img-01.jpg') }}" alt="image description"></div>
                                </div>
                                <form action="{{ route('user.wishlist.add') }}" method="post">
                                    @csrf
                                    <input type="hidden" name="book_id" value="{{ $book->id }}">
                                    <button type="submit" class="tg-btnaddtowishlist">
                                        <i class="icon-heart"></i>
                                        <span>add to wishlist</span>
                                    </button>
                                </form>
                            </figure>
                            <div class="tg-postbookcontent">
                                <ul class="tg-bookscategories">
                                    <li><a href="javascript:void(0);">{{ \App\Models\Book::getCategoryName($book->category_id) }}</a></li>
                                </ul>
                                <div class="tg-booktitle">
                                    @php $slug = \App\Models\Book::getSlug($book->title); @endphp
                                    <h3><a href="{{ route('book', ['id' => $book->id, 'slug' => $slug]) }}">{{ ucwords($book->title) }}</a></h3>
                                </div>
                                <span class="tg-bookwriter">By: <a href="javascript:void(0);">{{ $book->author->firstname.' '.$book->lastname }}</a></span>
                                <span class="tg-bookprice">
                                    <ins>₦{{ number_format($book->price, 2) }}</ins>
                                </span>
                                <form method="POST" action="{{ route('cart.add') }}">
                                    @csrf
                                    <input type="hidden" name="book_id" value="{{ $book->id }}">
                                    <input type="hidden" name="quantity" value="1">
                                    <button class="tg-btn tg-btnstyletwo" href="javascript:void(0);">
                                        <i class="fa fa-shopping-cart"></i>
                                        <em>Add To Cart</em>
                                    </button>
                                </form>
                            </div>
                        </div>
                    </div>
                    @endforeach
                </div>
            </div>
        </div>
    </div>
</section>
<!--************************************
        Best Selling End
*************************************-->

<!--************************************
		Featured Item Start
*************************************-->
<section class="tg-bglight tg-haslayout" style="background:url('{{ asset("frontend/images/bg/03.jpg") }}'); background-position:center; background-size:cover;">
    <div class="overlay"></div>
    <div class="container">
        <div class="row">
            <div class="tg-featureditm" style="z-index:3;">
                <div class="col-xs-12 col-sm-12 col-md-4 col-lg-4" style="z-index:3;">
                    <figure><img src="{{ asset('frontend/images/img-02.png') }}" alt="image description"></figure>
                </div>
                <div class="col-xs-12 col-sm-12 col-md-8 col-lg-8" style="z-index:3;">
                    <div class="tg-featureditmcontent">
                        <div class="tg-themetagbox"><span class="tg-themetag">featured</span></div>
                        <div class="tg-booktitle">
                            <h3><a href="javascript:void(0);">{{ $books[0]->title }}</a></h3>
                        </div>
                        <span class="tg-bookwriter">By: <a href="javascript:void(0);">{{ $books[0]->author->firstname.' '.$books[0]->author->lastname }}</a></span>
                        <div class="tg-priceandbtn">
                            <span class="tg-bookprice">
                                <ins>₦{{ number_format($books[0]->price, 2) }}</ins>
                            </span>
                            <form method="POST" action="{{ route('cart.add') }}">
                                @csrf
                                <input type="hidden" name="book_id" value="{{ $book->id }}">
                                <input type="hidden" name="quantity" value="1">
                                <button class="tg-btn tg-btnstyletwo tg-active" href="javascript:void(0);">
                                    <i class="fa fa-shopping-cart"></i>
                                    <em>Add To Cart</em>
                                </button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<!--************************************
		Featured Item End
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
                                        <form action="{{ route('user.wishlist.add') }}" method="post">
                                            @csrf
                                            <input type="hidden" name="book_id" value="{{ $book->id }}">
                                            <button type="submit" class="tg-btnaddtowishlist">
                                                <i class="icon-heart"></i>
                                                <span>add to wishlist</span>
                                            </button>
                                        </form>
                                    </figure>
                                    <div class="tg-postbookcontent">
                                        <ul class="tg-bookscategories">
                                            <li><a href="javascript:void(0);">{{ \App\Models\Book::getCategoryName($book->category_id) }}</a></li>
                                        </ul>
                                        <div class="tg-booktitle">
                                            @php $slug = \App\Models\Book::getSlug($book->title); @endphp
                                            <h3><a href="{{ route('book', ['id' => $book->id, 'slug' => $slug]) }}">{{ ucwords($book->title) }}</a></h3>
                                        </div>
                                        <span class="tg-bookwriter">By: <a href="javascript:void(0);">{{ $book->author->firstname.' '.$book->author->lastname }}</a></span>
                                        <span class="tg-bookprice">
                                            <ins>₦{{ number_format($book->price, 2) }}</ins>
                                        </span>
                                        <form method="POST" action="{{ route('cart.add') }}">
                                            @csrf
                                            <input type="hidden" name="book_id" value="{{ $book->id }}">
                                            <input type="hidden" name="quantity" value="1">
                                            <button class="tg-btn tg-btnstyletwo" href="javascript:void(0);">
                                                <i class="fa fa-shopping-cart"></i>
                                                <em>Add To Cart</em>
                                            </button>
                                        </form>
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
<section class="tg-parallax tg-bgtestimonials tg-haslayout" data-z-index="-100" data-appear-top-offset="600" data-parallax="scroll" data-image-src="{{ asset('frontend/images/bg/02.jpg') }}" id="homeTestimonal">
    <div class="overlay" style=""></div>
    <div class="tg-sectionspace tg-haslayout" style="z-index:3;">
        <div class="container">
            <div class="row">
                <div class="col-xs-12 col-sm-12 col-md-12 col-lg-8 col-lg-push-2">
                    <div id="tg-testimonialsslider" class="tg-testimonialsslider tg-testimonials owl-carousel" style="z-index: 3">
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
                    <a class="tg-btn" href="{{ route('authors') }}">View All</a>
                </div>
            </div>
            <div id="tg-authorsslider" class="tg-authors tg-authorsslider owl-carousel">
                @foreach($authors as $author)
                <div class="item tg-author">
                    @php 
                        $slug = \App\Models\Author::getSlug($author->firstname, $author->lastname);
                        $authorLink = route('author', ['id' => $author->id, 'slug' => $slug])
                    @endphp
                    <figure><a href="{{ $authorLink }}"><img src="{{ asset('frontend/images/author/imag-03.jpg') }}" alt="image description"></a></figure>
                    <div class="tg-authorcontent">
                        <h2><a href="{{ $authorLink }}">{{ ucwords($author->firstname.' '.$author->lastname) }}</a></h2>
                        <span>{{ count($author->books) }} Published Books</span>
                        <ul class="tg-socialicons">
                            <li class="tg-facebook"><a href="javascript:void(0);"><i class="fa fa-facebook"></i></a></li>
                            <li class="tg-twitter"><a href="javascript:void(0);"><i class="fa fa-twitter"></i></a></li>
                            <li class="tg-linkedin"><a href="javascript:void(0);"><i class="fa fa-linkedin"></i></a></li>
                        </ul>
                    </div>
                </div>
                @endforeach
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
    <div class="overlay" style=""></div>
    <div class="tg-sectionspace tg-haslayout" style="z-index:3;">
        <div class="container">
            <div class="row">
                <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
                    <div class="tg-calltoaction" style="z-index:3;">
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
                    <a class="tg-btn" href="{{ route('news') }}">View All</a>
                </div>
            </div>
            <div id="tg-postslider" class="tg-postslider tg-blogpost owl-carousel">
                @foreach($latestNews as $news)
                <article class="item tg-post">
                    @php 
                        $slug = \App\Models\Article::getSlug($news->title);
                        $link = route('news.get', ['id' => $news->id, 'slug' => $slug])
                    @endphp
                    <figure><a href="{{ $link }}"><img src="{{ asset('frontend/images/blog/img-01.jpg') }}" alt="image description"></a></figure>
                    <div class="tg-postcontent">
                        <div class="tg-posttitle">
                            <h3><a href="{{ $link }}">Where The Wild Things Are</a></h3>
                        </div>
                        <span class="tg-bookwriter">By: <a href="javascript:void(0);">Admin</a></span>
                        <ul class="tg-postmetadata">
                            <li><a href="javascript:void(0);"><i class="fa fa-calendar"></i><i>Published on: {{ date('M j, Y', strtotime($news->published_at)) }}</i></a></li>
                        </ul>
                    </div>
                </article>
                @endforeach
            </div>
        </div>
    </div>
</section>
<!--************************************
		Latest News End
*************************************-->
@endsection

@push('custom-scripts')
<script>
    $('.tg-homeslider.owl-carousel').owlCarousel({
        autoplay:true,
        loop:true,
        margin:10,
        responsiveClass:true,
        responsive:{
            0:{
                items:1,
                dots:true,
            },
            600:{
                items:1,
                dots:true
            },
            1000:{
                items:1,
                dots:true
            }
        }
    });
    $(document).ready(function() {
        $('.overlay').each(function() {
            var parentHeight = $(this).parent().height();
            $(this).height(parentHeight);
            //alert($(this).height());
        });
    });
</script>
@endpush
