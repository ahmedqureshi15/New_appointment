<?php

namespace App\Http\Controllers\Api;

use App\ARObject;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\ValidationException;
use App\Http\Controllers\Api\AuthController;
use App\Http\Controllers\Api\ArObjectController;
use Exception;
use App\User;

class UserController extends Controller
{

    /**
     * Create/Register  new user.
     *
     * @param  array $data
     * @return \App\User
     */
    protected function register(Request $request)
    {
        $request->validate([
            'name' => 'required|string',
            'email' => 'required|email|unique:users',
            'password' => 'required|string',
           // 'device_type' => 'required|in:android,ios',
           // 'push_token' => 'required|string',
        ]);

        try {
            $userArray = User::create([
                'name' => $request->name,
                'email' => $request->email,
                'password' => Hash::make($request->password),
               // 'device_type' => $request->device_type,
               // 'push_token' => $request->push_token,
            ]);

            // Making instance of Classes
          //  $arObject = new ArObjectController();
          //  $arUpdatedObject = new ArObjectController();
            $auth = new AuthController();

            // Assigning default objects to user
          //  $arObject->assignAROsToSignedUpUser($userArray);
           // $arUpdatedObject->assignAROsToUpdatedUsers($userArray);


            $response = response()->json(['message' => 'User created successfully.' , 'token' => $auth->login($request)->original], 200);

        }catch (Exception $ex){
            $response = response()->json(['error' => 'Unable to create user.'], 500);
        }

        return $response;
    }
}
