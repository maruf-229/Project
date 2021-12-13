@extends('admin.admin_master')
@section('admin')

    <div class="py-12">
        <div class="container">
            <div class="row">
                <h4 style="padding-right: 80%">Home Slider</h4>
                <a href="{{ route('add.about') }}" class="btn btn-success float-lg-right">Add About</a>
                <br>
                <div class="col-md-12">
                    <div class="card">
                        @if(session('success'))
                            <div class="alert alert-success alert-dismissible fade show" role="alert">
                                <strong>{{ session('success') }}</strong>
                                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                        @endif
                        <div class="card-header">All Slider</div>
                        <div class="card-body">
                            <table class="table">
                                <thead>
                                <tr>
                                    <th scope="col" width="5%">Sl</th>
                                    <th scope="col" width="15%">About Title</th>
                                    <th scope="col" width="30%">Short Description</th>
                                    <th scope="col" width="35%">long Description</th>
                                    <th scope="col" width="15%">Action</th>
                                </tr>
                                </thead>
                                <tbody>
                                @php($sl=1)
                                @foreach($home_about as $row)
                                    <tr>
                                        <td>{{ $sl++ }}</td>
                                        <td>{{ $row->title }}</td>
                                        <td>{{ $row->short_des }}</td>
                                        <td>{{ $row->long_des }}</td>
                                        <td>
                                            <a href="{{ route('edit.about',$row->id) }}" class="btn btn-info">Edit</a>
                                            <a href="{{ route('delete.about',$row->id) }}" onclick="return confirm('Are You Sure')" class="btn btn-danger">Delete</a>
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
@endsection



