<div class="tg-innerbanner tg-haslayout tg-parallax tg-bginnerbanner" data-z-index="-100" data-appear-top-offset="600" data-parallax="scroll" data-image-src="{{ asset('frontend/images/159711.jpg') }}">
    <div id="overlay"></div>
    <div class="container" style="z-index: 3;">
        <div class="row">
            <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
                <div class="tg-innerbannercontent">
                    <h1 style="color:#FFF;">{{ $title }}</h1>
                    <ol class="tg-breadcrumb">
                        @guest <li><a href="javascript:void(0);">home</a></li> @endguest
                        @auth('web') <li><a href="{{ route('user.home') }}">dashboard</a></li> @endauth
                        @if($activePage == 'user.order') <li><a href="{{ route('user.orders') }}">Orders</a></li> @endif
                        @if($activePage == 'book') <li><a href="{{ route('books') }}">All Books</a></li> @endif
                        @if($activePage == 'news_detail') <li><a href="{{ route('news') }}">News</a></li> @endif
                        @if($activePage == 'user.addressBook') <li><a href="{{ route('user.addressBook') }}">Address Book</a></li> @endif
                        <li class="tg-active">{{ $title }}</li>
                    </ol>
                </div>
            </div>
        </div>
    </div>
</div>