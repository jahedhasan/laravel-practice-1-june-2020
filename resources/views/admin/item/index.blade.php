@extends('layouts.app')

@section('title','Item')
@push('css')
  <link rel="stylesheet" href="https://cdn.datatables.net/1.10.21/css/dataTables.bootstrap4.min.css">
@endpush

@section('content')
    <div class="content">
      <div class="container-fluid">
        <div class="row">

            <a href="{{ route('item.create') }}" class="btn btn-info">Add New</a>

            @include('layouts.partial.msg')

          <div class="col-md-12">
            <div class="card">
              <div class="card-header card-header-primary">
                <h4 class="card-title ">All Item</h4>
              </div>
              <div class="card-body">
                <div class="table-responsive">
                  <table id="item_table" class="table table-striped" style="width:100%">
                    <thead style="color: #d800ff">
                      <th>ID</th>
                      <th>Name</th>
                      <th>Image</th>
                      <th>Category</th>
                      <th>Price</th>
                      <th>Description</th>
                      <th>Created At</th>
                      <th>Updated At</th>
                      <th>Action</th>
                    </thead>
                    <tbody>
                      @foreach($items as $key=>$item)
                        <tr>
                          <td>{{  $key+1 }}</td>
                          <td>{{  $item->name  }}</td>
                          <td>
                              <img class="img-responsive img-thumbnail" src="{{ asset('uploads/item/'.$item->image) }}" style="height: 70px;width: 140px;">
                          </td>
                          <td>{{  $item->category->name  }}</td>
                          <td>{{  $item->price }}</td>
                          <td>{{  $item->description }}</td>
                          <td>{{  $item->created_at  }}</td>
                          <td>{{  $item->updated_at  }}</td>
                          <td><a href="{{ route('item.edit', $item->id) }}" class="btn btn-info btn-sm">Edit</a></td>
                          <td>
                            <form id="delete-form-{{ $item->id }}" action="{{ route('item.destroy',$item->id) }}" style="display: none;" method="POST">
                                  @csrf
                                  @method('DELETE')
                              </form>
                              <button type="button" class="btn btn-danger btn-sm" onclick="if(confirm('Are you sure? You want to delete this?')){
                                  event.preventDefault();
                                  document.getElementById('delete-form-{{ $item->id }}').submit();
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
    $('#item_table').DataTable();
    } );
  </script>
@endpush
