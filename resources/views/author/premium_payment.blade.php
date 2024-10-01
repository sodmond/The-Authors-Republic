@extends('author.layouts.main', ['title' => 'Account Upgrade', 'activePage' => 'home'])

@section('content')
    <div class="content">

        <!-- Start Content-->
        <div class="container-fluid">
            
            <!-- start page title -->
            <div class="row">
                <div class="col-12">
                    <div class="page-title-box">
                        <div class="page-title-right">
                            <ol class="breadcrumb m-0">
                                <li class="breadcrumb-item"><a href="{{ route('author.home') }}">Dashboard</a></li>
                                <li class="breadcrumb-item active">Blog/Podcasts</li>
                            </ol>
                        </div>
                        <h4 class="page-title">Account Upgrade</h4>
                    </div>
                </div>
            </div>     
            <!-- end page title --> 

            <div class="row">
                <div class="col-12">
                    <div class="card-box shadow text-center">
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
                            
                                
                                <h1><i class="fas fa-user-tie"></i></h1>
                                <h3 class="header-title mb-3">Upgrade Account</h3>
                                <p class="sub-header" style="color:#444;">
                                    In order to post blog and podcast, you need to upgrade your account to premium. 
                                </p>
                                <div class="my-3">Amount: <br><span class="h3">₦{{ number_format($basic_settings->author_premium_fee, 2) }}</span></div>
                                <form action="" method="POST">
                                    @csrf
                                    <button type="submit" class="btn btn-custom">Make Payment</button>
                                </form>
                            
                        </div>
                    </div>
                </div>
            </div>
            
        </div> <!-- container -->

    </div> <!-- content -->

    

</div>
@endsection