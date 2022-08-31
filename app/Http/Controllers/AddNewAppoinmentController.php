<?php

namespace App\Http\Controllers;
use App\AddAppointment;

use Illuminate\Http\Request;

class AddNewAppoinmentController extends Controller
{
    public function index()
    {
      //  return view('add-blog-post-form');
        return view('users.index');
    }

    public function storeform(Request $request)
    {
        $data = new AddAppointment;

        $data->location_id = $request->locationId;
        $data->email = $request->email;
        $data->phone_number = $request->ph_number;
        $data->date_of_appoinment = $request->date_of_appoinment;
        $data->save();
        return redirect('users')->with('status', 'Data Has Been inserted');
    }


}
