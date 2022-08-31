<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Exception;
use App\User;
use App\ArObject;
use App\UserArUpdatedObject;
use App\UserArObject;
use App\UserObjectsData;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;
use Carbon\Carbon;
use Illuminate\Support\Facades\Auth;
use App\user_push_token;



class ArObjectController extends Controller
{
    const branch_key = 'key_test_fmS2we9V3KJQh3FEyU6pSmgfssiau9VZ';
    const branch_url = 'https://api.branch.io/v1/url';

 //   const abc = 'https://api2.branch.io/v1/url?url=https%3A%2F%2Faroms.test-app.link/1yoaj4nGfjb';


    /**
     * Assigns AROs to newly registered user.
     *
     * @param  array $data
     * @return \App\User
     */
    public function assignAROsToSignedUpUser($userArray)
    {
        $arObjectsArray = [];
       // $arObjects = ArObject::get();
//echo 1;
       $arObjects = UserObjectsData::select('ar_objects_for_all.*')
          // ->join('user_ar_objects', function($join){
          
          //     $join->on('user_ar_objects.ar_object_id', '=', 'ar_objects_for_all.id');
          //  })
         // ->where([['user_ar_objects.user_id', $userArray['id']], ])
          ->from('ar_objects_for_all')->limit(5)->inRandomOrder()->get();

        //$UserObjectsData = UserObjectsData::get();
       // echo "arObjects--->".$arObjects;

        try {
           // echo "testssing2";
          // echo 2;
         //   echo "arobject".$arObjects;
            foreach ($arObjects as $arObject) {

               // echo "3";

                $userARObjectKey = $userArray['id'] . "_" . $arObject->id . "_" . $this->generateUUID();
              
                // echo "userARObjectKey---->".$userARObjectKey;
                // echo '\n name--->'.$arObject->Name;
                // echo 'Android--->'.$arObject->Android;
                // echo 'IOS--->'.$arObject->IOS;
                // echo 'Image--->'.$arObject->Images;

        


                 $dataForDL = array(
                //     // 'name'  =>  $arObject->object['name'],
                //     // 'description'  =>  $arObject->object['model']['meta']['text']['value'],
                //     // 'image_url'  =>  $arObject->object['image'],
                //     // 'user_ar_object_key'  =>  $userARObjectKey,


                    'name'  =>  $arObject->Name,
                    'description'  =>  'Hello World',
                    'image_url'  => $arObject->Images,
                    'user_ar_object_key'  =>  $userARObjectKey,
                );

                // generating deep link
    //  echo '4';

                $deepLink = $this->generateDeepLink($dataForDL);
               // echo "deepLink-->".$deepLink;

                $arObjectsArray[] = [
                     'user_id' => $userArray['id'],
                     'ar_object_id' => $arObject->id,
                     'branch_url' => $deepLink,
                     'user_ar_object_key' => $userARObjectKey



                    // 'user_id' => '1',
                    // 'ar_object_id' => 'abc',
                    // 'branch_url' => 'abc',
                    // 'user_ar_object_key' => 'abc'
                ];

             //  echo "5";
            }

            UserArObject::insert($arObjectsArray);
          //  echo 6;
            $response = response()->json(['message' => 'Ar Objects assigned successfully to user.'], 200);

        } catch (Exception $ex) {
            $response = response()->json(['error' => 'Unable to assign ar objects to user.'], 500);
          //  echo 7;
        }

        return $response;
    }




/**
     * Insert Aros objects to updated table.
     *
     * @param  array $data
     * @return \App\User
     */
    public function assignAROsToUpdatedUsers($userArray)
    {
       // $userObj = auth()->user()->id;
       // echo 'userObj----->'.$userObj;
     //  echo 'array----->'.$userArray['id'];
        $arObjectsArray = [];
   

          // $arObjects = ArObject::select('ar_objects.*', 'user_ar_objects.branch_url')
          // ->join('user_ar_objects', function($join){
          
          //     $join->on('user_ar_objects.ar_object_id', '=', 'ar_objects.id');
          //  })->where([
          //     ['user_ar_objects.user_id', $userArray['id']],
          
          // ])->from('ar_objects')->get();


          $arObjects = UserObjectsData::select('ar_objects_for_all.*', 'user_ar_objects.user_id','user_ar_objects.branch_url')
           ->join('user_ar_objects', function($join){
          
               $join->on('user_ar_objects.ar_object_id', '=', 'ar_objects_for_all.id');
            })
          ->where([['user_ar_objects.user_id', $userArray['id']], ])
          ->from('ar_objects_for_all')->get();

         



        //echo "UserObjectsData---->".$arObjects;

       // die();
        try {
          //  echo "aaa---";
       
            foreach ($arObjects as $arObject) {
               
               // $arObject->object = unserialize($arObject->object);

             //   foreach($branchUrlQueryWhere as $bb){



                $arObjectsArray[] = [
                    'user_id' => $userArray['id'],
                    'branch_url' => $arObject->branch_url,
                    
                    'object_id' => $arObject->id,
                 
                    'name' =>  $arObject->Name,

                    'image' =>  $arObject->Images,

                    'file_ios' => $arObject->IOS ,

                    'file_and' => $arObject->Android,

                //    'file' =>  $arObject->object['model']['file'],

                  'textValue'=>  'Hello World!',
                 

                  'scaleX'=>  '1.0',
                  'scaleY'=>  '1.0',
                  'scaleZ'=>  '1.0',

                  'posX'=> '1.0',
                  'posY'=>  '1.0',
                  'posZ'=>  '1.0',

                  'rotX'=>  '1.0',
                  'rotY'=>  '1.0',
                  'rotZ'=>  '1.0',

                  'meshX'=>  '1.0',
                  'meshY'=> '1.0',
                  'meshZ'=>  '1.0',

                  'lat'=> '0.333',
                  'lng'=>  '0.333',


                  'identifier_name'=>  'identifiername',
                  'identifier'=>  'identifier',
                   'dateCreated'=>  \Carbon\Carbon::now()->format('Y-m-d h:i:s'),
                  'dateExpired'=>  \Carbon\Carbon::now()->format('Y-m-d h:i:s')



                ];
          //  }

        }
           //  echo 'insert';
            UserArUpdatedObject::insert($arObjectsArray);
            
            $response = response()->json(['message' => 'Ar Objects assigned successfully to user.'], 200);

      //  } 
        
    }catch (Exception $ex) {
            $response = response()->json(['error' => 'Unable to assign ar objects to user.'], 500);
        }

        return $response;
    }

/**
     * Update metaTextObject
     * @param array objectDetails
     * @return string
     */
    public function metaTextObject(Request $request)
    {
    
   
        $object_id = $request->object_id;
        $text = $request->value;
        $user_id =  $request->user_id ;
       if(UserArUpdatedObject::select('uaros.*')
       ->where('uaros.object_id', $object_id)
     //  ->where('uaros.user_id', auth()->user()->id)
       ->from('user_ar_updated_objects as uaros')
       ->first()) 
{
    UserArUpdatedObject::where('object_id',$object_id)->where('user_id',$user_id)->update(
        ['textValue' => $text]);  
  
      $response = response()->json(['message' => 'Success.'], 200);

}
   else{
    $response = response()->json(['message' => 'Object id not found.'], 200);

   }
 
       return $response;
      //  die();
      
    }



