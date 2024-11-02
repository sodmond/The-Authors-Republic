@extends('layouts.app', ['activePage' => 'forum', 'title' => 'Community Forum'])

@section('content')
<div class="tg-sectionspace tg-haslayout">
    <div class="container">
        <div class="row">
            <div id="tg-twocolumns" class="tg-twocolumns">
                <div class="col-xs-12 col-sm-8 col-md-8 col-lg-9 pull-right">
                    <div class="tg-sectionhead" style="padding-bottom:10px !important; float:none;">
                        <h3>All Posts</h3>
                    </div>
                    @if (count($errors))
                        <div class="alert alert-danger">
                            <strong class="text-danger">Whoops!</strong> Error validating data.<br>
                            <ul>
                                @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                    @endif
                    @if(session('success'))
                        <div class="alert alert-success" role="alert">
                            <strong class="text-success">Success!</strong> {{ session('success') }}
                        </div>
                    @endif
                    <div class="row">
                        <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
                            @if ($posts->count() > 0)
                                @foreach ($posts as $post)
                                    @php
                                        $slug = \App\Models\Post::getSlug($post->title);
                                        $link = route('forum.post', ['id' => $post->id, 'slug' => $slug])
                                    @endphp
                                    <div class="row forum_post">
                                        <div class="col-md-12">
                                            <a href="{{ $link }}" style="font-weight:bold;">{{ $post->title }}</a>
                                        </div>
                                        <div class="col-md-12 text-right">
                                            @if($post->user_type == 'author')
                                                @php $user = \App\Models\Author::find($post->user_id); @endphp
                                            @else
                                                @php $user = \App\Models\User::find($post->user_id); @endphp
                                            @endif
                                            <small>Posted by {{ $user->firstname.' '.$user->lastname }} at {{ $post->created_at }}</small>
                                        </div>
                                    </div>
                                @endforeach
                                <div class="text-center" style="padding: 20px 0;">
                                    {{ $posts->appends($_GET)->links() }}
                                </div>
                            @else
                                <p class="text-center"><em>No Post Found</em></p>
                            @endif
                        </div>
                    </div>
                </div>
                @include('layouts.partials.sidebar')         
            </div>
        </div>
    </div>
</div>
@endsection