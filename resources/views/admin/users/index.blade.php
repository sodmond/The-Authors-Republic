@extends('admin.layouts.main', ['title' => 'All Users', 'activePage' => 'users'])

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
                                <li class="breadcrumb-item"><a href="{{ route('admin.home') }}">Dashboard</a></li>
                                <li class="breadcrumb-item active">All Users</li>
                            </ol>
                        </div>
                        <h4 class="page-title">All Users</h4>
                    </div>
                </div>
            </div>     
            <!-- end page title --> 

            <div class="row">
                <div class="col-12">
                    <div class="card shadow">
                        <div class="card-header bg-custom">
                            <h4 class="h5 text-white">
                                @if(isset($_GET['search']))
                                    Search result for "{{$_GET['search']}}"
                                @else
                                    List of All Users
                                @endif
                            </h4>
                        </div>
                        <div class="card-body">
                            <div class="row mb-3">
                                <div class="col-md-6">
                                    <form class="form-inline" action="{{ route('admin.users.export') }}" method="get">
                                        <select class="form-control mr-2" name="month" id="month" required>
                                            <option value="">- - - Select Month - - -</option>
                                            <option value="1">January</option>
                                            <option value="2">February</option>
                                            <option value="3">March</option>
                                            <option value="4">April</option>
                                            <option value="5">May</option>
                                            <option value="6">June</option>
                                            <option value="7">July</option>
                                            <option value="8">August</option>
                                            <option value="9">September</option>
                                            <option value="10">October</option>
                                            <option value="11">November</option>
                                            <option value="12">December</option>
                                        </select>
                                        <select class="form-control mr-2" name="year" id="year" required>
                                            <option value="">- - - Select Year - - -</option>
                                            @for ($i = 0; $i <= 10; $i++)
                                                <option value="{{ 2024 + $i }}">{{ 2024 + $i }}</option>
                                            @endfor
                                        </select>
                                        <button class="btn btn-custom" type="submit">Export</button>
                                    </form>
                                </div>
                            </div>
                            <div class="table-responsive">
                                <table class="table table-striped">
                                    <thead>
                                        <tr>
                                            <th>#</th>
                                            <th>Firstname</th>
                                            <th>Lastname</th>
                                            <th>Email</th>
                                            <th>Phone</th>
                                            <th>Date Created</th>
                                            <th>...</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php $row = (isset($_GET['page']) && $_GET['page'] != 1) ? 10*($_GET['page']-1)+1 : 1; ?>
                                        @foreach ($users as $user)
                                            <tr>
                                                <td>{{ $row++ }}</td>
                                                <td>{{ $user->firstname }}</td>
                                                <td>{{ $user->lastname }}</td>
                                                <td>{{ $user->email }}</td>
                                                <td>0{{ $user->phone }}</td>
                                                <td>{{ $user->created_at }}</td>
                                                <td><a class="btn btn-sm btn-custom" href="{{ route('admin.user', ['id' => $user->id]) }}">
                                                    <i class="fa fa-eye"></i>
                                                </a></td>
                                            </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>
                            <div class="row mb-3">
                                <div class="col-auto">
                                    {{ $users->appends($_GET)->links() }}
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            
        </div> <!-- container -->

    </div> <!-- content -->

    

</div>
@endsection