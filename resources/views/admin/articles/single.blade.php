@extends('admin.layouts.main', ['title' => 'Articles', 'activePage' => 'articles'])

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
                                <li class="breadcrumb-item"><a href="{{ route('admin.articles') }}">Articles</a></li>
                                <li class="breadcrumb-item active">Article Details</li>
                            </ol>
                        </div>
                        <h4 class="page-title">Single Article Details</h4>
                    </div>
                </div>
            </div>     
            <!-- end page title --> 

            <div class="row">
                <div class="col-12">
                    <div class="card shadow">
                        <div class="card-header bg-custom">
                            <h4 class="h5 text-white">Single Article Details</h4>
                        </div>
                        <div class="card-body">
                            <div class="row mb-3">
                                <div class="col-6">
                                    <a class="btn btn-custom" href="{{ route('admin.articles') }}"><i class="fa fa-arrow-circle-left"></i> Back</a>
                                </div>
                                <div class="col-6 text-right">
                                    <a class="btn btn-info" href="{{ route('admin.article.edit', ['id' => $article->id]) }}"><i class="fa fa-edit"></i> Edit</a>
                                    <button class="btn btn-danger" id="deleteBtn"><i class="fa fa-trash"></i> Delete</button>
                                    <input type="hidden" id="deleteUrl" value="{{ route('admin.article.delete', ['id' => $article->id]) }}">
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-6">
                                    <img class="img-fluid" src="{{ asset('storage/'.$article->image) }}" alt="Book Cover Image">
                                </div>
                                <div class="col-md-6">
                                    <div class="table-responsive">
                                        <table class="table table-striped">
                                            <tr>
                                                <th>Title</th>
                                                <td>{{ $article->title }}</td>
                                            </tr>
                                            <tr>
                                                <th>Published Date</th>
                                                <td>{{ $article->published_at }}</td>
                                            </tr>
                                            <tr>
                                                <th>Date Created</th>
                                                <td>{{ $article->created_at }}</td>
                                            </tr>
                                        </table>
                                    </div>
                                </div>
                                <div class="col-md-12 my-3">
                                    <strong>Content</strong>
                                    <div class="table-responsive">
                                        <table class="table table-striped">
                                            <tr>
                                                <td><?php echo Illuminate\Support\Facades\Storage::get('articles/contents/'.$article->content); ?></td>
                                            </tr>
                                        </table>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            
        </div> <!-- container -->

    </div> <!-- content -->
@endsection

@push('custom-scripts')
    <script>
        $('#deleteBtn').click(function(e) {
            e.preventDefault();
            var deleteUrl = $('#deleteUrl').val();
            var x = confirm('Do you want to delete this article? This action cannot be reversed.')
            if (x == true) {
                window.location.href = deleteUrl;
            }
        });
    </script>
@endpush