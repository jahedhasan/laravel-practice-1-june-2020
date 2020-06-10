@extends('layouts.app')

@section('title','Edit')
@push('css')
@endpush

@section('content')
    <div class="content">
      <div class="container-fluid">
        <div class="row">
          <div class="col-md-12">
            <div class="card">
              <div style="margin-bottom: 20px;">
                @include('layouts.partial.msg')
              </div>

              <div class="card-header card-header-primary">
                <h4 class="card-title ">Edit Slider</h4>
              </div>
              <div class="card-body">
                <div class="card-content">
                  <form method="POST" action="{{ route('slider.update', $slider->id) }}" enctype="multipart/form-data">
                      @csrf
                      @method('PUT')

                      <div class="row">
                          <div class="col-md-12">
                              <div class="form-group label-floating">
                                  <label class="control-label">Title</label>
                                  <input type="text" class="form-control" value="{{ $slider->title }}" name="title">
                              </div>
                          </div>
                      </div>
                      <div class="row">
                          <div class="col-md-12">
                              <div class="form-group label-floating">
                                  <label class="control-label">Sub Title</label>
                                  <input type="text" class="form-control" value="{{ $slider->sub_title }}" name="sub_title">
                              </div>
                          </div>
                      </div>
                      <div class="row">
                          <div class="col-md-12">
                              <label class="control-label">Image</label>
                              <input type="file" name="image">
                          </div>
                      </div>
                      <a href="{{ route('slider.index') }}" class="btn btn-danger">Back</a>
                      <button type="submit" class="btn btn-primary">Save</button>
                  </form>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
@endsection

@push('scripts')
@endpush
