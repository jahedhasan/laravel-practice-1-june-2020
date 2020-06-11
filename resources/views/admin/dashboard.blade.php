
@extends('layouts.app')

@section('title','Dashboard')
@push('css')
 <link rel="stylesheet" href="https://cdn.datatables.net/1.10.21/css/dataTables.bootstrap4.min.css">
@endpush

@section('content')
  <div class="content">
    <div class="container-fluid">
      <div class="row">
        <div class="col-lg-3 col-md-6 col-sm-6">
          <div class="card card-stats">
            <div class="card-header card-header-success card-header-icon">
              <div class="card-icon">
                <i class="material-icons">category</i>
              </div>
              <p class="card-category">Category/Item</p>
              <h3 class="card-title">{{ $categoryCount }}/ {{ $itemCount }}</h3>
            </div>
            <div class="card-footer">
              <div class="stats">
                <i class="material-icons">toc</i><a href="{{ route('category.index') }}">Total Category and Ttems</a>
              </div>
            </div>
          </div>
        </div>
        <div class="col-lg-3 col-md-6 col-sm-6">
          <div class="card card-stats">
            <div class="card-header card-header-success card-header-icon">
              <div class="card-icon">
                <i class="material-icons">slideshow</i>
              </div>
              <p class="card-category">Slider Count</p>
              <h3 class="card-title">{{ $sliderCount }}</h3>
            </div>
            <div class="card-footer">
              <div class="stats">
                <i class="material-icons">read_more</i><a href="{{ route('slider.index') }}">Get More Details.....</a>
              </div>
            </div>
          </div>
        </div>
        <div class="col-lg-3 col-md-6 col-sm-6">
          <div class="card card-stats">
            <div class="card-header card-header-danger card-header-icon">
              <div class="card-icon">
                <i class="material-icons">info_outline</i>
              </div>
              <p class="card-category">Reservation</p>
              <h3 class="card-title">{{ $reservations->count() }}</h3>
            </div>
            <div class="card-footer">
              <div class="stats">
                <i class="material-icons">local_offer</i><span style=" color:red">Not Confirmed Reservation.</span>
              </div>
            </div>
          </div>
        </div>
        <div class="col-lg-3 col-md-6 col-sm-6">
          <div class="card card-stats">
            <div class="card-header card-header-info card-header-icon">
              <div class="card-icon">
                <i class="material-icons">message</i>
              </div>
              <p class="card-category">Contact</p>
              <h3 class="card-title">{{ $contactCount }}</h3>
            </div>
            <div class="card-footer">
              <div class="stats">
                <i class="material-icons">message</i><a href="{{ route('contact.index') }}">More Details</a>
              </div>
            </div>
          </div>
        </div>
      </div>
        <div class="row">
          @include('layouts.partial.msg')
          <div class="col-md-12">
            <div class="card">
              <div class="card-header card-header-primary">
                <h4 class="card-title ">All Reservation</h4>
              </div>
              <div class="card-body">
                <div class="table-responsive">
                  <table id="reservation_table" class="table table-striped" style="width:100%">
                    <thead style="color: #d800ff">
                      <th>ID</th>
                      <th>Name</th>
                      <th>Phone</th>
                      <th>Status</th>
                      <th>Action</th>
                    </thead>
                    <tbody>
                      @foreach($reservations as $key=>$reservation)
                        <tr>
                          <td>{{  $key+1 }}</td>
                          <td>{{  $reservation->name  }}</td>
                          <td>{{  $reservation->phone  }}</td>
                          <th>
                              @if($reservation->status == true)
                                  <span class="badge badge-info">Confirmed</span>
                              @else
                                  <span class="badge badge-danger">Not Confirmed yet</span>
                              @endif
                          </th>
                          <td>
                            @if($reservation->status == false)
                              <form id="status-form-{{ $reservation->id }}" action="{{ route('reservation.status',$reservation->id) }}" style="display: none;" method="POST">
                                  @csrf
                                  @method('PUT')
                              </form>
                              <button type="button" class="btn btn-info btn-sm" onclick="if(confirm('Are you verify this request by phone?')){
                                      event.preventDefault();
                                      document.getElementById('status-form-{{ $reservation->id }}').submit();
                                      }else {
                                      event.preventDefault();
                                      }"><i class="material-icons">done</i></button>
                            @endif
                            <form id="delete-form-{{ $reservation->id }}" action="{{ route('reservation.destroy',$reservation->id) }}" style="display: none;" method="POST">
                                @csrf
                                @method('DELETE')
                            </form>
                            <button type="button" class="btn btn-danger btn-sm" onclick="if(confirm('Are you sure? You want to delete this?')){
                                event.preventDefault();
                                document.getElementById('delete-form-{{ $reservation->id }}').submit();
                            }else {
                                event.preventDefault();
                                    }"><i class="material-icons">cancel</i></button>
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
    $('#reservation_able').DataTable();
    } );
  </script>
@endpush