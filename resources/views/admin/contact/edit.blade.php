@extends('admin.admin_master')
@section('admin')
    <div class="col-lg-12">
        <div class="card card-default">
            <div class="card-header card-header-border-bottom">
                <h2>Create Contact Info</h2>
            </div>
            <div class="card-body">
                <form action="{{ route('update.contact',$cont->id) }}" method="POST">
                    @csrf
                    <div class="form-group">
                        <label for="exampleFormControlInput1">Contact Address</label>
                        <textarea class="form-control" name="address" id="exampleFormControlTextarea1" rows="3">{{ $cont->address }}</textarea>
                        @error('title')
                        <span class="text-danger">{{ $message }}</span>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label for="exampleFormControlTextarea1">Contact Email</label>
                        <input type="email" class="form-control" name="email" id="exampleFormControlInput1" value="{{ $cont->email }}">
                        @error('short_des')
                        <span class="text-danger">{{ $message }}</span>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label for="exampleFormControlTextarea1">Contact Phone</label>
                        <input type="text" class="form-control" name="phone" id="exampleFormControlInput1" value="{{ $cont->phone }}">
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
