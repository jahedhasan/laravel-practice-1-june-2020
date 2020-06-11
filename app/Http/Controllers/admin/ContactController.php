<?php

namespace App\Http\Controllers\admin;

use App\Contact;
use App\Http\Controllers\Controller;
use Brian2694\Toastr\Facades\Toastr;
use Illuminate\Http\Request;

class ContactController extends Controller
{
    public function index()
    {
      $contacts = Contact::all();

      return view('admin.contact.index', compact('contacts'));
    }

    public function details($id)
    {
      $contact = Contact::find($id);
      return view('admin.contact.details', compact('contact'));
    }

    public function delete($id)
    {
      Contact::find($id)->delete();

      Toastr::success('Contact Message successfully deleted','Success',["positionClass" => "toast-top-right"]);

      return redirect()->back();
      
    }
}
