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
                <div class="col-xs-12 col-sm-12 col-md-6 col-lg-6">
                    <div id="tg-locationmap" class="tg-locationmap tg-map"></div>
                </div>
                <div class="col-xs-12 col-sm-12 col-md-6 col-lg-6">
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
                    <form class="tg-formtheme tg-formcontactus" method="POST" action="">
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
                            <div class="form-group">
                                <button type="submit" class="tg-btn tg-active">Submit</button>
                            </div>
                        </fieldset>
                    </form>
                    <div class="tg-contactdetail">
                        <div class="tg-sectionhead">
                            <h2>Get In Touch With Us</h2>
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
                            <li class="tg-facebook"><a href="javascript:void(0);"><i class="fa fa-facebook"></i></a></li>
                            <li class="tg-twitter"><a href="javascript:void(0);"><i class="fa fa-twitter"></i></a></li>
                            <li class="tg-linkedin"><a href="javascript:void(0);"><i class="fa fa-linkedin"></i></a></li>
                            <li class="tg-googleplus"><a href="javascript:void(0);"><i class="fa fa-google-plus"></i></a></li>
                            <li class="tg-rss"><a href="javascript:void(0);"><i class="fa fa-rss"></i></a></li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection