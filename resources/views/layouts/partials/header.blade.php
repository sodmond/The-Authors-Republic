<header id="tg-header" class="tg-header tg-headervtwo tg-haslayout">
    <div class="tg-topbar">
        <div class="container">
            <div class="row">
                <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
                    <ul class="tg-addnav">
                        <li>
                            <a href="{{ route('author.home') }}" target="_blank">
                                <i class="icon-user"></i>
                                <em>Author Login</em>
                            </a>
                        </li>
                    </ul>
                    <div class="tg-userlogin">
                        <figure><a href="javascript:void(0);"><img src="{{ asset('frontend/images/users/img-01.jpg') }}" alt="image description"></a></figure>
                        <span>Hi, {{ (Auth::guard('web')->user()) ? ucwords(Auth::guard('web')->user()->firstname) : 'Guest' }}</span>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="tg-middlecontainer">
        <div class="container">
            <div class="row">
                <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
                    <strong class="tg-logo"><a href="{{ url('/') }}"><img src="{{ asset('img/logo.png') }}" alt="The Author Republic" style="max-height:85px;"></a></strong>
                    <div class="tg-searchbox">
                        <form class="tg-formtheme tg-formsearch" method="GET" accept="{{ route('books') }}">
                            <fieldset>
                                <input type="text" name="search" class="typeahead form-control" placeholder="Search books by title...">
                                <button type="submit" class="tg-btn">Search</button>
                            </fieldset>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="tg-navigationarea">
        <div class="container">
            <div class="row">
                <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
                    <div class="tg-navigationholder">
                        <nav id="tg-nav" class="tg-nav">
                            <div class="navbar-header">
                                <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#tg-navigation" aria-expanded="false">
                                    <span class="sr-only">Toggle navigation</span>
                                    <span class="icon-bar"></span>
                                    <span class="icon-bar"></span>
                                    <span class="icon-bar"></span>
                                </button>
                            </div>
                            <div id="tg-navigation" class="collapse navbar-collapse tg-navigation">
                                <ul>
                                    <li class="{{ ($activePage == 'home') ? 'current-menu-item' : '' }}">
                                        <a href="{{ url('/') }}">Home</a>
                                    </li>
                                    <li class="{{ ($activePage == 'books') ? 'current-menu-item' : '' }}">
                                        <a href="{{ route('books') }}">All Books</a>
                                    </li>
                                    <li class="{{ ($activePage == 'authors') ? 'current-menu-item' : '' }}">
                                        <a href="{{ route('authors') }}">Authors</a>
                                    </li>
                                    <li class="{{ ($activePage == 'about') ? 'current-menu-item' : '' }}">
                                        <a href="{{ route('about') }}">About Us</a>
                                    </li>
                                    <li class="{{ ($activePage == 'news') ? 'current-menu-item' : '' }}">
                                        <a href="{{ route('news') }}">News</a>
                                    </li>
                                    <li class="{{ ($activePage == 'forum') ? 'current-menu-item' : '' }}">
                                        <a href="{{ route('forum') }}">Forum</a>
                                    </li>
                                    <li class="menu-item-has-children {{ ($activePage == 'services') ? 'current-menu-item' : '' }}">
                                        <a href="javascript:void(0);">Services</a>
                                        <ul class="sub-menu">
                                            <li class="">
                                                <a href="{{ route('services.editingfeedback') }}">Editing & Feedback Services</a>
                                            </li>
                                        </ul>
                                    </li>
                                    <li class="{{ ($activePage == 'contact') ? 'current-menu-item' : '' }}">
                                        <a href="{{ route('contact') }}">Contact</a>
                                    </li>
                                </ul>
                            </div>
                        </nav>
                        <div class="tg-wishlistandcart">
                            <div class="tg-themedropdown">
                                @php 
                                    $savedItems = 0;
                                    if (Auth::guard('web')->user()) {
                                        $wishlist = Illuminate\Support\Facades\DB::table('wishlist')->where('user_id', Auth::guard('web')->id());
                                        $savedItems = $wishlist->count();
                                    }
                                @endphp
                                <a href="{{ route('user.wishlist') }}" id="tg-wishlisst" class="tg-btnthemedropdown">
                                    <span class="tg-themebadge">{{ $savedItems }}</span>
                                    <i class="icon-heart"></i>
                                </a>
                            </div>
                            <div class="dropdown tg-themedropdown tg-minicartdropdown">
                                @php 
                                    $cookie = \App\Models\Cart::getCookie();
                                    $shoppingCart = \App\Models\Cart::where($cookie[0], $cookie[1])->get();
                                @endphp
                                <a href="javascript:void(0);" id="tg-minicart" class="tg-btnthemedropdown" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                    <span class="tg-themebadge">{{ $shoppingCart->count() }}</span>
                                    <i class="icon-cart"></i> 
                                </a>
                                <div class="dropdown-menu tg-themedropdownmenu" aria-labelledby="tg-minicart">
                                    @if ($shoppingCart->count() > 0)
                                    @php $totalItem = ($shoppingCart->count() < 3) ? $shoppingCart->count() : 3; @endphp
                                    <div class="tg-minicartbody">
                                        @for($i = 0; $i < $totalItem; $i++)
                                        <div class="tg-minicarproduct">
                                            @php $book = $allBooks[$shoppingCart[$i]->book_id]; @endphp
                                            <figure>
                                                <img src="{{ asset('frontend/images/products/img-01.jpg') }}" alt="image description">
                                            </figure>
                                            <div class="tg-minicarproductdata">
                                                @php $slug = \App\Models\Book::getSlug($book->title); @endphp
                                                <h5><a href="{{ route('book', ['id' => $book->id, 'slug' => $slug]) }}">{{ $book->title }}</a></h5>
                                                <h6>₦ {{ number_format($book->price, 2) }}</h6>
                                            </div>
                                        </div>
                                        @endfor
                                    </div>
                                    <div class="tg-minicartfoot">
                                        {{--<a class="tg-btnemptycart" href="{{ route('cart.clear') }}">
                                            <i class="fa fa-trash-o"></i>
                                            <span>Clear Your Cart</span>
                                        </a>
                                        <span class="tg-subtotal">Subtotal: <strong>35.78</strong></span>--}}
                                        <div class="tg-btns">
                                            <a class="tg-btn tg-active" href="{{ route('cart') }}">View All</a>
                                        </div>
                                    </div>
                                    @else
                                    <div class="tg-minicartbody text-center">
                                        <h5>Your cart is empty</h5>
                                    </div>
                                    @endif
                                </div>
                            </div>
                            <div class="dropdown tg-themedropdown tg-currencydropdown">
                            <a href="javascript:void(0);" id="tg-currenty" class="tg-btnthemedropdown" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <span><i class="icon-user"></i></span>
                            </a>
                            <ul class="dropdown-menu tg-themedropdownmenu" aria-labelledby="tg-currenty">
                                @guest('web')
                                <li>
                                    <a href="{{ route('login') }}">
                                        <span>Login</span>
                                    </a>
                                </li>
                                <li>
                                    <a href="{{ route('register') }}">
                                        <span>Register</span>
                                    </a>
                                </li>
                                @endguest
                                @auth('web')
                                <li>
                                    <a href="{{ route('user.home') }}">
                                        <span>Dashboard</span>
                                    </a>
                                </li>
                                <li>
                                    <a href="{{ route('logout') }}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                                        <span>Logout</span>
                                    </a>
                                    <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                        @csrf
                                    </form>
                                </li>
                                @endauth
                            </ul>
                        </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</header>