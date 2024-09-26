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
                                <li class="breadcrumb-item active">New Article</li>
                            </ol>
                        </div>
                        <h4 class="page-title">New Article</h4>
                    </div>
                </div>
            </div>     
            <!-- end page title --> 

            <div class="row">
                <div class="col-12">
                    <div class="card shadow">
                        <div class="card-header bg-custom">
                            <h4 class="h5 text-white">Add New Articles</h4>
                        </div>
                        <div class="card-body">
                            <div class="row mb-3">
                                <div class="col-6">
                                    <a class="btn btn-custom" href="{{ route('admin.articles') }}"><i class="fa fa-arrow-circle-left"></i> Back</a>
                                </div>
                                <div class="col-6">&nbsp;</div>
                            </div>
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
                                <div class="alert alert-success" role="alert"><strong>Success!</strong> {{ session('success') }}</div>
                            @endif
                            <form action="" method="POST" class="pt-2" enctype="multipart/form-data">
                                @csrf
                                <div class="row mb-3">
                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <label for="title">Title</label>
                                            <input class="form-control" type="text" id="title" name="title" value="{{ old('title') }}" required>
                                        </div>
                                    </div>
                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <label for="image">Cover Image</label>
                                            <input class="form-control" type="file" id="image" name="image" required>
                                            <small class="text-info">(Allowed images: .jpg, .png, .jpeg | Max size: 512kb | Dimension: 800x600px)</small>
                                        </div>
                                    </div>
                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <label for="description">Description</label>
                                            <textarea class="form-control" id="description" name="description" required>{{ old('description') }}</textarea>
                                            <div id="testDesc"></div>
                                        </div>
                                    </div>
                                    <button type="submit" class="btn btn-custom my-3 col-12"><i class="fas fa-save"></i> Save</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
            
        </div> <!-- container -->

    </div> <!-- content -->
@endsection

@push('custom-scripts')
<script>
    $(document).ready(function() {
        $('textarea').richText();
    });
</script>
@endpush