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
                                        @php $bookImage = ($book->image != '') ? asset('storage/'.$book->image) : asset('frontend/images/books/img-01.jpg') @endphp
                                        <figure class="tg-featureimg"><img src="{{ $bookImage }}" alt="book image"></figure>
                                        <div class="tg-postbookcontent">
                                            <form action="{{ route('user.wishlist.add') }}" method="post">
                                                @csrf
                                                <input type="hidden" name="book_id" value="{{ $book->id }}">
                                                <button type="submit" class="tg-btnaddtowishlist">
                                                    <i class="icon-heart"></i>
                                                    <span>add to wishlist</span>
                                                </button>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-xs-12 col-sm-12 col-md-8 col-lg-8 mb-3">
                                    <div class="tg-productcontent">
                                        <ul class="tg-bookscategories">
                                            <li><a href="javascript:void(0);">{{ \App\Models\Book::getCategoryName($book->category_id) }}</a></li>
                                        </ul>
                                        <div class="tg-booktitle">
                                            <h3>{{ $book->title }}</h3>
                                        </div>
                                        <span class="tg-bookwriter">By: <a href="javascript:void(0);">{{ ucwords($author->firstname.' '.$author->lastname) }}</a></span>
                                        {{--<span class="tg-stars"><span></span></span>
                                        <span class="tg-addreviews"><a href="javascript:void(0);">Add Your Review</a></span>--}}
                                        <div class="tg-share">
                                            <span>Share:</span>
                                            <ul class="tg-socialicons">
                                                <li class="tg-facebook"><a href="{{ 'https://www.facebook.com/sharer/sharer.php?u='.url()->full() }}" target="_blank">
                                                    <i class="fa fa-facebook"></i></a></li>
                                                <li class="tg-twitter"><a href="{{ 'https://x.com/intent/post?text='.$book->title.'&url='.url()->full() }}" target="_blank">
                                                    <i class="fa fa-twitter"></i></a></li>
                                                <li class="tg-linkedin"><a href="{{ 'https://www.linkedin.com/shareArticle/?mini=true&url='.url()->full().'&title='.$book->title }}" target="_blank">
                                                    <i class="fa fa-linkedin"></i></a></li>
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
                                            <h2>Book Details</h2>
                                        </div>
                                        <ul class="tg-themetabs" role="tablist">
                                            <li role="presentation" class="active"><a href="#details" data-toggle="tab">Details</a></li>
                                            <li role="presentation"><a href="#description" data-toggle="tab">Description</a></li>
                                            <li role="presentation"><a href="#review" data-toggle="tab">Reviews ({{ count($book->bookReviews) }})</a></li>
                                        </ul>
                                        <div class="tg-tab-content tab-content">
                                            <div role="tabpanel" class="tg-tab-pane tab-pane active" id="details">
                                                <ul class="tg-productinfo">
                                                    <li><span>Soft Copy:</span><span>{{ ($book->soft_copy == true) ? 'YES' : 'NO' }}</span></li>
                                                    <li><span>Hard Copy:</span><span>{{ ($book->hard_copy == true) ? 'YES' : 'NO' }}</span></li>
                                                    <li><span>Published Date:</span><span>{{ date('M j, Y', strtotime($book->published_at)) }}</span></li>
                                                    <li><span>Publisher:</span><span>{{ ucwords($author->firstname.' '.$author->lastname) }}</span></li>
                                                    <li><span>ISBN:</span><span>{{ $book->isbn }}</span></li>
                                                    <li><span>Pages Number:</span><span>{{ $book->pages_number }}</span></li>
                                                </ul>
                                            </div>
                                            <div role="tabpanel" class="tg-tab-pane tab-pane" id="description">
                                                <div class="tg-description">
                                                    @php echo Illuminate\Support\Facades\Storage::get('books/contents/'.$book->description); @endphp
                                                </div>
                                            </div>
                                            <div role="tabpanel" class="tg-tab-pane tab-pane" id="review">
                                                <div class="">
                                                    @if (auth('web')->check())
                                                        <form class="mb-2" action="{{ route('user.book.review', ['id' => $book->id]) }}" method="post" style="padding-bottom:20px;">
                                                            @csrf
                                                            <div class="form-group">
                                                                <textarea class="form-control" name="comment" id="comment" placeholder="Write comment here" required>{{ old('comment') }}</textarea>
                                                            </div>
                                                            <div class="form-group">
                                                                <input type="number" name="rating" id="rating1" class="rating" data-clearable="" required>
                                                            </div>
                                                            <button type="submit" class="tg-btn tg-active">Submit</button>
                                                        </form>
                                                    @else
                                                        <div class="text-center mb-2">
                                                            <p><em>Login To Add Your Review</em></p>
                                                            <a class="tg-btn tg-active" href="{{ route('login') }}">Login</a>
                                                        </div>
                                                    @endif
                                                    <div id="tg-comments" class="tg-comments" style="padding-top:10px; border-top:1px solid #CCC;">
                                                        @if (count($book->bookReviews) > 0)
                                                            @foreach ($book->bookReviews as $review)                                                        
                                                                <div class="tg-authorbox">
                                                                    <figure class="tg-authorimg">
                                                                        <img src="{{ asset('frontend/images/author/imag-24.jpg') }}" alt="image">
                                                                    </figure>
                                                                    <div class="tg-authorinfo">
                                                                        <div class="tg-authorhead">
                                                                            <div class="tg-leftarea">
                                                                                <div class="tg-authorname">
                                                                                    @php $user = \App\Models\User::find($review->user_id); @endphp
                                                                                    <h2>{{ $user->firstname.' '.$user->lastname }}</h2>
                                                                                    <span> {{ $review->created_at }}</span>
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                        <div class="tg-description">
                                                                            <p>{{ $review->comment }}</p>
                                                                        </div>
                                                                    </div>
                                                                    <div class="tg-bottomarrow"></div>
                                                                </div>
                                                            @endforeach
                                                        @else
                                                            <div class="text-center"><em>No Comment Found</em></div>
                                                        @endif
                                                    </div>
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
                                                            <li class="tg-facebook"><a href="{{ $author->facebook }}"><i class="fa fa-facebook"></i></a></li>
                                                            <li class="tg-twitter"><a href="{{ $author->twitter }}"><i class="fa fa-twitter"></i></a></li>
                                                            <li class="tg-linkedin"><a href="{{ $author->linkedin }}"><i class="fa fa-linkedin"></i></a></li>
                                                        </ul>
                                                    </div>
                                                </div>
                                                @php 
                                                    $slug = \App\Models\Author::getSlug($author->firstname, $author->lastname);
                                                    $authorLink = route('author', ['id' => $author->id, 'slug' => $slug])
                                                @endphp
                                                <a class="tg-btn tg-active" href="{{ $authorLink }}">View All Books</a>
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