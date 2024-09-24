@extends('layouts.app', ['activePage' => 'services', 'title' => 'Editing & Feedback Service'])

@section('content')
<section class="tg-sectionspace tg-haslayout">
    <div class="container">
        <div class="row">
            <div class="tg-aboutus">
                <div class="col-xs-12 col-sm-12 col-md-8 col-lg-8">
                    <div class="tg-sectionhead">
                        <h2><span>For Manuscript Editing & Feedback</span>Fill The Form Below</h2>
                    </div>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="tg-aboutus">
                <div class="col-xs-12 col-sm-12 col-md-8 col-lg-8">
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
                    <form class="row" method="POST" action="" enctype="multipart/form-data">
                        @csrf

                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="firstname" class="col-form-label">{{ __('Firstname') }}</label>
                                <input id="firstname" type="text" class="form-control" name="firstname" value="{{ old('firstname') }}" required autofocus>
                            </div>
                        </div>

                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="lastname" class="col-form-label">{{ __('Lastname') }}</label>
                                <input id="lastname" type="text" class="form-control" name="lastname" value="{{ old('lastname') }}" required>
                            </div>
                        </div>

                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="email" class="col-form-label">{{ __('Email Address') }}</label>
                                <input id="email" type="email" class="form-control" name="email" value="{{ old('email') }}" required>
                            </div>
                        </div>

                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="phone" class="col-form-label">{{ __('Phone') }}</label>
                                <input id="phone" type="number" class="form-control" name="phone" value="{{ old('phone') }}" required>
                            </div>
                        </div>

                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="title" class="col-form-label">{{ __('Manuscript Title') }}</label>
                                <input id="title" type="text" class="form-control" name="title" value="{{ old('title') }}" required>              
                            </div>
                        </div>

                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="file" class="col-form-label">{{ __('Manuscript File') }}</label>
                                <input id="file" type="file" class="form-control" name="file" required>
                                <small class="text-info">Allowed files: PDF only | Max: 2MB</small>              
                            </div>
                        </div>

                        <div class="col-md-6">
                            <div class="form-group">
                                <input class="" type="checkbox" name="terms" id="terms" {{ old('terms') ? 'checked' : '' }} required>
                                <span class="" for="terms">
                                    {{ __('I agree to the ') }}<a href="{{ route('tandc') }}" class="text-dark">Terms & Conditions</a>
                                </span>
                            </div>
                        </div>

                        <div class="col-md-12">
                            <button type="submit" class="tg-btn tg-active">
                                {{ __('Submit') }}
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</section>
@endsection
