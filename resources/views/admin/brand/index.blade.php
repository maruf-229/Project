@extends('admin.admin_master')
@section('admin')

    <div class="py-12">
        <div class="container">
            <div class="row">
                <div class="col-md-8">
                    <div class="card">
{{--                        @if(session('success'))--}}
{{--                        <div class="alert alert-warning alert-dismissible fade show" role="alert">--}}
{{--                            <strong>{{ session('success') }}</strong>--}}
{{--                            <button type="button" class="close" data-dismiss="alert" aria-label="Close">--}}
{{--                                <span aria-hidden="true">&times;</span>--}}
{{--                            </button>--}}
{{--                        </div>--}}
{{--                        @endif--}}
                        <div class="card-header">All Brand</div>
                        <div class="card-body">
                            <table class="table">
                                <thead>
                                <tr>
                                    <th scope="col">Sl</th>
                                    <th scope="col">Brand Name</th>
                                    <th scope="col">Brand Image</th>
                                    <th scope="col">Created At</th>
                                    <th scope="col">Action</th>
                                </tr>
                                </thead>
                                <tbody>
                                @foreach($brands as $row)
                                    <tr>
                                        <th scope="row">{{ $brands->firstItem()+$loop->index }}</th>
                                        <td>{{ $row->brand_name }}</td>
                                        <td><img src="{{ asset($row->brand_image) }}" style="height: 50px"></td>
                                        <td>
                                            @if($row->created_at==NULL)
                                                <span class="text-danger">No date Set</span>
                                            @else
                                                {{ $row->created_at }}
                                            @endif
                                        </td>
                                        <td>
                                            <a href="{{ route('edit.brand',$row->id) }}" class="btn btn-info">Edit</a>
                                            <a href="{{ route('delete.brand',$row->id) }}" onclick="return confirm('Are You Sure')" class="btn btn-danger">Delete</a>
                                        </td>
                                    </tr>
                                @endforeach
                                </tbody>
                            </table>
                            {{ $brands->links() }}
                        </div>
                    </div>
                </div>

                <div class="col-md-4">
                    <div class="card">
                        <div class="card-header">Add Brand</div>
                        <div class="card-body">
                            <form action="{{ route('store.brand') }}" method="POST" enctype="multipart/form-data">
                                @csrf
                                <div class="form-group">
                                    <label for="exampleInputEmail1">Brand Name</label>
                                    <input type="text" class="form-control" name="brand_name" id="exampleInputEmail1" placeholder="Enter Brand Name">
                                    @error('brand_name')
                                    <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div><br>
                                <div class="form-group">
                                    <label for="exampleInputEmail1">Brand Image</label>
                                    <input type="file" class="form-control-file" name="brand_image" id="exampleInputEmail1" placeholder="Enter Brand Name">
                                    @error('brand_image')
                                    <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>
                                <br>

                                <button type="submit" class="btn btn-primary">Add Brand</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection


