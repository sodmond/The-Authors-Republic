@extends('admin.layouts.main', ['title' => 'All Authors', 'activePage' => 'authors'])

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
                                <li class="breadcrumb-item active">All Authors</li>
                            </ol>
                        </div>
                        <h4 class="page-title">All Authors</h4>
                    </div>
                </div>
            </div>     
            <!-- end page title --> 

            <div class="row">
                <div class="col-12">
                    <div class="card shadow">
                        <div class="card-header bg-custom">
                            <h4 class="h5 text-white">List of All Authors</h4>
                        </div>
                        <div class="card-body">
                            <div class="row justify-content-end mb-3">
                                <div class="col-auto">
                                    <a class="btn btn-warning" href="{{ route('admin.authors.pending') }}">
                                        <i class="fa fa-spinner"></i> Pending Approval ({{ $authors_pending->count() }})</a>
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
                                            <th>Approval</th>
                                            <th>Date Created</th>
                                            <th>...</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php $row = (isset($_GET['page']) && $_GET['page'] != 1) ? 10*($_GET['page']-1)+1 : 1; ?>
                                        @foreach ($authors as $author)
                                            <tr>
                                                <td>{{ $row++ }}</td>
                                                <td>{{ $author->firstname }}</td>
                                                <td>{{ $author->lastname }}</td>
                                                <td>{{ $author->email }}</td>
                                                <td>0{{ $author->phone }}</td>
                                                <td>
                                                    @if($author->approval == 0)
                                                    <span class="bg-secondary px-2 py-1 text-white rounded">pending</span>
                                                    @else
                                                    <span class="bg-success px-2 py-1 text-white rounded">approved</span>
                                                    @endif
                                                </td>
                                                <td>{{ $author->created_at }}</td>
                                                <td><a class="btn btn-sm btn-custom" href="{{ route('admin.author', ['id' => $author->id]) }}">
                                                    <i class="fa fa-eye"></i>
                                                </a></td>
                                            </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>
                            <div class="row mb-3">
                                <div class="col-auto">
                                    {{ $authors->appends($_GET)->links() }}
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