    /**
     * Update XYZObjects
     * @param array objectDetails
     * @return string
     */
    public function UpdateXYZObjects(Request $request)
    {
      




        $object_id = $request->object_id;
     
       $user_id =  $request->user_id ;
         //localScale
       $scaleX = $request->scaleX;
       $scaleY = $request->scaleY;
       $scaleZ = $request->scaleZ;
     

    //   position
       $posX = $request->posX;
       $posY = $request->posY;
       $posZ = $request->posZ;

       //euler angles
       $rotX = $request->rotX;
       $rotY = $request->rotY;
       $rotZ = $request->rotZ;

       //meshsize
       $meshX = $request->meshX;
       $meshY = $request->meshY;
       $meshZ = $request->meshZ;

       //location
       $lat = $request->lat;
       $lng = $request->lng;
        
        if(UserArUpdatedObject::select('uaros.*')
        ->where('uaros.object_id', $object_id)
      //  ->where('uaros.user_id', auth()->user()->id)
        ->from('user_ar_updated_objects as uaros')
        ->first())

{
    // if($request->filled('scaleX') || $request->filled('scaleY') || $request->filled('scaleZ') 
    // || $request->filled('posX') || $request->filled('posY') || $request->filled('posZ') 
    // // || $request->filled('meshX') || $request->filled('meshY') || $request->filled('meshZ')
    // // || $request->filled('lat') || $request->filled('lng')
    // )

    // All posted data except token and id
$data = $request->all();

// Remove empty array values from the data
$result = array_filter($data);

// update record
//DB::table($table)->where('id', $arr)->update($result);
    

    UserArUpdatedObject::where('object_id',$object_id)->where('user_id',$user_id)->update($result);
     //   [
    //         'scaleX' =>  $request->scaleX,
    // 'scaleY' =>  $request->scaleY,
    // 'scaleZ' =>  $request->scaleZ,

    // 'posX' =>  $request->posX,
    // 'posY' =>  $request->posY,
    // 'posZ' =>  $request->posZ,

    // 'rotX' =>  $request->rotX,
    // 'rotY' =>  $request->rotY,
    // 'rotZ' =>  $request->rotZ,

    // 'meshX' =>  $request->meshX,
    // 'meshY' =>  $request->meshY,
    // 'meshZ' =>  $request->meshZ,

//     'lat' =>  $request->lat,
//     'lng' =>  $request->lng,
   
//    ]);


  
 $response = response()->json(['message' => 'Success.'], 200);
}


        
        else{

            $response = response()->json(['message' => 'Object id not found.'], 200);
        }

       return $response;
      //  die();
      
    
    }



