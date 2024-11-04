@extends('layouts.app', ['activePage' => 'home', 'title' => ''])

@section('content')
<!--************************************
		Featured Books
*************************************-->
<section class="tg-sectionspace tg-haslayout" id="tg-homefeatured">
    <div class="container">
        <div class="row">
            <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
                <div class="tg-sectionhead">
                    <h2><span>People's Choice</span>Featured Books</h2>
                    <a class="tg-btn" href="{{ route('books') }}">View All</a>
                </div>
            </div>
            <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
                <div class="row">
                    @foreach ($featuredBooks as $book)
                        <div class="col-xs-6 col-sm-6 col-md-3 col-lg-3" style="">
                            <div class="panel panel-default shadow">
                                <div class="panel-body">
                                    @php $slug = \App\Models\Book::getSlug($book->title); @endphp
                                    <a href="{{ route('book', ['id' => $book->id, 'slug' => $slug]) }}"><img class="mb-3" src="{{ asset('storage/'.$book->image) }}" alt=""></a>
                                    <h5><a href="{{ route('book', ['id' => $book->id, 'slug' => $slug]) }}">{{ ucwords($book->title) }}</a></h5>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
            {{--<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
                <div id="tg-bestsellingbooksslider" class="tg-bestsellingbooksslider tg-bestsellingbooks owl-carousel">
                    @foreach($featuredBooks as $book)
                    <div class="item">
                        <div class="tg-postbook">
                            <figure class="tg-featureimg">
                                <div class="tg-bookimg">
                                    @php $bookImage = ($book->image != '') ? asset('storage/'.$book->image) : asset('frontend/images/books/img-01.jpg') @endphp
                                    <div class="tg-frontcover"><img src="{{ $bookImage }}" alt="book image"></div>
                                    <div class="tg-backcover"><img src="{{ $bookImage }}" alt="book image"></div>
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
            </div>--}}
        </div>
    </div>
</section>
<!--************************************
        Best Selling End
*************************************-->

<!--************************************
		Featured Item Start
*************************************-->
{{--@if(count($featuredBooks) > 0)
<section class="tg-bglight tg-haslayout" style="background:url('{{ asset("frontend/images/bg/03.jpg") }}'); background-position:center; background-size:cover;">
    <div class="overlay"></div>
    <div class="container">
        <div class="row">
            <div class="tg-featureditm" style="z-index:3;">
                <div class="col-xs-12 col-sm-12 col-md-4 col-lg-4" style="z-index:3;">
                    @php $bookImage = ($featuredBooks[0]->image != '') ? asset('storage/'.$featuredBooks[0]->image) : asset('frontend/images/books/img-01.jpg') @endphp
                    <figure><img src="{{ $bookImage }}" alt="image description" style="max-width:320px;"></figure>
                </div>
                <div class="col-xs-12 col-sm-12 col-md-8 col-lg-8" style="z-index:3;">
                    <div class="tg-featureditmcontent">
                        <div class="tg-themetagbox"><span class="tg-themetag">featured</span></div>
                        <div class="tg-booktitle">
                            <h3><a href="javascript:void(0);">{{ $featuredBooks[0]->title }}</a></h3>
                        </div>
                        <span class="tg-bookwriter">By: <a href="javascript:void(0);">{{ $featuredBooks[0]->author->firstname.' '.$books[0]->author->lastname }}</a></span>
                        <div class="tg-priceandbtn">
                            <span class="tg-bookprice">
                                <ins>₦{{ number_format($featuredBooks[0]->price, 2) }}</ins>
                            </span>
                            <form method="POST" action="{{ route('cart.add') }}">
                                @csrf
                                <input type="hidden" name="book_id" value="{{ $featuredBooks[0]->id }}">
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
@endif--}}
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
                            <div class="row">
                                @foreach($books as $book)
                                <div class="col-xs-6 col-sm-6 col-md-4 col-lg-2 col-6">
                                    <div class="tg-postbook">
                                        <figure class="tg-featureimg">
                                            <div class="tg-bookimg">
                                                @php $bookImage = ($book->image != '') ? asset('storage/'.$book->image) : asset('frontend/images/books/img-01.jpg') @endphp
                                                <div class="tg-frontcover"><img src="{{ $bookImage }}" alt="image description"></div>
                                                <div class="tg-backcover"><img src="{{ $bookImage }}" alt="image description"></div>
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
    </div>
</section>
<!--************************************
        New Release End
*************************************-->
<!--************************************
        Call to Action Start
