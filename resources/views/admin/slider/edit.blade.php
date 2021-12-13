@extends('admin.admin_master')
@section('admin')
    <div class="col-lg-12">
        <div class="card card-default">
            <div class="card-header card-header-border-bottom">
                <h2>Create Slider</h2>
            </div>
            <div class="card-body">
                <form action="{{ route('update.slider',$sliders->id) }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <input type="hidden"  name="old_image" value="{{ $sliders->image }}">
                    <div class="form-group">
                        <label for="exampleFormControlInput1">Slider Title</label>
                        <input type="text" class="form-control" name="title" id="exampleFormControlInput1" value="{{ $sliders->title }}">
                        @error('title')
                        <span class="text-danger">{{ $message }}</span>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label for="exampleFormControlTextarea1">Slider Description</label>
                        <textarea class="form-control" name="description" id="exampleFormControlTextarea1" rows="3">{{ $sliders->description }}</textarea>
                        @error('description')
                        <span class="text-danger">{{ $message }}</span>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label for="exampleFormControlFile1">Slider Image</label>
                        <input type="file" name="image" class="form-control-file" id="exampleFormControlFile1" value="{{ $sliders->image }}">
                        @error('image')
                        <span class="text-danger">{{ $message }}</span>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label for="exampleInputEmail1">Previous Image</label><br>
                        <img src="{{ asset($sliders->image) }}" style="height: 300px">
                    </div>
                    <div class="form-footer pt-4 pt-5 mt-4 border-top text-center">
                        <button type="submit" class="btn btn-success btn-default">Submit</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection


