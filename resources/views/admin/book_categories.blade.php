@extends('admin.layouts.main', ['title' => 'Book Categories', 'activePage' => 'settings'])

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
                            <li class="breadcrumb-item active">Book Categories</li>
                        </ol>
                    </div>
                    <h4 class="page-title">Book Categories</h4>
                </div>
            </div>
        </div>     
        <!-- end page title --> 

        <div class="row" id="adminList">
            <div class="col-12">
                <div class="card shadow">
                    <div class="card-header bg-custom">
                        <h4 class="h5 text-white">List of All Book Categories</h4>
                    </div>
                    <div class="card-body">
                        <div class="row mb-3">
                            <div class="col-6">
                                <a class="btn btn-custom" href="{{ route('admin.settings.home') }}">
                                    <i class="fa fa-arrow-circle-left"></i> Back</a>
                            </div>
                            <div class="col-md-6 text-right">
                                <a class="btn btn-custom" href="#newBookCat"><i class="fas fa-plus-circle"></i> New Category</a>
                            </div>
                        </div>
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
                        <div class="row" style="max-height:500px; overflow-y:scroll;">
                            <div class="col-md-12">
                                <div class="table-responsive">
                                    <table class="table table-striped table-hover mb-0">
                                        <thead>
                                            <tr>
                                                <th>#</th>
                                                <th>Title</th>
                                                <th>Books #</th>
                                                <th>Parent</th>
                                                <th>Status</th>
                                                <th>Date Created</th>
                                                <th>...</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php $row = (isset($_GET['page']) && $_GET['page'] != 1) ? 10*($_GET['page']-1)+1 : 1; ?>
                                            @foreach ($book_cats as $key => $book_cat)
                                                <tr>
                                                    <td>{{ $row++ }}</td>
                                                    <td>{{ $book_cat->title }}</td>
                                                    <td>{{ count($book_cat->books) }}</td>
                                                    <td>@if(!empty($book_cat->parent_id)) {{ $book_cats[$book_cat->parent_id]->title }} @endif</td>
                                                    <td>
                                                        <span class="bg-{{ ($book_cat->status == true) ? 'success' : 'danger' }} px-2 py-1 text-white rounded">
                                                            {{ ($book_cat->status == true) ? 'Active' : 'Inactive' }}</span>
                                                    </td>
                                                    <td>{{ $book_cat->created_at }}</td>
                                                    <td>
                                                        <a class="btn btn-info btn-xs" href="{{ route('admin.settings.bookcat.edit', ['id' => $book_cat->id]) }}">
                                                            <i class="fa fa-edit"></i></a>
                                                        <input type="hidden" id="{{'categoryName'.$book_cat->id}}" value="{{$book_cat->title}}">
                                                        <input type="hidden" id="{{'deleteCategoryUrl'.$book_cat->id}}" value="{{ route('admin.settings.bookcat.trash', ['id' => $book_cat->id]) }}">
                                                        <button class="btn btn-danger btn-xs" id="{{'deleteCategoryBtn-'.$book_cat->id}}">
                                                            <i class="fa fa-trash"></i>
                                                        </button>   
                                                    </td>
                                                </tr>
                                            @endforeach
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        
        <div class="row" id="newBookCat">
            <div class="col-12">
                <div class="card shadow my-4">
                    <div class="card-header bg-custom">
                        <h4 class="h5 text-white">Add New Category</h4>
                    </div>
                    <div class="card-body">
                        <div class="row">
                            <fieldset class="col">
                                <form class="row" action="{{ route('admin.settings.bookcat.new') }}" method="post">
                                    @csrf
                                    <div class="col-md-12 mb-2">
                                        <div class="form-group">
                                            <label class="form-label">Title</label>
                                            <input type="text" class="form-control" name="title" value="{{ old('title') }}" required>
                                        </div>
                                    </div>
                                    <div class="col-md-12 mb-2">
                                        <div class="form-group">
                                            <label class="form-label">Description</label>
                                            <textarea class="form-control" name="description">{{ old('description') }}</textarea>
                                        </div>
                                    </div>
                                    <div class="col-md-6 mb-2">
                                        <div class="form-group">
                                            <label class="form-label">Parent</label>
                                            <select class="form-control" name="parent_id">
                                                <option value="">- - - Select - - -</option>
                                                @foreach ($book_cats as $book_cat)
                                                    @if($book_cat->parent_id == '')
                                                        <option value="{{ $book_cat->id }}">{{ $book_cat->title }}</option>
                                                    @endif
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-md-6 mb-2">
                                        <div class="form-group">
                                            <label class="form-label">Status</label>
                                            <select class="form-control" name="status" required>
                                                <option value="">- - - Select - - -</option>
                                                <option value="1">Active</option>
                                                <option value="0">Inactive</option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-md-12 my-2">
                                        <div class="form-group">
                                            <button type="submit" class="btn btn-custom w-100">Submit</button>
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
        $('button[id^="deleteCategoryBtn"]').click(function() {
            var getBtnId = $(this).attr('id');
            var categoryId = getBtnId.split("-")[1];
            var name = $("#categoryName"+categoryId).val();
            var x = confirm('Do you want to delete this category ('+name+')? This process cannot be reversed');
            if (x == true) {
                var url = $('#deleteCategoryUrl'+categoryId).val();
                window.location.href = url;
            }
        });
    </script>
@endpush