 /**
     * Update anchors
     * @param array objectDetails
     * @return string
     */
    public function anchorObject(Request $request)
    {

        $object_id = $request->object_id;
        $user_id =  $request->user_id ;

        $name = $request->name;
        $identifier = $request->identifier;
        $dateCreated = $request->dateCreated;
        $dateExpired = $request->dateExpired;
        
        if(UserArUpdatedObject::select('uaros.*')
        ->where('uaros.object_id', $object_id)
      //  ->where('uaros.user_id', auth()->user()->id)
        ->from('user_ar_updated_objects as uaros')
        ->first())

        {

            UserArUpdatedObject::where('object_id',$object_id)->where('user_id',$user_id)->update(
                ['identifier_name' => $name,
                    'identifier' => $identifier,
                'dateCreated' => $dateCreated,
                'dateExpired' => $dateExpired ]);
    
         $response = response()->json(['message' => 'Success.'], 200);

        }

        else{
            $response = response()->json(['message' => 'Object id not found.'], 200);

        }
      
       return $response;
    
    }


    /**
     * Get available AROs of user.
     *
     * @return array $arObjects
     */
    public function getUserAros()
    {
        //$arObjectsArray = [];
        $data = [];

        try {
        // $user = Auth::user();
           $userObj = auth()->user()->id;

//echo 'id--->'.$userObj;
      

        // $arAllObjects = UserArUpdatedObject::select('user_ar_updated_objects.*', 
        // 'user_ar_objects.ar_object_id','user_ar_objects.user_ar_object_key',
        // 'user_ar_objects.share_status', 'user_ar_objects.old_user_id', 'user_ar_objects.created_at','user_ar_objects.updated_at')
        // ->join('user_ar_objects', function($join){
        //     $join->on('user_ar_updated_objects.user_id', '=', 'user_ar_objects.user_id');
        //     $join->on('user_ar_updated_objects.object_id', '=', 'user_ar_objects.ar_object_id');
        //  })->where([
        //     ['user_ar_updated_objects.user_id', '=', $userObj],
        //     ['user_ar_objects.share_status', UserArObject::STATUS_NOT_SHARED],
        // ])->from('user_ar_updated_objects')->get();


             $arAllObjects = UserArObject::select('user_ar_updated_objects.*', 
             'user_ar_objects.ar_object_id',
             'user_ar_objects.user_ar_object_key',
            'user_ar_objects.share_status',
             'user_ar_objects.old_user_id', 
             'user_ar_objects.created_at',
             'user_ar_objects.updated_at')
            ->join('user_ar_updated_objects', function($join){
                $join->on('user_ar_updated_objects.user_id', '=', 'user_ar_objects.user_id');
                $join->on('user_ar_updated_objects.object_id', '=', 'user_ar_objects.ar_object_id');
             
             })
            ->where([
                     ['user_ar_objects.user_id', '=', $userObj],
                    
                     ['user_ar_objects.share_status', UserArObject::STATUS_NOT_SHARED],
                    // ['user_ar_updated_objects.object_id','=','user_ar_objects.ar_object_id']
                 ])
                 ->from('user_ar_objects')->groupBy('user_ar_objects.id')->get();

      // echo 't';



           //  echo "arAllObjects---8989>".$arAllObjects;

           

            if ($arAllObjects->isEmpty()) {
               // echo 'isEmpty';
                // Reassigning objects to user
                $isAssigned = $this->assignAROsToSignedUpUser(['id' => auth()->user()->id]);
                $isAssignedUpdated = $this->assignAROsToUpdatedUsers(['id' => auth()->user()->id]);
                
              //  echo ' --$isAssigned--->'. $isAssigned->original['message'];
              //  echo ' --$isAssignedUpdated--->'. $isAssigned->original['message'];
           

              //   $arAllObjectsreAssign = UserArObject::select('user_ar_objects.*')
             
              //  ->where([
              //           ['user_ar_objects.user_id', '=', $userObj],
                       
              //           ['user_ar_objects.share_status', UserArObject::STATUS_NOT_SHARED],
              //          // ['user_ar_updated_objects.object_id','=','user_ar_objects.ar_object_id']
              //       ])
              //       ->from('user_ar_objects')->groupBy('user_ar_objects.id')->get();

                    $arAllObjectsreAssign = UserArObject::select('user_ar_updated_objects.*', 
                    'user_ar_objects.ar_object_id',
                    'user_ar_objects.user_ar_object_key',
                   'user_ar_objects.share_status',
                    'user_ar_objects.old_user_id', 
                    'user_ar_objects.created_at',
                    'user_ar_objects.updated_at')
                   ->join('user_ar_updated_objects', function($join){
                       $join->on('user_ar_updated_objects.user_id', '=', 'user_ar_objects.user_id');
                       $join->on('user_ar_updated_objects.object_id', '=', 'user_ar_objects.ar_object_id');
                    
                    })
                   ->where([
                            ['user_ar_objects.user_id', '=', $userObj],
                           
                            ['user_ar_objects.share_status', UserArObject::STATUS_NOT_SHARED],
                           // ['user_ar_updated_objects.object_id','=','user_ar_objects.ar_object_id']
                        ])
                        ->from('user_ar_objects')->groupBy('user_ar_objects.id')->get();



                   // echo "arAllObjectsReAssign--->".$arAllObjectsreAssign;
                foreach ($arAllObjectsreAssign as $arObjects) {
                 
                  $data[] = ["id"=> $arObjects->id,
               //    "hello world" => "hello world" , 
                  "user_id"=> $arObjects->user_id,
                  "branch_url" => $arObjects->branch_url,
                  "object_id"=> $arObjects->ar_object_id,
                   "user_ar_object_key"=> $arObjects->user_ar_object_key,
                   "share_status"=> $arObjects->share_status,
                   "old_user_id"=> $arObjects->old_user_id,
                   "created_at"=> $arObjects->created_at,
                   "updated_at"=> $arObjects->updated_at,
   
                  
                   "object"=> [
                       "name" => $arObjects->name,
                       "image" =>  $arObjects->image,
                       "model" => [
                       "file_and"=>  $arObjects->file_and,
                       "file_ios"=>  $arObjects->file_ios,
                       "meta"=> [
                        "text"=>[
                           "value"=>$arObjects->textValue,
                        ],
                       
                       "localScale"=>[
                           "scaleX"=> $arObjects->scaleX,
                           "scaleY"=> $arObjects->scaleY,
                           "scaleZ"=> $arObjects->scaleZ,
                       ],
                   "position"=>[
                      "posX"=> $arObjects->posX,
                      "posY"=> $arObjects->posY,
                      "posZ"=> $arObjects->posZ,
                   ] ,
                   "eulerAngles"=> [
                      "rotX"=> $arObjects->rotX,
                      "rotY"=> $arObjects->rotY,
                      "rotZ"=> $arObjects->rotZ,
                   ],
                   "meshsize"=> [
                      "meshX"=> $arObjects->meshX,
                      "meshY"=> $arObjects->meshY,
                      "meshZ"=> $arObjects->meshZ,
                   ],
                   ],
                   "location"=>[
                      "lat"=> $arObjects->lat,
                      "lng"=> $arObjects->lng,
                      
                   ] ,
                       ],
                      "anchors"=>[
                          "dateCreated"=> $arObjects->dateCreated,
                          "dateExpired"=> $arObjects->dateExpired,
                          "identifier"=> $arObjects->identifier,
                          "identifier_name" => $arObjects->identifier_name,
                      ],
                  ],
                  ];
  

               }
                

                // if(!empty($isAssigned->original['message'])){
                //     echo '!empty';
                //     return $this->getUserAros();
                //   // die();
                    
                // }
             
                  
               $response = response()->json(['message' => 'Success.',  'aros' => $data], 200);

               
            }
            else {

             //  echo  'else2';
           
              
              //  echo "size--->".count($arAllObjects);
                foreach ($arAllObjects as $arObjects) {



              //  echo "Name-->".$arObjects->name;

                $data[] = ["id"=> $arObjects->id,
                // "hello world1" => "hello world1" , 
                "user_id"=> $arObjects->user_id,
                "branch_url" => $arObjects->branch_url,
                "object_id"=> $arObjects->ar_object_id,
                 "user_ar_object_key"=> $arObjects->user_ar_object_key,
                 "share_status"=> $arObjects->share_status,
                 "old_user_id"=> $arObjects->old_user_id,
                 "created_at"=> $arObjects->created_at,
                 "updated_at"=> $arObjects->updated_at,
 
                
                 "object"=> [
                     "name" => $arObjects->name,
                     "image" =>  $arObjects->image,
                     "model" => [
                      "file_and"=>  $arObjects->file_and,
                      "file_ios"=>  $arObjects->file_ios,
                     "meta"=> [
                      "text"=>[
                         "value"=>$arObjects->textValue,
                      ],
                     
                     "localScale"=>[
                         "scaleX"=> $arObjects->scaleX,
                         "scaleY"=> $arObjects->scaleY,
                         "scaleZ"=> $arObjects->scaleZ,
                     ],
                 "position"=>[
                    "posX"=> $arObjects->posX,
                    "posY"=> $arObjects->posY,
                    "posZ"=> $arObjects->posZ,
                 ] ,
                 "eulerAngles"=> [
                    "rotX"=> $arObjects->rotX,
                    "rotY"=> $arObjects->rotY,
                    "rotZ"=> $arObjects->rotZ,
                 ],
                 "meshsize"=> [
                    "meshX"=> $arObjects->meshX,
                    "meshY"=> $arObjects->meshY,
                    "meshZ"=> $arObjects->meshZ,
                 ],
                 ],
                 "location"=>[
                    "lat"=> $arObjects->lat,
                    "lng"=> $arObjects->lng,
                    
                 ] ,
                     ],
                    "anchors"=>[
                        "dateCreated"=> $arObjects->dateCreated,
                        "dateExpired"=> $arObjects->dateExpired,
                        "identifier"=> $arObjects->identifier,
                        "identifier_name" => $arObjects->identifier_name,
                    ],
                ],
                ];

                   }
                 

                   $response = response()->json(['message' => 'Success.',  'aros' => $data], 200);

                }
           


        } 
        catch (Exception $ex) {
            $response = response()->json(['error' => 'Unable to fetch aros associated to user.'], 500);
        }

       return $response;
    }

