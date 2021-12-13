@extends('admin.admin_master')
@section('admin')

    <div class="py-12">
        <div class="container">
            <div class="row">
                <h4 style="padding-right: 80%">Home Slider</h4>
                <a href="{{ route('add.slider') }}" class="btn btn-success float-lg-right">Add Slider</a>
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
                                    <th scope="col" width="15%">Title</th>
                                    <th scope="col" width="30%">Description</th>
                                    <th scope="col" width="25%">Slider Image</th>
                                    <th scope="col" width="15%">Action</th>
                                </tr>
                                </thead>
                                <tbody>
                                @php($sl=1)
                                @foreach($sliders as $row)
                                    <tr>
                                        <td>{{ $sl++ }}</td>
                                        <td>{{ $row->title }}</td>
                                        <td>{{ $row->description }}</td>
                                        <td><img src="{{ asset($row->image) }}" style="height: 90px"></td>
                                        <td>
                                            <a href="{{ route('edit.slider',$row->id) }}" class="btn btn-info">Edit</a>
                                            <a href="{{ route('delete.slider',$row->id) }}" onclick="return confirm('Are You Sure')" class="btn btn-danger">Delete</a>
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



