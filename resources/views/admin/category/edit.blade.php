@extends('layouts.app')

@section('title','edit')
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
                <h4 class="card-title ">Edit Category</h4>
              </div>
              <div class="card-body">
                <div class="card-content">
                  <form method="POST" action="{{ route('category.update', $category->id) }}" >
                      @csrf
                      @method('PUT')

                      <div class="row">
                          <div class="col-md-12">
                              <div class="form-group label-floating">
                                  <label class="control-label">Name</label>
                                  <input type="text" class="form-control" value="{{ $category->name }}" name="name">
                              </div>
                          </div>
                      </div>
                      
                      <a href="{{ route('category.index') }}" class="btn btn-danger">Back</a>
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
