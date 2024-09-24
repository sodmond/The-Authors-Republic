@extends('layouts.app', ['activePage' => 'books', 'title' => 'All Books'])

@section('content')
<div class="tg-sectionspace tg-haslayout">
    <div class="container">
        <div class="row">
            <div id="tg-twocolumns" class="tg-twocolumns">
                <div class="col-xs-12 col-sm-8 col-md-8 col-lg-9 pull-right">
                    <div id="tg-content" class="tg-content">
                        <div class="tg-products">
                            @isset($_GET['search'])
                                <div class="tg-sectionhead">
									<h3>Search results for "{{ $_GET['search'] }}"</h3>
								</div>
                            @endisset
                            <div class="tg-productgrid">
                                <div class="row">
                                    @foreach($books as $book)
                                    <div class="col-xs-6 col-sm-6 col-md-4 col-lg-3">
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
                                                @php 
                                                    $slug = \App\Models\Author::getSlug($book->author->firstname, $book->author->lastname);
                                                    $authorLink = route('author', ['id' => $book->author->id, 'slug' => $slug])
                                                @endphp
                                                <span class="tg-bookwriter">By: <a href="{{ $authorLink }}">{{ ucwords($book->author->firstname.' '.$book->author->lastname) }}</a></span>
                                                {{--<span class="tg-stars"><span></span></span>--}}
                                                <span class="tg-bookprice">
                                                    <ins>₦{{ number_format($book->price, 2) }}</ins>
                                                    {{--<del>₦27.20</del>--}}
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
                            <div class="row justify-contents-center">
                                <div class="col-md-12">{{ $books->appends($_GET)->links() }}</div>
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

@push('custom-scripts')
    <script>
        $(document).ready(function(){
            //alert('Worked!');
            $('.tg-btnaddtowishlist').click(function(e) {
                e.preventDefault();
                $(this).parent().submit();
            });
        });
    </script>
@endpush