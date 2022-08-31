<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\OnBoarding;
use Illuminate\Support\Facades\Auth;
use App\User;

class OnBoardingController extends Controller
{
    public function index()
    {
      //  return view('add-blog-post-form');
        return view('stripe');
    }

    public function store(Request $request)
    {
        $data = new OnBoarding;
       // $authUser = auth()->user();
     //   $data->user_id = $authUser->id;


        $data->program = $request->program;
        $data->is_approved = $request->is_approved;
        $data->is_interview_booked = $request->is_interview_booked;
        $data->alert = $request->alert;
        $data->save();
        return redirect('stripe')->with('status', 'Data Has Been inserted');
    }





}
