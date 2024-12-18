@extends('layouts.app', ['activePage' => 'forum', 'title' => 'Community Forum'])

@section('content')
<div class="tg-sectionspace tg-haslayout">
    <div class="container">
        <div class="row">
            <div id="tg-twocolumns" class="tg-twocolumns">
                <div class="col-xs-12 col-sm-8 col-md-8 col-lg-9 pull-right">
                    <div class="tg-sectionhead" style="padding-right:10px !important;">
                        <h2 style="padding-top:10px;">{{ $post->title }}</h2>
                        <div>
                            <a class="tg-btn tg-active" href="{{ route('forum') }}">Back to Forum</a>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
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
                            <div class="row mb-3">
                                <div class="col-md-12 mb-2">
                                    @php echo $post->body @endphp
                                </div>
                                <div class="col-md-12 text-right" style="font-weight:bold;">
                                    @if($post->user_type == 'author')
                                        @php $user = \App\Models\Author::find($post->user_id); @endphp
                                    @else
                                        @php $user = \App\Models\User::find($post->user_id); @endphp
                                    @endif
                                    <small>Posted by {{ $user->firstname.' '.$user->lastname }} at {{ $post->created_at }}</small>
                                </div>
                            </div>
                        </div>

                        <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
                            <div class="tg-sectionhead" style="padding-bottom:10px !important; float:none;">
                                <h4>Comments ({{$comments->count()}})</h4>
                            </div>
                            <form action="{{ route('forum.post.comment', ['id' => $post->id]) }}" method="post">
                                @csrf
                                <div class="form-group">
                                    <textarea id="body" class="form-control" rows="5" name="body" required placeholder="Write your comment here...">{{ old('body') }}</textarea>
                                </div>
                                <div class="form-group text-right">
                                    @if(auth('web')->check() || auth('author')->check())
                                        <button type="submit" class="tg-btn tg-active">Reply</button>
                                    @else
                                        <button type="submit" class="tg-btn" disabled>Login to Comment</button>
                                    @endif
                                </div>
                            </form>
                            <div class="tg-description">
                                @if ($comments->count() > 0)
                                    @foreach ($comments as $comment)
                                        <div class="row forum_post" style="padding:10px 5px; margin-bottom:20px;">
                                            <div class="col-md-12" style="display:flex; align-items:center;">
                                                <img class="img-responsive img-circle" src="{{ asset('img/user-icon.png') }}" style="max-width:70px; float:left; margin-right:20px;">
                                                <span>{{ $comment->body }}</span>
                                            </div>
                                            <div class="col-md-12 text-right">
                                                @if($comment->user_type == 'author')
                                                    @php $user = \App\Models\Author::find($comment->user_id); @endphp
                                                @else
                                                    @php $user = \App\Models\User::find($comment->user_id); @endphp
                                                @endif
                                                <small>Comment by {{ $user->firstname.' '.$user->lastname }} at {{ $comment->created_at }}</small>
                                            </div>
                                        </div>
                                    @endforeach
                                @else
                                    <p class="text-center"><em>No Comment Found</em></p>
                                @endif
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