    //ahmed
    /**
     * Get Ar object of user by Ar user object id.
     *
     * @return array $arObjects
     */
    public function getUserAro($userAroId)


    {
       // $user_ar_object_keys = [];
       // echo 'sss';
        try {
        
            $userObj = auth()->user()->id;

            $arObject_arkeys = UserArObject::select('aros.user_ar_object_key')
             
               ->where('aros.ar_object_id', $userAroId)
             ->where('aros.user_id', $userObj)
           
               ->from('user_ar_objects as aros')
               
               ->first();

             
              // echo 'arObject_arkeys-->'.$arObject_arkeys;

            //   die();


    $arObject = UserArUpdatedObject::select('updatedaros.*',
    'aros.user_ar_object_key','aros.share_status' , 'aros.old_user_id',
    'aros.created_at', 'aros.updated_at')
       ->join('user_ar_objects as aros', 'aros.ar_object_id', '=', 'updatedaros.object_id')
      // ->join('user_ar_objects as aros', 'aros.user_ar_object_key', '=', $arObject_arkeys)
       ->join('users as u', 'u.id', '=', 'updatedaros.user_id')
       ->where('updatedaros.object_id', $userAroId)
      ->where('updatedaros.user_id', $userObj)
      ->where('aros.user_ar_object_key', $arObject_arkeys->user_ar_object_key)
       ->from('user_ar_updated_objects as updatedaros')
       ->first();

//echo 'arobject----->'.$arObject;
                
                   //->get();
//echo 'bbb';
            
   

         


            if ($arObject) {

//echo 'cccs'; 
                $data = ["id"=> $arObject->id,
                // "hello world2" => "hello world2" , 
                "user_id"=> $arObject->user_id,
                "branch_url" => $arObject->branch_url,
                "object_id"=> $arObject->object_id,
                 "user_ar_object_key"=> $arObject->user_ar_object_key,
                 "share_status"=> $arObject->share_status,
                 "old_user_id"=> $arObject->old_user_id,
                 "created_at"=> $arObject->created_at,
                 "updated_at"=> $arObject->updated_at,
 
                
                 "object"=> [
                     "name" => $arObject->name,
                     "image" =>  $arObject->image,
                     "model" => [
                      "file_and"=>  $arObject->file_and,
                        "file_ios"=>  $arObject->file_ios,
                     "meta"=> [
                      "text"=>[
                         "value"=>$arObject->textValue,
                      ],
                     
                     "localScale"=>[
                         "scaleX"=> $arObject->scaleX,
                         "scaleY"=> $arObject->scaleY,
                         "scaleZ"=> $arObject->scaleZ,
                     ],
                 "position"=>[
                    "posX"=> $arObject->posX,
                    "posY"=> $arObject->posY,
                    "posZ"=> $arObject->posZ,
                 ] ,
                 "eulerAngles"=> [
                    "rotX"=> $arObject->rotX,
                    "rotY"=> $arObject->rotY,
                    "rotZ"=> $arObject->rotZ,
                 ],
                 "meshsize"=> [
                    "meshX"=> $arObject->meshX,
                    "meshY"=> $arObject->meshY,
                    "meshZ"=> $arObject->meshZ,
                 ],
                 ],
                 "location"=>[
                    "lat"=> $arObject->lat,
                    "lng"=> $arObject->lng,
                    
                 ] ,
                     ],
                    "anchors"=>[
                        "dateCreated"=> $arObject->dateCreated,
                        "dateExpired"=> $arObject->dateExpired,
                        "identifier"=> $arObject->identifier,
                        "identifier_name" => $arObject->identifier_name,
                    ],
                ],
                ];
           
                
            //     $data = ["id"=> $arObject->id,
            //     "user_id"=> $arObject->user_id,
            //     "object_id"=> $arObject->object_id,
            //     "user_ar_object_key"=> $arObject->user_ar_object_key,
            //     "share_status"=> $arObject->share_status,
            //     "old_user_id"=> $arObject->old_user_id,
            //     "created_at"=> $arObject->created_at,
            //     "updated_at"=> $arObject->updated_at,

               
            //     "object"=> [
            //         "name" => $arObject->name,
            //         "image" =>  $arObject->image,
            //         "model" => [
            //         "file"=>  $arObject->file,
            //         "meta"=> [
            //          "text"=>[
            //             "value"=>$arObject->textValue,
            //          ],
                    
            //         "localScale"=>$arObjectScaleXYZ,
            //     "position"=> $arObjectPosXYZ,
            //     "eulerAngles"=> $arObjectRotXYZ,
            //     "meshsize"=> $arObjectMeshXYZ,
            //     ],
            //     "location"=> $arObjectLocation,
            //         ],
            //         "anchors"=>$arObjectAnchors,
            //     ],
            //    ];
               
               

                $response = response()->json(['message' => 'Success.', 'aros'=>$data], 200);
            }else {
                $response = response()->json(['error' => 'Unable to fetch ar object for given user ar object id.'], 500);
            }
        }
        catch (Exception $ex) {
            $response = response()->json(['error' => 'Unable to fetch ar object for given user ar object id.' . $ex->getMessage()], 500);
        }
        return $response;
    }


