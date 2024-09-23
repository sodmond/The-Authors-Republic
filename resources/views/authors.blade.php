@extends('layouts.app', ['activePage' => 'authors', 'title' => 'Authors'])

@section('content')
<div class="tg-authorsgrid">
    <div class="container">
        <div class="row">
            <div class="tg-authors">
                <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
                    <div class="tg-sectionhead">
                        <h2><span>Strong Minds Behind Us</span>Our Authors</h2>
                    </div>
                </div>
                @foreach($authors as $author)
                <div class="col-xs-6 col-sm-4 col-md-3 col-lg-2">
                    <div class="tg-author">
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
                </div>
                @endforeach
                <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
                    {{ $authors->links() }}
                </div>
            </div>
        </div>
    </div>
</div>
@endsection