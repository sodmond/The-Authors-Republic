@extends('layouts.user', ['title' => 'My Orders', 'activePage' => 'orders'])

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
                                <li class="breadcrumb-item"><a href="{{ route('user.home') }}">Home</a></li>
                                <li class="breadcrumb-item active">My Orders</li>
                            </ol>
                        </div>
                        <h4 class="page-title">My Orders</h4>
                    </div>
                </div>
            </div>     
            <!-- end page title --> 
            
        </div> <!-- container -->

    </div> <!-- content -->

    

</div>
@endsection