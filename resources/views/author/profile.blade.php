@extends('author.layouts.main', ['title' => 'My Profile', 'activePage' => 'account'])

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
                                <li class="breadcrumb-item"><a href="{{ route('author.home') }}">Home</a></li>
                                <li class="breadcrumb-item"><a href="javascript: void(0);">Account</a></li>
                                <li class="breadcrumb-item active">My Profile</li>
                            </ol>
                        </div>
                        <h4 class="page-title">My Profile</h4>
                    </div>
                </div>
            </div>     
            <!-- end page title --> 

            <div class="row">
                <div class="col-md-12">
                    <div class="card-box">
                        <div class="row mb-3">
                            <div class="col-md-6">
                                <h4 class="header-title">Profile Details</h4>
                                <p class="sub-header">
                                    You can modify your profile details below.
                                </p>
                            </div>
                            <div class="col-md-auto">
                                @php $profile_pix = empty(auth('author')->user()->image) ? asset('frontend/images/author/imag-25.jpg') : asset('storage/'.auth('author')->user()->image) @endphp
                                <img class="img-fluid img-thumbnail rounded" src="{{ $profile_pix }}" alt="Profile picture" style="max-width:120px;">
                                <div class="text-center mt-2">
                                    <span class="bg-warning text-dark py-1 px-3 rounded">
                                        Level: 
                                        <strong>{{ (auth('author')->user()->level == 'basic') ? 'Starter' : ucwords(auth('author')->user()->level) }}</strong>
                                    </span>
                                </div>
                            </div>
                            <div class="col-md-3">
                                <form action="{{ route('author.profile.update.image') }}" method="post" enctype="multipart/form-data">
                                    @csrf
                                    <div class="form-group">
                                        <label for="image" class="col-form-label">Select Image</label>
                                        <input type="file" class="form-control" id="image" name="image" required>
                                        <small class="text-info">(Allowed images; .jpg, .png, .jpeg | Max: 512kb | Ratio: 1/1 | Min-Width: 370px)</small>
                                    </div>
                                    <input type="submit" class="btn btn-custom btn-sm" value="Change Profile Picture">
                                </form>
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

                        <form method="POST" action="{{ route('author.profile.update') }}">
                            @method('put')
                            @csrf
                            <div class="row">
                                <div class="col-md-2">
                                    <div class="form-group">
                                        <label for="title" class="col-form-label">Title</label>
                                        <input type="text" class="form-control" id="title" name="title" value="{{ auth('author')->user()->title }}">
                                    </div>
                                </div>
                                <div class="col-md-5">
                                    <div class="form-group">
                                        <label for="firstname" class="col-form-label">Firstname</label>
                                        <input type="text" class="form-control" id="firstname" name="firstname" value="{{ auth('author')->user()->firstname }}" required>
                                    </div>
                                </div>
                                <div class="col-md-5">
                                    <div class="form-group">
                                        <label for="lastname" class="col-form-label">Lastname</label>
                                        <input type="text" class="form-control" id="lastname" name="lastname" value="{{ auth('author')->user()->lastname }}" required>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="phone" class="col-form-label">Phone</label>
                                        <input type="number" class="form-control" id="phone" name="phone" value="{{ auth('author')->user()->phone }}" required>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="dob" class="col-form-label">Date of Birth</label>
                                        <input type="date" class="form-control" id="dob" name="dob" value="{{ auth('author')->user()->dob }}" required>
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label for="city" class="col-form-label">City</label>
                                        <input type="text" class="form-control" id="city" name="city" value="{{ auth('author')->user()->city }}" required>
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label for="state" class="col-form-label">State</label>
                                        <input type="text" class="form-control" id="state" name="state" value="{{ auth('author')->user()->state }}" required>
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label for="zip" class="col-form-label">Zip/Postal Code</label>
                                        <input type="number" class="form-control" id="zip" name="zip" value="{{ auth('author')->user()->zip }}" required>
                                    </div>
                                </div>
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label for="bio" class="col-form-label">Bio</label>
                                        <textarea class="form-control" id="bio" name="bio" rows="10">{{ auth('author')->user()->bio }}</textarea>
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label for="facebook" class="col-form-label">Facebook</label>
                                        <input type="url" class="form-control" id="facebook" name="facebook" value="{{ auth('author')->user()->facebook }}">
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label for="twitter" class="col-form-label">Twitter</label>
                                        <input type="url" class="form-control" id="twitter" name="twitter" value="{{ auth('author')->user()->twitter }}">
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label for="linkedin" class="col-form-label">Linkedin</label>
                                        <input type="url" class="form-control" id="linkedin" name="linkedin" value="{{ auth('author')->user()->linkedin }}">
                                    </div>
                                </div>
                            </div>

                            <button type="submit" class="btn btn-custom my-3">Update</button>
                        </form>
                    </div> <!-- end card-box -->
                </div> <!-- end col -->

                @if($age->y <= 18)
                <div class="col-md-12">
                    <div class="accordion" id="accordionExample">
                        <div class="card">
                          <div class="card-header bg-custom" id="headingOne">
                            <h2 class="mb-0">
                              <a class="btn btn-link btn-block text-left" href="javascript:void(0)" data-toggle="collapse" data-target="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
                                <h4 class="header-title text-white">Parent / Guardian Details</h4>
                                <p class="sub-header text-white">Update your Parent/Guardian profile details if you are 18 years or below.</p>
                              </a>
                            </h2>
                          </div>
                      
                          <div id="collapseOne" class="collapse show" aria-labelledby="headingOne" data-parent="#accordionExample">
                            <div class="card-body">
                                <form method="POST" action="{{ route('author.profile.update.parent') }}">
                                    @csrf
                                    <div class="row">
                                        <div class="col-md-2">
                                            <div class="form-group">
                                                <label for="title" class="col-form-label">Title</label>
                                                <input type="text" class="form-control" id="title" name="title" value="{{ $author_parent->title ?? '' }}">
                                            </div>
                                        </div>
                                        <div class="col-md-5">
                                            <div class="form-group">
                                                <label for="firstname" class="col-form-label">Firstname</label>
                                                <input type="text" class="form-control" id="firstname" name="firstname" value="{{ $author_parent->firstname ?? '' }}" required>
                                            </div>
                                        </div>
                                        <div class="col-md-5">
                                            <div class="form-group">
                                                <label for="lastname" class="col-form-label">Lastname</label>
                                                <input type="text" class="form-control" id="lastname" name="lastname" value="{{ $author_parent->lastname ?? '' }}" required>
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label for="email" class="col-form-label">Email</label>
                                                <input type="email" class="form-control" id="email" name="email" value="{{ $author_parent->email ?? '' }}" required>
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label for="phone" class="col-form-label">Phone</label>
                                                <input type="number" class="form-control" id="phone" name="phone" value="{{ $author_parent->phone ?? '' }}" required>
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label for="dob" class="col-form-label">Date of Birth</label>
                                                <input type="date" class="form-control" id="dob" name="dob" value="{{ $author_parent->dob ?? '' }}" required>
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label for="relationship" class="col-form-label">Relationship</label>
                                                <select class="form-control" name="relationship" id="relationship" required>
                                                    <option value="">- - - Select - - -</option>
                                                    <option value="father" @selected($author_parent->relationship == 'father')>Father</option>
                                                    <option value="mother" @selected($author_parent->relationship == 'mother')>Mother</option>
                                                    <option value="brother" @selected($author_parent->relationship == 'brother')>Brother</option>
                                                    <option value="sister" @selected($author_parent->relationship == 'sister')>Sister</option>
                                                    <option value="guardian" @selected($author_parent->relationship == 'guardian')>Guardian</option>
                                                    <option value="uncle" @selected($author_parent->relationship == 'uncle')>Uncle</option>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="col-md-4">
                                            <div class="form-group">
                                                <label for="city" class="col-form-label">City</label>
                                                <input type="text" class="form-control" id="city" name="city" value="{{ $author_parent->city }}" required>
                                            </div>
                                        </div>
                                        <div class="col-md-4">
                                            <div class="form-group">
                                                <label for="state" class="col-form-label">State</label>
                                                <input type="text" class="form-control" id="state" name="state" value="{{ $author_parent->state }}" required>
                                            </div>
                                        </div>
                                        <div class="col-md-4">
                                            <div class="form-group">
                                                <label for="zip" class="col-form-label">Zip/Postal Code</label>
                                                <input type="number" class="form-control" id="zip" name="zip" value="{{ $author_parent->zip }}" required>
                                            </div>
                                        </div>
                                    </div>
                                    <button type="submit" class="btn btn-custom my-3">Update</button>
                                </form>
                            </div>
                          </div>
                        </div>
                    </div>
                </div>
                @endif
            </div>
            
        </div> <!-- container -->

    </div> <!-- content -->

    

</div>
@endsection