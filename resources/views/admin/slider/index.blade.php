@extends('layouts.app')

@section('title','Slider')
@push('css')
  <link rel="stylesheet" href="https://cdn.datatables.net/1.10.21/css/dataTables.bootstrap4.min.css">
@endpush

@section('content')
    <div class="content">
      <div class="container-fluid">
        <div class="row">

            <a href="{{ route('slider.create') }}" class="btn btn-info">Add New</a>

            @include('layouts.partial.msg')

          <div class="col-md-12">
            <div class="card">
              <div class="card-header card-header-primary">
                <h4 class="card-title ">All Slider</h4>
              </div>
              <div class="card-body">
                <div class="table-responsive">
                  <table id="slide_table" class="table table-striped" style="width:100%">
                    <thead style="color: #d800ff">
                      <th>ID</th>
                      <th>Title</th>
                      <th>Sub Title</th>
                      <th>Image</th>
                      <th>Created At</th>
                      <th>Updated At</th>
                      <th>Action</th>
                    </thead>
                    <tbody>
                      @foreach($sliders as $key=>$slider)
                        <tr>
                          <td>{{  $key+1 }}</td>
                          <td>{{  $slider->title  }}</td>
                          <td>{{  $slider->sub_title  }}</td>
                          <td>{{  $slider->image  }}</td>
                          <td>{{  $slider->created_at  }}</td>
                          <td>{{  $slider->updated_at  }}</td>
                          <td><a href="{{ route('slider.edit', $slider->id) }}" class="btn btn-info btn-sm">Edit</a></td>
                          <td>
                            <form id="delete-form-{{ $slider->id }}" action="{{ route('slider.destroy',$slider->id) }}" style="display: none;" method="POST">
                                  @csrf
                                  @method('DELETE')
                              </form>
                              <button type="button" class="btn btn-danger btn-sm" onclick="if(confirm('Are you sure? You want to delete this?')){
                                  event.preventDefault();
                                  document.getElementById('delete-form-{{ $slider->id }}').submit();
                              }else {
                                  event.preventDefault();
                                      }">Delete</button>
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
    </div>
@endsection

@push('scripts')
  <script  src="https://cdn.datatables.net/1.10.21/js/jquery.dataTables.min.js"></script>
  <script  src="https://cdn.datatables.net/1.10.21/js/dataTables.bootstrap4.min.js"></script>
  <script>
    $(document).ready(function() {
    $('#slide_table').DataTable();
    } );
  </script>
@endpush
