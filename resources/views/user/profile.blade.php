@extends('layouts.app', ['activePage' => 'user.profile', 'title' => 'My Profile'])

@section('content')
<section class="tg-sectionspace tg-haslayout">
    <div class="container">
        <div class="row">
            <div class="tg-aboutus">
                <div class="col-xs-12 col-sm-12 col-md-9 col-lg-9">
                    <div class="panel panel-default shadow">
                        <div class="panel-heading">
                            <div class="row">
                                <div class="col-md-6"><h4>Edit Profile</h4></div>
                            </div>
                        </div>
                        <div class="panel-body">
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
                                <div class="alert alert-success">
                                    <strong class="text-success">Success!</strong> {{ session('success') }}<br>
                                </div>
                            @endif
                            <form method="POST" action="">
                                @csrf
                                @method('put')
                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <label for="firstname" class="col-form-label">{{ __('Firstname') }}</label>
                                            <input id="firstname" type="text" class="form-control" name="firstname" value="{{ auth()->user()->firstname ?? old('firstname') }}" required autofocus>
                                        </div>
                                    </div>
                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <label for="lastname" class="col-form-label">{{ __('Lastname') }}</label>
                                            <input id="lastname" type="text" class="form-control" name="lastname" value="{{ auth()->user()->lastname ?? old('lastname') }}" required>              
                                        </div>
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <label for="phone" class="col-form-label">{{ __('Phone') }}</label>
                                            <input id="phone" type="number" class="form-control" name="phone" value="{{ auth()->user()->phone ?? old('phone') }}" required>
                                        </div>
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <label for="email" class="col-form-label">{{ __('Email Address') }}</label>
                                            <input id="email" type="email" class="form-control" name="email" value="{{ auth()->user()->email ?? old('email') }}" required>
                                        </div>
                                    </div>
                                </div>
        
                                <div class="row mb-3">
                                    <div class="col-md-8">
                                        <button type="submit" class="tg-btn tg-active">
                                            {{ __('Update') }}
                                        </button>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
@endsection
