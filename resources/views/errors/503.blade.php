@extends('layouts.error', ['activePage' => 'error', 'title' => '503 Error'])

@section('content')
<div class="tg-sectionspace tg-haslayout">
    <div class="container">
        <div class="row">
            <div class="tg-404error">
                <div class="col-xs-12 col-sm-12 col-md-10 col-md-push-2 col-lg-8 col-lg-push-2">
                    <div class="tg-404errorcontent">
                        <span>503</span>
                        <h2 style="padding-top:20px;">Website Under Maintenance, Please check back again later</h2>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection