@extends('admin.layouts.main', ['title' => 'Blog/Podcasts', 'activePage' => 'blog'])

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
                                <li class="breadcrumb-item active">Blog/Podcasts</li>
                            </ol>
                        </div>
                        <h4 class="page-title">
                            Blog/Podcast
                        </h4>
                    </div>
                </div>
            </div>     
            <!-- end page title --> 

            <div class="row">
                <div class="col-12">
                    <div class="card shadow">
                        <div class="card-header bg-custom">
                            <h4 class="h5 text-white">
                                @if(isset($author))
                                    {{ $author->firstname."'s Blogs/Podcasts" }}
                                @elseif(isset($_GET['search']))
                                    Search result for "{{ $_GET['search'] }}"
                                @else
                                    All Blogs & Podcasts
                                @endif
                            </h4>
                        </div>
                        <div class="card-body">
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
                            <div class="table-responsive">
                                <table class="table table-striped">
                                    <thead>
                                        <tr>
                                            <th>#</th>
                                            <th>Image</th>
                                            <th>Type</th>
                                            <th>Title</th>
                                            <th>Date Created</th>
                                            <th>...</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php $row = (isset($_GET['page']) && $_GET['page'] != 1) ? 10*($_GET['page']-1)+1 : 1; ?>
                                        @foreach ($blog as $item)
                                            <tr>
                                                <td>{{ $row++ }}</td>
                                                <td><img src="{{ asset('storage/author/blog/image/thumbnail/'.$item->thumbnail) }}" class="img-thumbnail" style="max-width:65px;"></td>
                                                <td>{{ ucwords($item->type) }}</td>
                                                <td>{{ $item->title }}</td>
                                                <td>{{ $item->created_at }}</td>
                                                <td><a class="btn btn-sm btn-custom" href="{{ route('admin.blog.get', ['id' => $item->id]) }}">
                                                    <i class="fa fa-eye"></i>
                                                </a></td>
                                            </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>
                            <div class="row">
                                <div class="col-12">
                                    {{ $blog->links() }}
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