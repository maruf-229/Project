@extends('admin.admin_master')
@section('admin')

    <div class="py-12">
        <div class="container">
            <div class="row">
                <div class="col-md-6">
                    <div class="card">
                        <div class="card-header">Edit Brand</div>
                        <div class="card-body">
                            <form action="{{ route('update.brand',$brands->id) }}" method="POST" enctype="multipart/form-data">
                                @csrf
                                <input type="hidden"  name="old_image" value="{{ $brands->brand_image }}">
                                <div class="form-group">
                                    <label for="exampleInputEmail1">Update Brand Name</label>
                                    <input type="text" class="form-control" name="brand_name" id="exampleInputEmail1" value="{{ $brands->brand_name }}">
                                    @error('brand_name')
                                    <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div><br>
                                <div class="form-group">
                                    <label for="exampleInputEmail1">Update Brand Image</label>
                                    <input type="file" class="form-control" name="brand_image" id="exampleInputEmail1" value="{{ $brands->brand_image }}">
                                    @error('brand_image')
                                    <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div><br>
                                <div class="form-group">
                                    <label for="exampleInputEmail1">Previous Image</label><br>
                                    <img src="{{ asset($brands->brand_image) }}" style="height: 200px">
                                </div><br>

                                <button type="submit" class="btn btn-primary">Update Brand</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

