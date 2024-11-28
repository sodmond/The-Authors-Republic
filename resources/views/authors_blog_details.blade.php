@extends('layouts.app', ['activePage' => 'authors.'.$article->type, 'title' => ucwords($article->author->firstname."'s ".$article->type), 'blogPodcastBG' => asset('storage/author/blog/image/'.$article->image)])

@section('content')
<div class="tg-sectionspace tg-haslayout">
    <div class="container">
        <div class="row">
            <div id="tg-twocolumns" class="tg-twocolumns">
                {{--<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
                    <figure class="tg-newsdetailimg">
                        <img src="{{ asset('storage/author/blog/image/'.$article->image) }}" alt="image">
                        <figcaption class="tg-author">
                            @php $authorImage = ($article->author->image != '') ? asset('storage/'.$article->author->image) : asset('img/user-icon.png'); @endphp
                            <img src="{{ $authorImage }}" alt="author image" style="max-width:50px;">
                            <div class="tg-authorinfo">
                                <span class="tg-bookwriter">By: <a href="javascript:void(0);">{{ $article->author->firstname.' '.$article->author->lastname }}</a></span>
                                <ul class="tg-postmetadata">
                                    <li><a href="#comments"><i class="fa fa-comment-o"></i><i>{{ number_format(count($article->comments)) }} Comments</i></a></li>
                                </ul>
                            </div>
                        </figcaption>
                    </figure>
                </div>--}}
                <div class="col-xs-12 col-sm-8 col-md-8 col-lg-9 pull-right">
                    @if (count($errors))
                        <div class="alert alert-danger">
                            <strong>Whoops!</strong> Error validating data.<br>
                            <ul>
                                @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                    @endif
                    @if (session('success'))
                        <div class="alert alert-success" role="alert">{{ session('success') }}</div>
                    @endif
                    <div id="tg-content" class="tg-content">
                        <div class="tg-newsdetail">
                            <ul class="tg-bookscategories">
                                <li>{{ ucwords($article->type) }}</li>
                            </ul>
                            <div class="tg-posttitle">
                                <div class="row">
                                    <div class="col-md-8"><h3>{{ $article->title }}</h3></div>
                                    <div class="col-md-4 text-right text-sm-left pt-sm-2">
                                        <button class="tg-btn tg-active" style="border-radius:20px; padding:0 25px;" onclick="window.history.back()">Back to Authors Corner</button>
                                    </div>
                                </div>
                            </div>
                            <div class="tg-description">
                                @php echo \Illuminate\Support\Facades\Storage::get('author/blog/contents/'.$article->content); @endphp
                                @if(!empty($article->video))
                                    <p style="margin-top:20px;">
                                        <video width="100%" controls preload="auto" style="width:100% height:100%;">
                                            <source src="{{ asset('storage/'.$article->video) }}" type="video/mp4">
                                            Your browser does not support the video tag.
                                        </video>
                                    </p>
                                @endif
                            </div>
                            <div class="tg-aboutauthor"  style="padding-top:30px;">
                                <div class="tg-sectionhead">
                                    <h2>About Author</h2>
                                    <button class="tg-btn tg-active" style="border-radius:20px; padding:0 25px;" onclick="window.history.back()">Back to Authors Corner</button>
                                </div>
                                <div class="tg-authorbox">
                                    <figure class="tg-authorimg">
                                        @php
                                            $authorImage = ($article->author->image != '') ? asset('storage/'.$article->author->image) : asset('img/user-icon.png');
                                        @endphp
                                        <img src="{{ $authorImage }}" alt="author image" style="max-width:70px;">
                                    </figure>
                                    <div class="tg-authorinfo">
                                        <div class="tg-authorhead">
                                            <div class="tg-leftarea">
                                                <div class="tg-authorname">
                                                    <h2>{{ ucwords($article->author->firstname.' '.$article->author->lastname) }}</h2>
                                                    @php $regDate = date('M jS, Y', strtotime($article->author->created_at)) @endphp
                                                    <span>Registered Since: {{ $regDate }}</span>
                                                </div>
                                            </div>
                                            <div class="tg-rightarea">
                                                <ul class="tg-socialicons">
                                                    <li class="tg-facebook"><a href="{{ $article->author->facebook }}" target="_blank"><i class="fa fa-facebook"></i></a></li>
                                                    <li class="tg-twitter"><a href="{{ $article->author->twitter }}" target="_blank"><i class="fa fa-twitter"></i></a></li>
                                                    <li class="tg-linkedin"><a href="{{ $article->author->linkedin }}" target="_blank"><i class="fa fa-linkedin"></i></a></li>
                                                </ul>
                                            </div>
                                        </div>
                                        @php 
                                            $slug = \App\Models\Author::getSlug($article->author->firstname, $article->author->lastname);
                                            $authorLink = route('author', ['id' => $article->author->id, 'slug' => $slug])
                                        @endphp
                                        <a class="tg-btn tg-active" href="{{ $authorLink }}">View All Books</a>
                                    </div>
                                </div>
                            </div>
                            <div class="tg-leaveyourcomment" id="comments">
                                <div class="tg-sectionhead">
                                    <h2>Leave Your Comment</h2>
                                </div>
                                <form action="comment" method="post">
                                    @csrf
                                    <div class="form-group">
                                        <textarea id="body" class="form-control" rows="5" name="body" required="" placeholder="Write your comment here..."></textarea>
                                    </div>
                                    <div class="form-group text-right">
                                        @if(auth('web')->check() || auth('author')->check())
                                            <button type="submit" class="tg-btn tg-active">Submit</button>
                                        @else
                                            <button type="button" class="tg-btn" disabled>Login to Comment</button>
                                        @endif
                                    </div>
                                </form>
                            </div>
                            <div class="tg-commentsarea">
                                <div class="tg-sectionhead">
                                    <h2>Comments ({{ number_format(count($article->comments)) }})</h2>
                                </div>
                                <ul id="tg-comments" class="tg-comments">
                                    @foreach($article->comments as $comment)
                                    <li>
                                        @php 
                                            if ($comment->user_type == 'author') {
                                                $author = \App\Models\Author::find($comment->user_id);
                                                $commenter = $author->firstname.' '.$author->lastname;
                                                $user_since = date('M d, Y', strtotime($author->created_at));
                                                $userImage = asset('storage/'.$author->image);
                                            } else {
                                                $user = \App\Models\User::find($comment->user_id);
                                                $commenter = $user->firstname.' '.$user->lastname;
                                                $user_since = date('M d, Y', strtotime($user->created_at));
                                                $userImage = asset('img/user-icon.png');
                                            }
                                        @endphp
                                        <div class="tg-authorbox">
                                            <figure class="tg-authorimg">
                                                <img src="{{ $userImage }}" alt="image description" style="max-width:70px;">
                                            </figure>
                                            <div class="tg-authorinfo">
                                                <div class="tg-authorhead">
                                                    <div class="tg-leftarea">
                                                        <div class="tg-authorname">
                                                            <h2>{{ ucwords($commenter) }}</h2>
                                                            <span>{{ ucwords($comment->user_type) }} Since: {{ $user_since }}</span>
                                                        </div>
                                                    </div>
                                                    <div class="tg-rightarea">
                                                        <span>Posted at: {{ $comment->created_at }}</span>
                                                    </div>
                                                </div>
                                                <div class="tg-description">
                                                    <p>{{ $comment->body }}</p>
                                                </div>
                                            </div>
                                        </div>
                                    </li>
                                    @endforeach
                                </ul>
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