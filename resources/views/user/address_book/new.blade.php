@extends('layouts.app', ['activePage' => 'user.addressBook', 'title' => 'New Address'])

@section('content')
<section class="tg-sectionspace tg-haslayout">
    <div class="container">
        <div class="row">
            <div class="tg-aboutus">
                <div class="col-xs-12 col-sm-12 col-md-9 col-lg-9">
                    <div class="panel panel-default shadow">
                        <div class="panel-heading">
                            <div class="row">
                                <div class="col-md-6"><h4>Add New Address</h4></div>
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

                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="fname" class="col-form-label">{{ __('Firstname') }}</label>
                                            <input id="fname" type="text" class="form-control" name="fname" value="{{ old('fname') }}" required autofocus>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="lname" class="col-form-label">{{ __('Lastname') }}</label>
                                            <input id="lname" type="text" class="form-control" name="lname" value="{{ old('lname') }}" required>              
                                        </div>
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <label for="address" class="col-form-label">{{ __('Address') }}</label>
                                            <input id="address" type="text" class="form-control" name="address" value="{{ old('address') }}" required>
                                        </div>
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="city" class="col-form-label">{{ __('City') }}</label>
                                            <input id="city" type="text" class="form-control" name="city" value="{{ old('city') }}" required>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="state" class="col-form-label">{{ __('State') }}</label>
                                            <select name="state" class="form-control" required>
                                                <option value="">- - - Select State - - -</option>
                                                @foreach ($states as $state)
                                                    <option value="{{ $state->id }}" @selected(old('state') == $state->id)>{{ ucwords($state->state) }}</option>
                                                @endforeach
                                            </select>             
                                        </div>
                                    </div>
                                </div>
                                <div class="row mb-3">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="zip" class="col-form-label">{{ __('Zip/Postal Code') }}</label>
                                            <input id="zip" type="text" class="form-control" name="zip" value="{{ old('zip') }}" required>              
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="default" class="col-form-label">{{ __('Set as Default') }}</label>
                                            <select class="form-control" name="default" id="default">
                                                <option value="1" @selected(old('default') == true)>Yes</option>
                                                <option value="0" @selected(old('default') == false)>No</option>
                                            </select>
                                        </div>
                                    </div>
                                </div>
        
                                <div class="row mb-3">
                                    <div class="col-md-8">
                                        <button type="submit" class="tg-btn tg-active">
                                            {{ __('Submit') }}
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
