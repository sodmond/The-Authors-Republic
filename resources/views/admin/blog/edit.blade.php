@extends('author.layouts.main', ['title' => 'Edit Blog', 'activePage' => 'blog'])

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
                                <li class="breadcrumb-item"><a href="{{ route('author.blog') }}">Blog/Podcasts</a></li>
                                <li class="breadcrumb-item"><a href="{{ route('author.blog') }}">Blog/Podcasts</a></li>
                                <li class="breadcrumb-item active">Edit Blog</li>
                            </ol>
                        </div>
                        <h4 class="page-title">Edit Blog</h4>
                    </div>
                </div>
            </div>     
            <!-- end page title --> 

            <div class="row">
                <div class="col-12">
                    <div class="card shadow">
                        <div class="card-header bg-custom">
                            <h4 class="h5 text-white">Edit Blog</h4>
                        </div>
                        <div class="card-body">
                            <div class="row mb-3">
                                <div class="col-6">
                                    <a class="btn btn-custom" href="{{ route('author.blog.get', ['id' => $blogItem->id]) }}"><i class="fa fa-arrow-circle-left"></i> Back</a>
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
                                <div class="alert alert-success" role="alert">{{ session('success') }}</div>
                            @endif
                            <form action="update" method="POST" class="pt-2" enctype="multipart/form-data">
                                @csrf
                                <div class="row mb-3">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="title">Title</label>
                                            <input class="form-control" type="text" id="title" name="title" value="{{ $blogItem->title }}" required>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="type">Type</label>
                                            <select class="form-control" id="type" name="type" required>
                                                <option value="blog" @selected($blogItem->type == 'blog')>Blog</option>
                                                <option value="podcast" @selected($blogItem->type == 'podcast')>Podcast</option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="image">Cover Image <small>(Leave empty if you do not wish to change)</small></label>
                                            <input class="form-control" type="file" id="image" name="image">
                                            <small class="text-info">(Allowed images; .jpg, .png, .jpeg | Max: 512kb | Dimension: 1170x400px)</small>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="banner_image">Banner Image <small>(Leave empty if you do not wish to change)</small></label>
                                            <input class="form-control" type="file" id="banner_image" name="banner_image">
                                            <small class="text-info">(Allowed images; .jpg, .png, .jpeg | Max: 512kb | Dimension: 1170x400px)</small>
                                        </div>
                                    </div>
                                    {{--<div class="col-md-4">
                                        <div class="form-group">
                                            <label for="video">Video <small>(Leave empty if you do not wish to change)</small></label>
                                            <input class="form-control" type="file" id="video" name="video">
                                            <small class="text-info">(Allowed video; .mp4 | Max: 5MB)</small>
                                        </div>
                                    </div>--}}
                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <label for="published_at">Published Date</label>
                                            <input class="form-control" type="datetime-local" id="published_at" name="published_at" value="{{ $blogItem->published_at }}" required>
                                        </div>
                                    </div>
                                    <div class="col-md-12">
                                        <div class="alert alert-info"><i class="fa fa-info-circle"></i> Please use video icon in editor below to upload youtube link.</div>
                                        <div class="form-group">
                                            <label for="description">Description</label>
                                            <textarea class="form-control" id="description" name="description" required>@php echo Illuminate\Support\Facades\Storage::get('author/blog/contents/'.$blogItem->content); @endphp</textarea>
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
        //alert(window.location.href);
    });
</script>
@endpush