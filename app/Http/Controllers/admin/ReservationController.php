<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Reservation;
use Brian2694\Toastr\Facades\Toastr;
use Illuminate\Http\Request;

class ReservationController extends Controller
{
    public function index()
    {
      $reservations = Reservation::all();
      return view('admin.reservation.index' , compact('reservations'));
    }

    public function status($id)
    {

      $reservations = Reservation::find($id);
      $reservations->status = true;
      $reservations->save();

      Toastr::success('Reservation successfully confirmed.','Success',["positionClass" => "toast-top-right"]);

      return redirect()->back();
    }

    public function destroy($id)
    {
      $reservations = Reservation::find($id);
      $reservations->delete();

      Toastr::success('Reservation successfully deleted.','Success',["positionClass" => "toast-top-right"]);
      return redirect()->back();

    }
}
