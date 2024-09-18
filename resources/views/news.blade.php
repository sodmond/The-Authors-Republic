@extends('layouts.app', ['activePage' => 'news', 'title' => 'Latest News'])

@section('content')
<section class="tg-sectionspace tg-haslayout">
    <div class="container">
        <div class="row">
            <div id="tg-twocolumns" class="tg-twocolumns">
                <div class="col-xs-12 col-sm-8 col-md-8 col-lg-9 pull-right">
                    <div id="tg-content" class="tg-content">
                        <div class="tg-newsgrid">
                            <div class="tg-sectionhead">
                                <h2><span>Latest News &amp; Articles</span>What's Hot in The News</h2>
                            </div>
                            <div class="row">
                                @foreach ($articles as $article)
                                <div class="col-xs-6 col-sm-12 col-md-6 col-lg-4">
                                    @php 
                                        $slug = \App\Models\Article::getSlug($article->title);
                                        $link = route('news.get', ['id' => $article->id, 'slug' => $slug])
                                    @endphp
                                    <article class="tg-post">
                                        <figure><a href="{{ $link }}"><img src="{{ asset('storage/'.$article->image) }}" alt="Articles Image"></a></figure>
                                        <div class="tg-postcontent">
                                            <ul class="tg-postmetadata">
                                                <li><i class="fa fa-calendar"></i> Published on: {{ date('M j, Y', strtotime($article->published_at)) }}</li>
                                            </ul>
                                            <ul class="tg-bookscategories"></ul>
                                            <div class="tg-posttitle">
                                                <h3><a href="{{ $link }}">{{ strtoupper($article->title) }}</a></h3>
                                            </div>
                                            <span class="tg-bookwriter">By: <a href="javascript:void(0);">Admin</a></span>
                                        </div>
                                    </article>
                                </div>
                                @endforeach
                            </div>
                            <div class="row justify-content-center">
                                <div class="col-md-auto">
                                    {{ $articles->links() }}
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