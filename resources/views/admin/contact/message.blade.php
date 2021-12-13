@extends('admin.admin_master')
@section('admin')

    <div class="py-12">
        <div class="container">
            <div class="row">
                <h4 style="padding-right: 78%">Admin Message</h4>
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
                        <div class="card-header">All Messages</div>
                        <div class="card-body">
                            <table class="table">
                                <thead>
                                <tr>
                                    <th scope="col" width="5%">Sl</th>
                                    <th scope="col" width="15%">Client Name</th>
                                    <th scope="col" width="15%">Client Email</th>
                                    <th scope="col" width="20%">Client Subject</th>
                                    <th scope="col" width="30%">Client Message</th>
                                    <th scope="col" width="10%">Action</th>
                                </tr>
                                </thead>
                                <tbody>
                                @php($sl=1)
                                @foreach($messages as $row)
                                    <tr>
                                        <td>{{ $sl++ }}</td>
                                        <td>{{ $row->name }}</td>
                                        <td>{{ $row->email }}</td>
                                        <td>{{ $row->subject }}</td>
                                        <td>{{ $row->message }}</td>
                                        <td>
                                            <a href="{{ route('delete.message',$row->id) }}" onclick="return confirm('Are You Sure')" class="btn btn-danger">Delete</a>
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




