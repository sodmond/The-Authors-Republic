@extends('layouts.app', ['activePage' => 'authors', 'title' => 'Authors Corner'])

@section('content')
<section class="tg-sectionspace tg-haslayout">
    <div class="container">
        <div class="row">
            <div id="tg-twocolumns" class="tg-twocolumns">
                <div class="col-xs-12 col-sm-8 col-md-8 col-lg-9 pull-right">
                    <div id="tg-content" class="tg-content">
                        <div class="tg-newsgrid">
                            <div class="tg-sectionhead">
                                <h2><span>Authors Corner</span>Blog & Podcasts by {{ isset($author) ? $author->firstname.' '.$author->lastname : 'Authors' }}</h2>
                            </div>
                            <div class="row">
                                @foreach ($authorsBlog as $article)
                                <div class="col-xs-6 col-sm-12 col-md-6 col-lg-4">
                                    @php 
                                        $slug = \App\Models\Article::getSlug($article->title);
                                        $link = route('authors.blog', ['id' => $article->id, 'slug' => $slug])
                                    @endphp
                                    <article class="tg-post">
                                        <figure><a href="{{ $link }}"><img src="{{ asset('storage/'.$article->image) }}" alt="Articles Image"></a></figure>
                                        <div class="tg-postcontent">
                                            <ul class="tg-bookscategories">
                                                <li>{{ ucwords($article->type) }}</li>
                                            </ul>
                                            <div class="tg-posttitle">
                                                <h3><a href="{{ $link }}">{{ strtoupper($article->title) }}</a></h3>
                                            </div>
                                            <span class="tg-bookwriter">By: <a href="javascript:void(0);">{{ $article->author->firstname.' '.$article->author->lastname }}</a></span>
                                            <ul class="tg-postmetadata">
                                                <li><a href="javascript:void(0);">
                                                    <i class="fa fa-calendar"></i>
                                                    <i>Published on: {{ date('M j, Y', strtotime($article->published_at)) }}</i></a>
                                                </li>
                                            </ul>
                                        </div>
                                    </article>
                                </div>
                                @endforeach
                            </div>
                            <div class="row justify-content-center">
                                <div class="col-md-auto">
                                    {{ $authorsBlog->appends($_GET)->links() }}
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                @include('layouts.partials.sidebar')
            </div>
        </div>
    </div>
</section>
@endsection