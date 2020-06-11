<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Notifications\ReservationConfirm;
use App\Reservation;
use Brian2694\Toastr\Facades\Toastr;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Notification;

class ReservationController extends Controller
{
    public function index()
    {
      $reservations = Reservation::all();
      return view('admin.reservation.index' , compact('reservations'));
    }

    public function status($id)
    {

      $reservation = Reservation::find($id);
      $reservation->status = true;
      $reservation->save();
      Notification::route('mail', $reservation->email)
        ->notify(new ReservationConfirm());

      Toastr::success('Reservation successfully confirmed.','Success',["positionClass" => "toast-top-right"]);

      return redirect()->back();
    }

    public function destroy($id)
    {
      $reservation = Reservation::find($id);
      $reservation->delete();

      Toastr::success('Reservation successfully deleted.','Success',["positionClass" => "toast-top-right"]);
      return redirect()->back();

    }
}