    /**
     * Shares/Transfers the ARO to another user.
     *
     * @param  object $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function shareObject(Request $request)
    {
        $request->validate([
            'user_ar_object_key' => 'required|string|exists:user_ar_objects,user_ar_object_key,share_status,' . UserArObject::STATUS_NOT_SHARED,
        ]);
          //  echo '1';
        try {


          //  $arObjects = UserObjectsData::select('ar_objects_for_all.*');

           // echo '2';
            $prevARObject = UserArObject::select('uaros.*','u.push_token','u.device_type')
                ->join('users as u','u.id','=','uaros.user_id')
                ->where('user_ar_object_key', $request->user_ar_object_key)
                ->from('user_ar_objects as uaros')
                ->first();



            $userObj = auth()->user();
            //echo 'userObj--->'.$userObj->id;

            if($userObj->id == $prevARObject->user_id){
             //   echo '4';
                $response = response()->json(['error' => 'You already have this model in your list.'], 500);
                return $response;
            }
           // echo '4--->';
          
            $newAROarray = [
                'user_id' => $userObj->id,
                'ar_object_id' => $prevARObject->ar_object_id,
                'user_ar_object_key' => $userObj->id . "_" . $prevARObject->ar_object_id . "_" . $this->generateUUID(),
                'old_user_id' => $prevARObject->user_id,
            //    'branch_url' => $deepLink
                'branch_url' => $prevARObject->branch_url
            ];
           // echo '5';
            DB::beginTransaction();
           // echo '6';

            // Assigning shared object to new User
            $sharedObj = UserArObject::create($newAROarray);
           // $this->Update_branchUrl_after_ownership($sharedObj);
           // echo 'sharedObj-->'.$sharedObj;
            $branchUrl = $sharedObj->branch_url;
          //  $Objectname = $sharedObj->name;
           // echo 'Objectname-->'.$Objectname;
            $objectKey = $sharedObj->user_ar_object_key;
           //  echo 'branchUrl-->'.$branchUrl;
          //  echo 'objectKey-->'.$objectKey;
          // echo '7-->';
            // updating previous user object
            UserArObject::where('id', $prevARObject->id)->update(['share_status' => UserArObject::STATUS_SHARED]);
         //  echo 'run-->'.$updatestatus;
          UserArUpdatedObject::where('user_id', $prevARObject->user_id)->where('object_id', $prevARObject->ar_object_id)->update(['user_id' => $userObj->id]);
           

          UserArUpdatedObject::where('user_id', $prevARObject->user_id)->where('object_id', $prevARObject->ar_object_id)->update(['user_id' => $userObj->id]);
         
         // echo 'aa-->'.$userObj->id;
          $ObjectName = UserArUpdatedObject::select('name')
         // ->join('users as u','u.id','=','uaros.user_id')
          ->where('user_id', $userObj->id)
          ->where('object_id', $prevARObject->ar_object_id)
          ->from('user_ar_updated_objects')->get();
         // echo 'bb-->'.$prevARObject->ar_object_id;
         //  echo 'prevARObjectNanme-->'.$ObjectName;
         //  echo 'cc';
          

          // die();
       //  echo 'prevARObject-->'.  $prevARObject->user_id;
         //   echo 'updated-->'.$userObj->id;
          // echo 'object_id-->'.$prevARObject->ar_object_id;
        

           $getPushTokens = user_push_token::select('userpushtoken.*')
->where('userpushtoken.user_id', $prevARObject->user_id)

->from('user_push_token as userpushtoken')->get();

 // echo '--getpushtokens---->'.$getPushTokens;

//echo '--9-->';
foreach($getPushTokens as $tokens){
    

//echo '--1tokenssss--';





            // preparing data for push notification
            $notificationData = array(
             
               'push_token' => $tokens->push_token,
            // 'push_token' => $prevARObject->push_token,
                 'notification_text' => 'Your Kokari has been picked up',
                 'notification_title' => 'Kokari picked up',
                // 'device_type' => $prevARObject->device_type,
                 'device_type' => $tokens->device_type,

              // 'push_token' => $prevARObject->push_token,
              // 'notification_text' => 'Your Kokari has been picked up',
              // 'notification_title' => 'Kokari picked up',
              // 'device_type' => $prevARObject->device_type,
               
            );
           
        }
         // echo '10';
            // creating instance of class
            $pushNotificationObject = new PushNotificationController();
            // sending push notification
            $isNotified = $pushNotificationObject->sendNotification($notificationData);
        // $isNotified = true;
          // echo '--11--';
          //  echo '--isNotified--->'.$isNotified;
            if($isNotified) {
   // echo '---1---';
  //echo '--12--';
                DB::commit();
              //  echo '---13---';

           
         //   return $this->Update_branchUrl_after_ownership($branchUrl, $objectKey);

                $response = response()->json(['message' => 'Ar Object shared successfully to user.', 'kokari' => $sharedObj], 200);
                $this->Update_branchUrl_after_ownership($branchUrl, $objectKey, $ObjectName);
            }else{
            //  echo '---3----';
                DB::rollBack();
               // echo '---14---';
               
                $response = response()->json(['error' => 'Unable to share ar object to user.'], 500);
            //    return $this->Update_branchUrl_after_ownership();
              
            }
        } catch (Exception $ex) {
          //  echo '--15--';
            DB::rollBack();
          // return $this->Update_branchUrl_after_ownership();
            $response = response()->json(['error' => 'Unable to share ar object to user.'], 500);
        }

        return $response;
    }


     /**
     * Update_branchUrl_after_ownership
     *
     * @return string
     */
    public function Update_branchUrl_after_ownership($branchUrl, $objectKey, $ObjectName)
    {
           //Update Branch URL after updating object ownership
       



//$test = rtrim(preg_replace ('/https://|http://','',$branch,1),'/');
$modifyUrl = rtrim(str_replace(['http://', 'https://', ], '', $branchUrl), '/');
//echo 'url------->'.$modifyUrl;

//echo 'modifyUrl--->'.$modifyUrl;


$url = "https://api2.branch.io/v1/url?url=https%3A%2F%2F".$modifyUrl;
//echo 'curl------->'.$modifyUrl;
//echo 'url=-=-=-=--->'.$url;

$ch = curl_init();
curl_setopt($ch, CURLOPT_URL, $url);
curl_setopt($ch, CURLOPT_CUSTOMREQUEST, "PUT");


$payload = json_encode([
      'branch_key' => self::branch_key,
      'branch_secret' => 'secret_test_5MB99baISbupFMUEs4AMW5iBcKZVUYZc',
      'data' => [
          '$marketing_title'=> 'Kokari',
       //   "user_ar_object_key"=> $getUpdatedObjKey->branch_url,
       'user_ar_object_name' => $ObjectName, 

       'user_ar_object_key'=> $objectKey,
          'OwnershipStatus'=> 'UnderOwnership',
          'DownloadStatus'=> 'Complete'
        
      ]
  ]);
curl_setopt($ch, CURLOPT_POSTFIELDS, $payload);
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);

$headers = [];
$headers[] = 'Content-Type:application/json';
curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);

$result = curl_exec($ch);
$result = json_decode($result);
curl_close($ch);

//print_r($result);





  // $payload = json_encode([
  //     'branch_key' => self::branch_key,
  //     'branch_secret' => 'secret_test_5MB99baISbupFMUEs4AMW5iBcKZVUYZc',
  //     'data' => [
  //         '$marketing_title'=> 'Kokari',
  //      //   "user_ar_object_key"=> $getUpdatedObjKey->branch_url,
  //      'user_ar_object_key'=> '396_21_71ff8c4ce468426e9bb65c1f96c8b369',
  //         'ownership_status'=> 'UnderOwnership',
  //         'download_status'=> 'Complete'
        
  //     ]
  // ]);
  
  // curl_setopt($ch, CURLOPT_POSTFIELDS, $payload);
  // curl_setopt($ch, CURLOPT_HTTPHEADER, array('Content-Type:application/json'));
  // # Return response instead of printing.
  // curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
  // # Send request.
  // $result = curl_exec($ch);
  // curl_close($ch);
  // return json_decode($result)->url;






            



    }

    /**
     * Generates unique id
     *
     * @return string
     */
    public function generateUUID()
    {
        return str_replace('-', '', Str::uuid()->toString());
    }

    /**
     * Generates deep link
     * @param array objectDetails
     * @return string
     */
    public function generateDeepLink(array $objectDetails)
    {
        $ch = curl_init(self::branch_url);
        $payload = json_encode([
            'branch_key' => self::branch_key,
          //  'campaign' => 'newProduct',
            'type' => '2',
            'data' => [
            //    '$marketing_title'         => $objectDetails['name'],
              //  '$og_description'   => $objectDetails['description'],
             //   '$og_image_url'     => $objectDetails['image_url'],
               // '$og_image_url'     => $objectDetails['Image'],
              //  '$desktop_url'      => 'https://anythingeverything.io/#/kokari/',
               // 'GUID'              => $objectDetails['user_ar_object_key'],
               '$marketing_title'         => 'Kokari',
               'user_ar_object_name' => $objectDetails['name'] , 
               'user_ar_object_key'    => $objectDetails['user_ar_object_key'],
                'DownloadStatus'    => 'Complete',
                'OwnershipStatus'   => 'UnderOwnership',
                
                
              //  'OwnerHistory'      => ''
            ]
        ]);

        curl_setopt($ch, CURLOPT_POSTFIELDS, $payload);
        curl_setopt($ch, CURLOPT_HTTPHEADER, array('Content-Type:application/json'));
        # Return response instead of printing.
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        # Send request.
        $result = curl_exec($ch);
        curl_close($ch);

        return json_decode($result)->url;
    }





    
    
}
