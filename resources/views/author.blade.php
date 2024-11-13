@extends('layouts.app', ['activePage' => 'authors_profile', 'title' => 'Author Profile'])

@section('content')
<div class="tg-sectionspace tg-haslayout">
    <div class="container">
        <div class="row">
            <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
                <div class="tg-authordetail">
                    <figure class="tg-authorimg">
                        @php $authorImage = ($author->image != '') ? asset('storage/'.$author->image) : asset('img/user-icon.png'); @endphp
                        <img src="{{ $authorImage }}" alt="author image" style="max-width: 320px;">
                    </figure>
                    <div class="tg-authorcontentdetail">
                        <div class="tg-sectionhead">
                            <h2><span>{{ number_format($books->count()) }} Published Books</span>{{ ucwords($author->firstname.' '.$author->lastname) }}</h2>
                            <ul class="tg-socialicons">
                                <li class="tg-facebook"><a href="{{ $author->facebook }}" target="_blank"><i class="fa fa-facebook"></i></a></li>
                                <li class="tg-twitter"><a href="{{ $author->twitter }}" target="_blank"><i class="fa fa-twitter"></i></a></li>
                                <li class="tg-linkedin"><a href="{{ $author->linkedin }}" target="_blank"><i class="fa fa-linkedin"></i></a></li>
                            </ul>
                        </div>
                        <div class="tg-description mb-3">
                            <p>{{ $author->bio }}</p>
                        </div>
                        <div class="tg-booksfromauthor">
                            <div class="tg-sectionhead">
                                <h2>Books of {{ ucwords($author->firstname) }}</h2>
                                <div class="socialicons">
                                    <a class="tg-btn tg-active" href="{{ route('authors.corner', ['author' => $author->id]) }}">My Blogs/Podcast</a>
                                </div>
                            </div>
                            <div class="row">
                                @foreach($books as $book)
                                <div class="col-xs-6 col-sm-6 col-md-4 col-lg-3 col-6">
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
                                            <span class="tg-bookwriter">By: <a href="javascript:void(0)">{{ ucwords($book->author->firstname.' '.$book->author->lastname) }}</a></span>
                                            <span class="tg-bookprice">
                                                <ins>₦{{ ($book->price != 0) ? number_format($book->price, 2) : number_format($book->price2, 2) }}</ins>
                                            </span>
                                            @if(($book->hard_copy == 1 && $book->soft_copy == 0 && $book->stock > 1) || ($book->soft_copy == 1))
                                            <form method="POST" action="{{ route('cart.add') }}">
                                                @csrf
                                                <input type="hidden" name="book_id" value="{{ $book->id }}">
                                                <input type="hidden" name="quantity" value="1">
                                                @if($book->soft_copy == 1 && $book->hard_copy == 1)
                                                    <a class="tg-btn tg-btnstyletwo" href="{{ route('book', ['id' => $book->id, 'slug' => $slug]) }}">
                                                        <i class="fa fa-eye"></i>
                                                        <em>View Options</em>
                                                    </a>
                                                @else
                                                    <input type="hidden" name="copy" value="{{ $book->soft_copy == 1 ? 'soft' : 'hard' }}">
                                                    <button class="tg-btn tg-btnstyletwo" href="javascript:void(0);">
                                                        <i class="fa fa-shopping-cart"></i>
                                                        <em>Add To Cart</em>
                                                    </button>
                                                @endif
                                            </form>
                                            @endif
                                        </div>
                                    </div>
                                </div>
                                @endforeach
                            </div>
                            <div>{{ $books->links() }}</div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection