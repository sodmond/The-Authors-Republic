@extends('layouts.app', ['activePage' => 'news', 'title' => 'Latest News'])

@section('content')
<section class="tg-sectionspace tg-haslayout">
    <div class="container">
        <div class="row">
            <div id="tg-twocolumns" class="tg-twocolumns">
                <div class="col-xs-12 col-sm-8 col-md-8 col-lg-9 pull-right">
                    <div id="tg-content" class="tg-content">
                        <div class="tg-productdetail">
                            <div class="row">
                                @foreach($articles as $article)
                                <div class="col-xs-12 col-sm-6 col-md-4 col-lg-4">
                                    <div class="panel panel-default shadow">
                                        <div class="panel-body" style="padding:0px;">
                                            @php 
                                            $slug = \App\Models\Article::getSlug($article->title);
                                            $link = route('news.get', ['id' => $article->id, 'slug' => $slug])
                                            @endphp
                                            <a href="{{ $link }}">
                                                <img class="img-responsive" src="{{ asset('storage/'.$article->image) }}" alt="Article Image">
                                            </a>
                                            <div style="padding:10px;">
                                                <h4><a href="{{ $link }}">{{ strtoupper($article->title) }}</a></h4>
                                                <p><small>Published on: {{ date('M j, Y', strtotime($article->published_at)) }}</small></p>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                @endforeach
                            </div>
                            <div class="row justify-content-center">
                                {{ $articles->links() }}
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