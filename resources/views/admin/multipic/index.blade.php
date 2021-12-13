@extends('admin.admin_master')
@section('admin')

    <div class="py-12">
        <div class="container">
            <div class="row">
                <div class="col-lg-8">
                    <h2>Multi Images</h2>
                    <div class="card-group">
                        @foreach($images as $row)
                            <div class="col-md-4 mt-5">
                                <div class="card">
                                    <img src="{{ asset($row->image) }}">
                                </div>
                            </div>
                        @endforeach
                    </div>
                </div>

                <div class="col-lg-4">
                    <div class="card">
                        <div class="card-header">Multi Images</div>
                        <div class="card-body">
                            <form action="{{ route('store.m_image') }}" method="POST" enctype="multipart/form-data">
                                @csrf
                                <div class="form-group">
                                    <label for="exampleInputEmail1">Images</label>
                                    <input type="file" class="form-control-file" name="image[]" id="exampleInputEmail1" multiple>
                                    @error('image')
                                    <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>
                                <br>
                                <button type="submit" class="btn btn-primary">Add Image</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

