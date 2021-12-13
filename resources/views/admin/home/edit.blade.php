@extends('admin.admin_master')
@section('admin')
    <div class="col-lg-12">
        <div class="card card-default">
            <div class="card-header card-header-border-bottom">
                <h2>Create Slider</h2>
            </div>
            <div class="card-body">
                <form action="{{ route('update.about',$about->id) }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="form-group">
                        <label for="exampleFormControlInput1">About Title</label>
                        <input type="text" class="form-control" name="title" id="exampleFormControlInput1" value="{{ $about->title }}">
                        @error('title')
                        <span class="text-danger">{{ $message }}</span>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label for="exampleFormControlTextarea1">About Short Description</label>
                        <textarea class="form-control" name="short_des" id="exampleFormControlTextarea1" rows="3">{{ $about->short_des }}</textarea>
                        @error('short_des')
                        <span class="text-danger">{{ $message }}</span>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label for="exampleFormControlTextarea1">About Long Description</label>
                        <textarea class="form-control" name="long_des" id="exampleFormControlTextarea1" rows="3">{{ $about->long_des }}</textarea>
                        @error('long_des')
                        <span class="text-danger">{{ $message }}</span>
                        @enderror
                    </div>
                    <div class="form-footer pt-4 pt-5 mt-4 border-top text-center">
                        <button type="submit" class="btn btn-success btn-default">Submit</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection


