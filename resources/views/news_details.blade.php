@extends('layouts.app', ['activePage' => 'news_detail', 'title' => 'News Details'])

@section('content')
<div class="tg-sectionspace tg-haslayout">
    <div class="container">
        <div class="row">
            <div id="tg-twocolumns" class="tg-twocolumns">
                <div class="col-xs-12 col-sm-8 col-md-8 col-lg-9 pull-right">
                    <div id="tg-content" class="tg-content">
                        <div class="tg-productdetail">
                            <div class="row">
                                <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
                                    <div class="tg-sectionhead" style="padding-right:10px !important;">
                                        <h2 style="padding-top:10px;">{{ $article->title }}</h2>
                                        <div>
                                            <a class="tg-btn tg-active" href="{{ route('news') }}">Back to News</a>
                                        </div>
                                    </div>
                                    <div class="tg-postbook">
                                        <img class="img-responsive" src="{{ asset('storage/'.$article->image) }}" alt="Article Image">
                                        <div class="tg-postbookcontent">
                                            @php echo \Illuminate\Support\Facades\Storage::get('articles/contents/'.$article->content); @endphp
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