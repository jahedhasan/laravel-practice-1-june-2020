@extends('layouts.app')

@section('title','category')
@push('css')
  <link rel="stylesheet" href=" https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.1.3/css/bootstrap.css">
  <link rel="stylesheet" href="https://cdn.datatables.net/1.10.21/css/dataTables.bootstrap4.min.css">
@endpush

@section('content')
    <div class="content">
      <div class="container-fluid">
        <div class="row">

            <a href="{{ route('category.create') }}" class="btn btn-info">Add New</a>

            @include('layouts.partial.msg')

          <div class="col-md-12">
            <div class="card">
              <div class="card-header card-header-primary">
                <h4 class="card-title ">All Category</h4>
              </div>
              <div class="card-body">
                <div class="table-responsive">
                  <table id="slide_table" class="table table-striped" style="width:100%">
                    <thead style="color: #d800ff">
                      <th>ID</th>
                      <th>Name</th>
                      <th>Slug</th>
                      <th>Created At</th>
                      <th>Updated At</th>
                      <th>Action</th>
                    </thead>
                    <tbody>
                      @foreach($categorys as $key=>$category)
                        <tr>
                          <td>{{  $key+1 }}</td>
                          <td>{{  $category->name  }}</td>
                          <td>{{  $category->slug  }}</td>
                          <td>{{  $category->created_at  }}</td>
                          <td>{{  $category->updated_at  }}</td>
                          <td><a href="{{ route('category.edit', $category->id) }}" class="btn btn-info btn-sm">Edit</a></td>
                          <td>
                            <form id="delete-form-{{ $category->id }}" action="{{ route('category.destroy',$category->id) }}" style="display: none;" method="POST">
                                  @csrf
                                  @method('DELETE')
                              </form>
                              <button type="button" class="btn btn-danger btn-sm" onclick="if(confirm('Are you sure? You want to delete this?')){
                                  event.preventDefault();
                                  document.getElementById('delete-form-{{ $category->id }}').submit();
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
  <script src="https://code.jquery.com/jquery-3.5.1.js"></script>
  <script  src="https://cdn.datatables.net/1.10.21/js/jquery.dataTables.min.js"></script>
  <script  src="https://cdn.datatables.net/1.10.21/js/dataTables.bootstrap4.min.js"></script>
  <script>
    $(document).ready(function() {
    $('#slide_table').DataTable();
    } );
  </script>
@endpush
