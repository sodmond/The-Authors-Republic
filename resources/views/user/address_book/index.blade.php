@extends('layouts.app', ['activePage' => 'user.addressBook', 'title' => 'Address Book'])

@section('content')
<section class="tg-sectionspace tg-haslayout">
    <div class="container">
        <div class="row">
            <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
                <div class="panel panel-default shadow">
                    <div class="panel-heading">
                        <div class="row">
                            <div class="col-md-6"><h4>My Addresses</h4></div>
                            <div class="col-md-6 text-right">
                                <a class="btn btn-success text-white" href="{{ route('user.addressBook.new') }}">
                                    <i class="fa fa-plus-circle"></i> Add New
                                </a>
                            </div>
                        </div>
                    </div>
                    <div class="panel-body">
                        <div class="table-responsive">
                            <table class="table table-hover table-striped">
                                <thead>
                                    <tr>
                                        <th>#</th>
                                        <th>Firstname</th>
                                        <th>Lastname</th>
                                        <th>Address</th>
                                        <th>City</th>
                                        <th>State</th>
                                        <th>Zip/Postal Code</th>
                                        <th>Date Created</th>
                                        <th>...</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php $row = (isset($_GET['page']) && $_GET['page'] != 1) ? 10*($_GET['page']-1)+1 : 1; ?>
                                    @foreach ($addressBook as $address)
                                        <tr>
                                            <td>{{ $row++ }} @if($address->default) <i class="fa fa-stop text-primary"></i> @endif</td>
                                            <td>{{ $address->fname }}</td>
                                            <td>{{ $address->lname }}</td>
                                            <td>{{ $address->address }}</td>
                                            <td>{{ $address->city }}</td>
                                            <td>{{ ucwords($states[$address->state]->state) }}</td>
                                            <td>{{ $address->zip }}</td>
                                            <td>{{ $address->created_at }}</td>
                                            <td>
                                                <a class="btn btn-sm btn-success text-white" href="{{ route('user.addressBook.edit', ['id' => $address->id]) }}">
                                                    <i class="fa fa-edit"></i>
                                                </a>
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                        <div class="row">
                            <div class="col">{{ $addressBook->links() }}</div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
@endsection
