@extends('layouts.error', ['activePage' => 'error', 'title' => '419 Error'])

@section('content')
<div class="tg-sectionspace tg-haslayout">
    <div class="container">
        <div class="row">
            <div class="tg-404error">
                <div class="col-xs-12 col-sm-12 col-md-10 col-md-push-2 col-lg-8 col-lg-push-2">
                    <div class="tg-404errorcontent">
                        <span>419</span>
                        <h2 style="padding-top:20px;">The page has expired, click the button below to reload</h2>
                        <button class="tg-btn" onclick="window.location.reload()">Reload Page</button>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection