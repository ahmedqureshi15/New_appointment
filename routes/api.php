<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

//Route::middleware('auth:api')->get('/user', function (Request $request) {
//    return $request->user();
//});


Route::group(['prefix' => '/user'], function () {
    Route::post('register', 'UserController@register');

    Route::post('login', 'AuthController@login');
    //Route::post('get-available-appointments', 'AppointmentController@apicall');



  //  Route::get('/records',[UserController::class, 'records']);

//     Route::get('stripe', 'StripePaymentController@stripe');
// Route::post('stripe', 'StripePaymentController@stripePost')->name('stripe.post');

    Route::group(['middleware' => 'auth:api'], function() {
        Route::post('logout', 'AuthController@logout');
        Route::post('refresh', 'AuthController@refresh');
        Route::post('me', 'AuthController@me');
        Route::get('/getUserId', 'AuthController@getUserId');
    });
});

//Route::get('get-available-appointments', 'AppointmentController@apicall');



Route::group(['middleware' => 'auth:api','prefix' => 'aros'], function(){
   Route::get('/', 'ArObjectController@getUserAros');
   Route::post('/share', 'ArObjectController@shareObject');
    Route::get('/{user_ar_object_id}', 'ArObjectController@getUserAro');
// ahmed start
    Route::post('/anchor', 'ArObjectController@anchorObject');
   // Route::post('/meta_text_value', 'ArObjectController@metaTextObject');
  //  Route::post('/model_object', 'ArObjectController@ModelObject');


     Route::post('/meta_text_value', 'ArObjectController@metaTextObject');
     Route::post('/update_xyz_objects', 'ArObjectController@UpdateXYZObjects');

    // Route::put('/branchurl', 'ArObjectController@Update_branchUrl_after_ownership');
    // Route::post('/euler_angles', 'ArObjectController@eulerAnglesObject');
    // Route::post('/mesh_object', 'ArObjectController@meshObject');
});
