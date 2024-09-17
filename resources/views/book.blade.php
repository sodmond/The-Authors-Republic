@extends('layouts.app', ['activePage' => 'book', 'title' => ucwords($book->title)])

@section('content')
<div class="tg-sectionspace tg-haslayout">
    <div class="container">
        <div class="row">
            <div id="tg-twocolumns" class="tg-twocolumns">
                <div class="col-xs-12 col-sm-8 col-md-8 col-lg-9 pull-right">
                    <div id="tg-content" class="tg-content">
                        <div class="tg-productdetail">
                            <div class="row">
                                <div class="col-xs-12 col-sm-12 col-md-4 col-lg-4">
                                    <div class="tg-postbook">
                                        <figure class="tg-featureimg"><img src="{{ asset('frontend/images/books/img-07.jpg') }}" alt="image description"></figure>
                                        <div class="tg-postbookcontent">
                                            <a class="tg-btnaddtowishlist" href="javascript:void(0);">
                                                <i class="icon-heart"></i>
                                                <span>add to wishlist</span>
                                            </a>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-xs-12 col-sm-12 col-md-8 col-lg-8">
                                    <div class="tg-productcontent">
                                        <ul class="tg-bookscategories">
                                            <li><a href="javascript:void(0);">{{ \App\Models\Book::getCategoryName($book->category_id) }}</a></li>
                                        </ul>
                                        <div class="tg-booktitle">
                                            <h3>{{ $book->title }}</h3>
                                        </div>
                                        <span class="tg-bookwriter">By: <a href="javascript:void(0);">{{ ucwords($author->firstname.' '.$author->lastname) }}</a></span>
                                        <span class="tg-stars"><span></span></span>
                                        <span class="tg-addreviews"><a href="javascript:void(0);">Add Your Review</a></span>
                                        <div class="tg-share">
                                            <span>Share:</span>
                                            <ul class="tg-socialicons">
                                                <li class="tg-facebook"><a href="javascript:void(0);"><i class="fa fa-facebook"></i></a></li>
                                                <li class="tg-twitter"><a href="javascript:void(0);"><i class="fa fa-twitter"></i></a></li>
                                                <li class="tg-linkedin"><a href="javascript:void(0);"><i class="fa fa-linkedin"></i></a></li>
                                            </ul>
                                        </div>
                                        <form class="tg-postbook" method="POST" action="{{ route('cart.add') }}">
                                            @csrf
                                            <div class="tg-postbookcontent" style="margin-bottom:10px;">
                                                <span class="tg-bookprice">
                                                    <ins>₦{{ number_format($book->price, 2) }}</ins>
                                                </span>
                                                <ul class="tg-delevrystock">
                                                    <li><i class="icon-store"></i><span>Status: <em>In Stock</em></span></li>
                                                </ul>
                                                <div class="tg-quantityholder">
                                                    <em class="minus">-</em>
                                                    <input type="text" class="result" value="1" id="quantity1" name="quantity">
                                                    <em class="plus">+</em>
                                                </div>
                                            </div>
                                            <input type="hidden" name="book_id" value="{{ $book->id }}">
                                            <button class="tg-btn tg-active" type="submit">
                                                <i class="fa fa-shopping-cart"></i>
                                                <span>Add To Cart</span>
                                            </button>
                                        </form>
                                    </div>
                                </div>
                                <div class="tg-productdescription">
                                    <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
                                        <div class="tg-sectionhead">
                                            <h2>Product Details</h2>
                                        </div>
                                        <ul class="tg-themetabs" role="tablist">
                                            <li role="presentation" class="active"><a href="#details" data-toggle="tab">Details</a></li>
                                            <li role="presentation"><a href="#description" data-toggle="tab">Description</a></li>
                                            <li role="presentation"><a href="#review" data-toggle="tab">Reviews</a></li>
                                        </ul>
                                        <div class="tg-tab-content tab-content">
                                            <div role="tabpanel" class="tg-tab-pane tab-pane active" id="details">
                                                <ul class="tg-productinfo">
                                                    <li><span>Format:</span><span>Hardback</span></li>
                                                    <li><span>Pages:</span><span>528 pages</span></li>
                                                    <li><span>Publication Date:</span><span>June 27, 2017</span></li>
                                                    <li><span>Publisher:</span><span>{{ ucwords($author->firstname.' '.$author->lastname) }}</span></li>
                                                    <li><span>Language:</span><span>English</span></li>
                                                    <li><span>ISBN:</span><span>1234567890</span></li>
                                                    <li><span>Other Fomate:</span><span>CD-Audio, Paperback, E-Book</span></li>
                                                </ul>
                                            </div>
                                            <div role="tabpanel" class="tg-tab-pane tab-pane" id="description">
                                                <div class="tg-description">
                                                    <p>Consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veni quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenden voluptate velit esse cillum dolore eu fugiat nulla pariatur.</p>
                                                    <figure class="tg-alignleft">
                                                        <img src="{{ asset('frontend/images/placeholdervtwo.jpg') }}" alt="image description">
                                                        <iframe src="https://www.youtube.com/embed/aLwpuDpZm1k?rel=0&amp;controls=0&amp;showinfo=0"></iframe>
                                                    </figure>
                                                    <ul class="tg-liststyle">
                                                        <li><span>Sed do eiusmod tempor incididunt ut labore et dolore</span></li>
                                                        <li><span>Magna aliqua enim ad minim veniam</span></li>
                                                        <li><span>Quis nostrud exercitation ullamco laboris nisi ut</span></li>
                                                        <li><span>Aliquip ex ea commodo consequat aute dolor reprehenderit</span></li>
                                                        <li><span>Voluptate velit esse cillum dolore eu fugiat nulla pariatur</span></li>
                                                        <li><span>Magna aliqua enim ad minim veniam</span></li>
                                                        <li><span>Quis nostrud exercitation ullamco laboris nisi ut</span></li>
                                                    </ul>
                                                    <p>Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium doloremque laudantium, totam remmata aperiam, eaque ipsa quae ab illo inventore veritatis et quasi architecto beatae vitae dicta sunt explicabo. Nemo enimsam voluptatem quia voluptas sit aspernatur aut odit aut fugit, sed quia consequuntur magni dolores eos quistatoa.</p>
                                                </div>
                                            </div>
                                            <div role="tabpanel" class="tg-tab-pane tab-pane" id="review">
                                                <div class="tg-description">
                                                    <p>Consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veni quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenden voluptate velit esse cillum dolore eu fugiat nulla pariatur.</p>
                                                    <figure class="tg-alignleft">
                                                        <img src="{{ asset('frontend/images/placeholdervtwo.jpg') }}" alt="image description">
                                                        <iframe src="https://www.youtube.com/embed/aLwpuDpZm1k?rel=0&amp;controls=0&amp;showinfo=0"></iframe>
                                                    </figure>
                                                    <ul class="tg-liststyle">
                                                        <li><span>Sed do eiusmod tempor incididunt ut labore et dolore</span></li>
                                                        <li><span>Magna aliqua enim ad minim veniam</span></li>
                                                        <li><span>Quis nostrud exercitation ullamco laboris nisi ut</span></li>
                                                        <li><span>Aliquip ex ea commodo consequat aute dolor reprehenderit</span></li>
                                                        <li><span>Voluptate velit esse cillum dolore eu fugiat nulla pariatur</span></li>
                                                        <li><span>Magna aliqua enim ad minim veniam</span></li>
                                                        <li><span>Quis nostrud exercitation ullamco laboris nisi ut</span></li>
                                                    </ul>
                                                    <p>Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium doloremque laudantium, totam remmata aperiam, eaque ipsa quae ab illo inventore veritatis et quasi architecto beatae vitae dicta sunt explicabo. Nemo enimsam voluptatem quia voluptas sit aspernatur aut odit aut fugit, sed quia consequuntur magni dolores eos quistatoa.</p>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="tg-aboutauthor">
                                    <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
                                        <div class="tg-sectionhead">
                                            <h2>About Author</h2>
                                        </div>
                                        <div class="tg-authorbox">
                                            <figure class="tg-authorimg">
                                                <img src="{{ asset('frontend/images/author/imag-24.jpg') }}" alt="image description">
                                            </figure>
                                            <div class="tg-authorinfo">
                                                <div class="tg-authorhead">
                                                    <div class="tg-leftarea">
                                                        <div class="tg-authorname">
                                                            <h2>{{ ucwords($author->firstname.' '.$author->lastname) }}</h2>
                                                            @php $regDate = date('M jS, Y', strtotime($author->created_at)) @endphp
                                                            <span>Registered Since: {{ $regDate }}</span>
                                                        </div>
                                                    </div>
                                                    <div class="tg-rightarea">
                                                        <ul class="tg-socialicons">
                                                            <li class="tg-facebook"><a href="javascript:void(0);"><i class="fa fa-facebook"></i></a></li>
                                                            <li class="tg-twitter"><a href="javascript:void(0);"><i class="fa fa-twitter"></i></a></li>
                                                            <li class="tg-linkedin"><a href="javascript:void(0);"><i class="fa fa-linkedin"></i></a></li>
                                                        </ul>
                                                    </div>
                                                </div>
                                                <div class="tg-description">
                                                    <p>Laborum sed ut perspiciatis unde omnis iste natus sit voluptatem accusantium doloremque laudantium totam rem aperiam eaque ipsa quae ab illo inventore veritatis etation.</p>
                                                </div>
                                                <a class="tg-btn tg-active" href="javascript:void(0);">View All Books</a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                @include('layouts.partials.sidebar')         
            </div>
        </div>
    </div>
</div>
@endsection