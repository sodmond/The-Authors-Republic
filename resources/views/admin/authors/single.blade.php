@extends('admin.layouts.main', ['title' => 'Author Profile', 'activePage' => 'authors'])

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
                                <li class="breadcrumb-item"><a href="{{ route('admin.authors') }}">Authors</a></li>
                                <li class="breadcrumb-item active">Author Profile</li>
                            </ol>
                        </div>
                        <h4 class="page-title">Author Profile</h4>
                    </div>
                </div>
            </div>     
            <!-- end page title --> 

            <div class="row">
                <div class="col-12">
                    <div class="card shadow">
                        <div class="card-header bg-custom">
                            <h4 class="h5 text-white">Author Profile Details</h4>
                        </div>
                        <div class="card-body">
                            <div class="row mb-3">
                                <div class="col-6">
                                    <a class="btn btn-custom" href="{{ route('admin.authors') }}"><i class="fa fa-arrow-circle-left"></i> Back</a>
                                </div>
                                <div class="col-6 text-right">
                                    @if($author->approval == true)
                                        <a class="btn btn-primary mb-1" href="{{ route('admin.book.edit', ['id' => $author->id]) }}"><i class="fas fa-book"></i> Books</a>
                                        <a class="btn btn-success mb-1" href="{{ route('admin.book.edit', ['id' => $author->id]) }}"><i class="fas fa-cart-plus"></i> Sales Order</a>
                                    @else
                                        <button type="button" class="btn btn-success mb-1 mr-2" onclick="document.getElementById('approveProfile').submit()"><i class="fas fa-check-circle"></i> Approve</a>
                                        <button type="button" class="btn btn-danger mb-1" onclick="document.getElementById('declineProfile').submit()"><i class="fas fa-times-circle"></i> Decline</a>
                                        <form action="{{ route('admin.author.approval', ['id' => $author->id]) }}" method="post" id="approveProfile">
                                            @csrf
                                            <input type="hidden" name="status" value="1">
                                        </form>
                                        <form action="{{ route('admin.author.approval', ['id' => $author->id]) }}" method="post" id="declineProfile">
                                            @csrf
                                            <input type="hidden" name="status" value="0">
                                        </form>
                                    @endif
                                </div>
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
                            <div class="row">
                                <div class="col-md-6">
                                    <img class="img-fluid" src="{{ asset('storage/'.$author->image) }}" alt="Author Profile Picture">
                                    <div class="py-3">
                                        Status: 
                                        @if($author->status == 0)
                                            <span class="bg-warning px-2 py-1 text-white rounded mr-3">Suspended</span>
                                        @else
                                            <span class="bg-success px-2 py-1 text-white rounded mr-3">Active</span>
                                        @endif
                                        Approval: 
                                        @if($author->approval == 0)
                                            <span class="bg-secondary px-2 py-1 text-white rounded">Pending</span>
                                        @else
                                            <span class="bg-success px-2 py-1 text-white rounded">Approved</span>
                                        @endif
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="table-responsive">
                                        <table class="table table-striped">
                                            <tr>
                                                <th>Title</th>
                                                <td>{{ $author->title }}</td>
                                            </tr>
                                            <tr>
                                                <th>Firstname</th>
                                                <td>{{ $author->firstname }}</td>
                                            </tr>
                                            <tr>
                                                <th>Lastname</th>
                                                <td>{{ $author->lastname }}</td>
                                            </tr>
                                            <tr>
                                                <th>Email Address</th>
                                                <td>{{ $author->email }}</td>
                                            </tr>
                                            <tr>
                                                <th>Phone</th>
                                                <td>0{{ $author->phone }}</td>
                                            </tr>
                                            <tr>
                                                <th>Level</th>
                                                <td>{{ ($author->level == 'basic') ? 'Starter' : ucwords($author->level) }}</td>
                                            </tr>
                                            <tr>
                                                <th>Date of Birth</th>
                                                <td>{{ $author->dob }}</td>
                                            </tr>
                                            <tr>
                                                <th>City</th>
                                                <td>{{ $author->city }}</td>
                                            </tr>
                                            <tr>
                                                <th>State</th>
                                                <td>{{ $author->state }}</td>
                                            </tr>
                                            <tr>
                                                <th>Zipcode</th>
                                                <td>{{ $author->zip }}</td>
                                            </tr>
                                            <tr>
                                                <th>Date Created</th>
                                                <td>{{ $author->created_at }}</td>
                                            </tr>
                                            <tr>
                                                <th>Last Updated</th>
                                                <td>{{ $author->updated_at }}</td>
                                            </tr>
                                        </table>
                                    </div>
                                </div>
                                <div class="col-md-12 my-3">
                                    <strong>Bio</strong>
                                    <div class="table-responsive">
                                        <table class="table table-striped">
                                            <tr>
                                                <td><?php echo Illuminate\Support\Facades\Storage::get('author/contents/'.$author->description); ?></td>
                                            </tr>
                                        </table>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="row">
                <div class="col-12">
                    <div class="card shadow">
                        <div class="card-header bg-custom">
                            <h4 class="h5 text-white">Parent / Guardian Details</h4>
                        </div>
                        <div class="card-body">
                            <div class="table-responsive">
                                <table class="table table-striped">
                                    <tr>
                                        <th>Title</th>
                                        <td>{{ $author->author_parent->title }}</td>
                                    </tr>
                                    <tr>
                                        <th>Firstname</th>
                                        <td>{{ $author->author_parent->firstname }}</td>
                                    </tr>
                                    <tr>
                                        <th>Lastname</th>
                                        <td>{{ $author->author_parent->lastname }}</td>
                                    </tr>
                                    <tr>
                                        <th>Email Address</th>
                                        <td>{{ $author->author_parent->email }}</td>
                                    </tr>
                                    <tr>
                                        <th>Phone</th>
                                        <td>0{{ $author->author_parent->phone }}</td>
                                    </tr>
                                    <tr>
                                        <th>Date of Birth</th>
                                        <td>{{ $author->author_parent->dob }}</td>
                                    </tr>
                                    <tr>
                                        <th>Relationship</th>
                                        <td>{{ $author->author_parent->relationship }}</td>
                                    </tr>
                                    <tr>
                                        <th>City</th>
                                        <td>{{ $author->city }}</td>
                                    </tr>
                                    <tr>
                                        <th>State</th>
                                        <td>{{ $author->state }}</td>
                                    </tr>
                                    <tr>
                                        <th>Zipcode</th>
                                        <td>{{ $author->zip }}</td>
                                    </tr>
                                    <tr>
                                        <th>Date Created</th>
                                        <td>{{ $author->created_at }}</td>
                                    </tr>
                                    <tr>
                                        <th>Last Updated</th>
                                        <td>{{ $author->updated_at }}</td>
                                    </tr>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            
        </div> <!-- container -->

    </div> <!-- content -->
@endsection