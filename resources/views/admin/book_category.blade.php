@extends('admin.layouts.main', ['title' => 'Edit Book Category', 'activePage' => 'settings'])

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
                            <li class="breadcrumb-item"><a href="{{ route('admin.settings.home') }}">Settings</a></li>
                            <li class="breadcrumb-item"><a href="{{ route('admin.settings.bookcat') }}">Book Categories</a></li>
                            <li class="breadcrumb-item active">Edit Book Category</li>
                        </ol>
                    </div>
                    <h4 class="page-title">Edit Book Category</h4>
                </div>
            </div>
        </div>     
        <!-- end page title --> 
        
        <div class="row">
            <div class="col-12">
                <div class="card shadow my-4">
                    <div class="card-header bg-custom">
                        <h4 class="h5 text-white">Modify Book Category Details</h4>
                    </div>
                    <div class="card-body">
                        <div class="row mb-3">
                            <div class="col-auto">
                                <a class="btn btn-custom" href="{{ route('admin.settings.bookcat') }}">
                                    <i class="fa fa-arrow-circle-left"></i> Back</a>
                            </div>
                        </div>
                        <div class="row">
                            <fieldset class="col">
                                @if (count($errors))
                                    <div class="alert alert-danger">
                                        <strong>Whoops!</strong> There are some problems with your input.<br>
                                        <ul>
                                            @foreach ($errors->all() as $error)
                                                <li>{{ $error }}</li>
                                            @endforeach
                                        </ul>
                                    </div>
                                @endif
                                @if (session('success'))
                                    <div class="alert alert-success"><strong>Success!</strong> {{ session('success') }}</div>
                                @endif
                                <form class="row" action="{{ route('admin.settings.bookcat.update', ['id' => $book_cat->id]) }}" method="post">
                                    @csrf
                                    <div class="col-md-12 mb-2">
                                        <div class="form-group">
                                            <label class="form-label">Title</label>
                                            <input type="text" class="form-control" name="title" value="{{ $book_cat->title ?? old('title') }}" required>
                                        </div>
                                    </div>
                                    <div class="col-md-12 mb-2">
                                        <div class="form-group">
                                            <label class="form-label">Description</label>
                                            <textarea class="form-control" name="description">{{ $book_cat->description ?? old('description') }}</textarea>
                                        </div>
                                    </div>
                                    <div class="col-md-6 mb-2">
                                        <div class="form-group">
                                            <label class="form-label">Parent</label>
                                            <select class="form-control" name="parent_id">
                                                <option value="">- - - None - - -</option>
                                                @foreach ($parent_cats as $category)
                                                    @if(!empty($book_cat->parent_id))
                                                        <option value="{{ $category->id }}" @selected($book_cat->parent_id == $category->id)>{{ $category->title }}</option>
                                                    @endif
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-md-6 mb-2">
                                        <div class="form-group">
                                            <label class="form-label">Status</label>
                                            <select class="form-control" name="status" required>
                                                <option value="1" @selected($book_cat->status == true)>Active</option>
                                                <option value="0" @selected($book_cat->status == false)>Inactive</option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-md-12 my-2">
                                        <div class="form-group">
                                            <button type="submit" class="btn btn-custom w-100">Update</button>
                                        </div>
                                    </div>
                                </form>
                            </fieldset>
                        </div>
                    </div>
                </div>
            </div>
        </div>        
    </div>
</div>
@endsection

@push('custom-scripts')
    <script>
        $('button[id^="deleteAdminBtn"]').click(function() {
            var getBtnId = $(this).attr('id');
            var adminId = getBtnId.split("-")[1];
            var name = $("#adminName"+adminId).val();
            var x = confirm('Do you want to delete this Admin ('+name+')? This process cannot be reversed');
            if (x == true) {
                var url = $('#deleteAdminUrl'+adminId).val();
                window.location.href = url;
            }
        });
    </script>
@endpush