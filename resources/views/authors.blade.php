@extends('layouts.app', ['activePage' => 'authors', 'title' => 'Authors'])

@section('content')
<div class="tg-authorsgrid">
    <div class="container">
        <div class="row">
            <div class="tg-authors">
                <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
                    <div class="tg-sectionhead">
                        @if(isset($_GET['search']))
                    		<h3>Search results for "{{ $_GET['search'] }}"</h3>
						@else
                        <h2><span>Strong Minds Behind Us</span>Our Authors</h2>
                        @endif
                    </div>
                </div>
                @foreach($authors as $author)
                <div class="col-xs-6 col-sm-4 col-md-3 col-lg-2">
                    <div class="tg-author">
                        @php 
                            $slug = \App\Models\Author::getSlug($author->firstname, $author->lastname);
                            $authorLink = route('author', ['id' => $author->id, 'slug' => $slug]);
                            $authorImage = ($author->image != '') ? asset('storage/'.$author->image) : asset('img/user-icon.png');
                        @endphp
                        <figure><a href="{{ $authorLink }}"><img src="{{ $authorImage }}" alt="author image"></a></figure>
                        <div class="tg-authorcontent">
                            <h2><a href="{{ $authorLink }}">{{ ucwords($author->firstname.' '.$author->lastname) }}</a></h2>
                            <span>{{ count($author->books) }} Published Books</span>
                            <ul class="tg-socialicons">
                                <li class="tg-facebook"><a href="{{ $author->facebook }}" target="_blank"><i class="fa fa-facebook"></i></a></li>
                                <li class="tg-twitter"><a href="{{ $author->twitter }}" target="_blank"><i class="fa fa-twitter"></i></a></li>
                                <li class="tg-linkedin"><a href="{{ $author->linkedin }}" target="_blank"><i class="fa fa-linkedin"></i></a></li>
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