*************************************-->
<section class="tg-parallax tg-bgcalltoaction tg-haslayout bg-custom">
    <div class="tg-sectionspace tg-haslayout" style="z-index:3;">
        <div class="container">
            <div class="row">
                <div class="col-xs-12 col-sm-12 col-md-6 col-lg-6">
                    <a class="btn btn-white2 col-md-12 col-xs-12 col-sm-12 mb-3" href="{{ route('author.register') }}">Join as an Author </i></a>
                    <a class="btn btn-white2 col-md-12 col-xs-12 col-sm-12 mb-3" href="https://paystack.com/pay/hloqr2f4w2" target="_blank">Donate </a>
                </div>
                <div class="col-xs-12 col-sm-12 col-md-6 col-lg-6">
                    <a class="btn btn-white2 col-md-12 col-xs-12 col-sm-12 mb-3" href="{{ route('forum') }}">Community Forum</a>
                    <a class="btn btn-white2 col-md-12 col-xs-12 col-sm-12 mb-3" href="{{ route('authors.corner') }}">Authors Corner</a>
                </div>
            </div>
        </div>
    </div>
</section>
{{--<section class="tg-parallax tg-bgcalltoaction tg-haslayout" data-z-index="-100" data-appear-top-offset="600" data-parallax="scroll" data-image-src="{{ asset('frontend/images/bg/03.jpg') }}">
    <div class="overlay" style=""></div>
    <div class="tg-sectionspace tg-haslayout" style="z-index:3;">
        <div class="container">
            <div class="row">
                <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
                    <div class="tg-calltoaction" style="z-index:3;">
                        <h2>Donate to our course</h2>
                        <h3>Support our course to helps improve the platform to a much better one</h3>
                        <a class="tg-btn tg-active" href="#">Donate</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>--}}
<!--************************************
        Call to Action End
*************************************-->
<!--************************************
        Authors Corner Start
*************************************-->
<section class="tg-sectionspace tg-haslayout">
    <div class="container">
        <div class="row">
            <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
                <div class="tg-sectionhead">
                    <h2><span>Authors Corner &amp; Articles</span>Blog & Podcasts by Authors</h2>
                    <a class="tg-btn" href="{{ route('authors.corner') }}">View All</a>
                </div>
            </div>
            <div id="tg-authorscornerslider" class="tg-postslider tg-blogpost owl-carousel">
                @foreach($authorsBlog as $article)
                <div class="item tg-author">
                    @php 
                        $slug = \App\Models\Article::getSlug($article->title);
                        $link = route('authors.blog', ['id' => $article->id, 'slug' => $slug]);
                    @endphp
                    <figure><a href="{{ $link }}"><img src="{{ asset('storage/author/blog/image/thumbnail/'.$article->image) }}" alt="article image"></a></figure>
                    <div class="tg-post">
                        <ul class="tg-bookscategories">
                            <li><a href="javascript:void(0);">{{ ucwords($article->type) }}</a></li>
                        </ul>
                        <div class="tg-posttitle">
                            <h3><a href="{{ $link }}">{{ $article->title }}</a></h3>
                        </div>
                        <span class="tg-bookwriter">By: <a href="javascript:void(0);">{{ $article->author->firstname.' '.$article->author->lastname }}</a></span>
                        <ul class="tg-postmetadata">
                            <li><a href="javascript:void(0);"><i class="fa fa-calendar"></i><i>Published on: {{ date('M j, Y', strtotime($article->published_at)) }}</i></a></li>
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
        Testimonials Start
