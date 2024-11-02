@extends('layouts.app', ['activePage' => 'contact', 'title' => 'Contact'])

@section('content')
<div class="tg-sectionspace tg-haslayout">
    <div class="container">
        <div class="row">
            <div class="tg-contactus">
                <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
                    <div class="tg-sectionhead">
                        <h2><span>Say Hello!</span>Get In Touch With Us</h2>
                    </div>
                </div>
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
                    @if (session('success'))
                        <div class="alert alert-success" role="alert">{{ session('success') }}</div>
                    @endif
                    <form class="tg-formtheme tg-formcontactus mb-3" method="POST" action="">
                        @csrf
                        <fieldset>
                            <div class="form-group">
                                <input type="text" name="firstname" class="form-control" placeholder="First Name*" required value="{{ old('firstname') }}">
                            </div>
                            <div class="form-group">
                                <input type="text" name="lastname" class="form-control" placeholder="Last Name*" required value="{{ old('lastname') }}">
                            </div>
                            <div class="form-group">
                                <input type="email" name="email" class="form-control" placeholder="Email*" required value="{{ old('email') }}">
                            </div>
                            <div class="form-group">
                                <input type="text" name="subject" class="form-control" placeholder="Subject (optional)" value="{{ old('subject') }}">
                            </div>
                            <div class="form-group tg-hastextarea">
                                <textarea placeholder="Comment" name="comment" required>{{ old('comment') }}</textarea>
                            </div>
                            <div class="form-group tg-hastextarea">
                                <input type="checkbox" name="consent" class="form-contro" required> I agree to be contacted with the above submitted information.
                            </div>
                            <div class="form-group tg-hastextarea">
                                {!! htmlFormSnippet() !!}
                            </div>
                            <div class="form-group">
                                <button type="submit" class="tg-btn tg-active">Submit</button>
                            </div>
                        </fieldset>
                    </form>
                    <div class="tg-contactdetail">
                        <div class="tg-sectionhead">
                            <h2>Contact Information</h2>
                        </div>
                        <ul class="tg-contactinfo">
                            <li>
                                <i class="icon-phone-handset"></i>
                                <span>
                                    <em>0903 488 2719</em>
                                </span>
                            </li>
                            <li>
                                <i class="icon-envelope"></i>
                                <span>
                                    <em><a href="mailto:orders@theauthorsrepublic.com">orders@theauthorsrepublic.com</a></em>
                                        <em><a href="mailto:info@theauthorsrepublic.com">info@theauthorsrepublic.com</a></em>
                                </span>
                            </li>
                        </ul>
                        <ul class="tg-socialicons">
                            <li class="tg-facebook"><a href="https://facebook.com/Theauthorsrepublic" target="_blank"><i class="fa fa-facebook"></i></a></li>
                            <li class="tg-googleplus"><a href="https://instagram.com/Theauthorsrepublic" target="_blank"><i class="fa fa-instagram"></i></a></li>
                            <li class="tg-twitter"><a href="https://x.com/Theauthorsrepublic" target="_blank"><i class="fa fa-twitter"></i></a></li>
                            <li class="tg-googleplus"><a href="https://tiktok.com/@Theauthorsrepublic" target="_blank"><i class="fab fa-tiktok"></i></a></li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<section class="tg-sectionspace tg-haslayout">
    <div class="container">
        <div class="row">
            <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
                <div class="tg-sectionhead">
                    <h2><span>Strong Minds Behind Us</span>Registered Authors</h2>
                    <a class="tg-btn" href="{{ route('authors') }}">View All</a>
                </div>
            </div>
            <div id="tg-authorsslider" class="tg-authors tg-authorsslider owl-carousel">
                @foreach($authors as $author)
                <div class="item tg-author">
                    @php 
                        $slug = \App\Models\Author::getSlug($author->firstname, $author->lastname);
                        $authorLink = route('author', ['id' => $author->id, 'slug' => $slug]);
                        $authorImage = ($author->image != '') ? asset('storage/'.$author->image) : asset('frontend/images/author/imag-03.jpg');
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
                @endforeach
            </div>
        </div>
    </div>
</section>
@endsection