*************************************-->
<section class="tg-parallax tg-bgtestimonials tg-haslayout" data-z-index="-100" data-appear-top-offset="600" data-parallax="scroll" id="homeTestimonal">
    {{--<div class="overlay" style=""></div>--}}
    <div class="tg-sectionspace tg-haslayout" {{--style="z-index:3;"--}}>
        <div class="container">
            <div class="row">
                <div class="col-xs-12 col-sm-12 col-md-12 col-lg-8 col-lg-push-2">
                    <div id="tg-testimonialsslider" class="tg-testimonialsslider tg-testimonials owl-carousel" style="z-index: 3">
                        <div class="item tg-testimonial">
                            <figure><img src="{{ asset('img/user-icon.png') }}" alt="image description"></figure>
                            <blockquote><q>Being an author can sometimes feel isolating, but this platform has changed everything for me.</q></blockquote>
                            <div class="tg-testimonialauthor">
                                <h3>Emmanuel</h3>
                            </div>
                        </div>
                        <div class="item tg-testimonial">
                            <figure><img src="{{ asset('img/user-icon.png') }}" alt="image description"></figure>
                            <blockquote><q>I never knew how much I needed a space like this until I joined. The supportive environment and the opportunity to showcase my stories have reignited my passion for writing. I’m thankful for the brains behind “the authors republic</q></blockquote>
                            <div class="tg-testimonialauthor">
                                <h3>Okechukwu</h3>
                            </div>
                        </div>
                        <div class="item tg-testimonial">
                            <figure><img src="{{ asset('img/user-icon.png') }}" alt="image description"></figure>
                            <blockquote><q>This platform is a dream come true for me with the ability to share my work and getting insights from fellow literary enthusiasts.</q></blockquote>
                            <div class="tg-testimonialauthor">
                                <h3>Sophia</h3>
                            </div>
                        </div>
                        <div class="item tg-testimonial">
                            <figure><img src="{{ asset('img/user-icon.png') }}" alt="image description"></figure>
                            <blockquote><q>As an aspiring author, “the authors republic” is the right place for me and coming at the right time.</q></blockquote>
                            <div class="tg-testimonialauthor">
                                <h3>Michael</h3>
                            </div>
                        </div>
                        <div class="item tg-testimonial">
                            <figure><img src="{{ asset('img/user-icon.png') }}" alt="image description"></figure>
                            <blockquote><q>This site has turned my solitary writing sessions into a collaborative adventure.</q></blockquote>
                            <div class="tg-testimonialauthor">
                                <h3>Lucas</h3>
                            </div>
                        </div>
                        <div class="item tg-testimonial">
                            <figure><img src="{{ asset('img/user-icon.png') }}" alt="image description"></figure>
                            <blockquote><q>As a reader who loves engaging with the authors directly, this platform has made that possible! I’ve discovered countless talented writers and enjoyed discussions with them about their works. It's an enriching experience that deepens my love for literature!</q></blockquote>
                            <div class="tg-testimonialauthor">
                                <h3>Oluwaseyi (Literary Enthusiast)</h3>
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
                <div class="row">
                    @foreach ($latestNews as $article)
                    <div class="col-xs-6 col-sm-6 col-md-3 col-lg-3">
                        @php 
                            $slug = \App\Models\Article::getSlug($article->title);
                            $link = route('news.get', ['id' => $article->id, 'slug' => $slug])
                        @endphp
                        <article class="tg-post">
                            <figure><a href="{{ $link }}"><img src="{{ asset('storage/'.$article->image) }}" alt="Articles Image"></a></figure>
                            <div class="tg-postcontent">
                                <ul class="tg-postmetadata">
                                    <li><i class="fa fa-calendar"></i> Published on: {{ date('M j, Y', strtotime($article->published_at)) }}</li>
                                </ul>
                                <ul class="tg-bookscategories"></ul>
                                <div class="tg-posttitle">
                                    <h3><a href="{{ $link }}">{{ strtoupper($article->title) }}</a></h3>
                                </div>
                                <span class="tg-bookwriter">By: <a href="javascript:void(0);">Admin</a></span>
                            </div>
                        </article>
                    </div>
                    @endforeach
                </div>
            </div>
            {{--<div id="tg-postslider" class="tg-postslider tg-blogpost owl-carousel">
                @foreach($latestNews as $news)
                <article class="item tg-post">
                    @php 
                        $slug = \App\Models\Article::getSlug($news->title);
                        $link = route('news.get', ['id' => $news->id, 'slug' => $slug]);
                        $newsImage = ($news->image != '') ? asset('storage/'.$news->image) : asset('frontend/images/blog/img-01.jpg');
                    @endphp
                    <figure><a href="{{ $link }}"><img src="{{ $newsImage }}" alt="article image"></a></figure>
                    <div class="tg-postcontent">
                        <div class="tg-posttitle">
                            <h3><a href="{{ $link }}">{{ $news->title }}</a></h3>
                        </div>
                        <span class="tg-bookwriter">By: <a href="javascript:void(0);">Admin</a></span>
                        <ul class="tg-postmetadata">
                            <li><a href="javascript:void(0);"><i class="fa fa-calendar"></i><i>Published on: {{ date('M j, Y', strtotime($news->published_at)) }}</i></a></li>
                        </ul>
                    </div>
                </article>
                @endforeach
            </div>--}}
        </div>
    </div>
</section>
<!--************************************
		Latest News End
*************************************-->
@endsection

@push('custom-scripts')
<script>
    $(document).ready(function() {
        $('.overlay').each(function() {
            var parentHeight = $(this).parent().height();
            $(this).height(parentHeight);
        });
    });
</script>
@endpush
