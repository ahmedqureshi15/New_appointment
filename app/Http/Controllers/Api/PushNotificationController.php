<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Exception;

class PushNotificationController extends Controller
{
  
    const fcmKey = 'AAAA1VFATGc:APA91bFLO5NTGUe2pgvlq0tol0s_jZFEi7CPMXVc_6kjNcS9heRy7wL9tRFPlPuOCCzMOCea0KieElBMPoIE6aKUnd3OI2ElhNEZS82e-nfMaWLG6kukmNSnLrjGq4XnojxFswswA-5x';
    const fcmURL = 'https://fcm.googleapis.com/fcm/send';

    /**
     * Sends Push Notification To The Devices Using FCM
     *
     * @param  array $params
     * @return boolean
     */
    public function sendNotification(array $params)
    {
      //echo '---xxx---';
        $headers = array();
        $headers[] = 'Content-Type: application/json';
        $headers[] = 'Authorization: key='. self::fcmKey;

        if($params['device_type'] == 'ios') {   // ios
         //  echo '---ios---';
            $notificationData = [
                "to" => $params['push_token'],
                "collapse_key" => "type_a",
                "notification" => [
                    "title" => $params['notification_title'],
                    "text" => $params['notification_text'],
                    "sound" => "default",
                    "badge" => '1'
                ],
                "priority" => "high",
            ];
        }else { // android
           // echo '---android---';
            $notificationData = [
                'registration_ids' => [$params['push_token']],
                'data' => [
                    'mesgTitle' => $params['notification_title'],
                    'alert' => $params['notification_text']
                ]
            ];
        }
        $ch = curl_init(self::fcmURL);
       // echo '---a-->'.$ch;
        $payload = json_encode($notificationData);
      //  echo '---b--->'.$payload;
       $postfeilds =  curl_setopt($ch, CURLOPT_POSTFIELDS, $payload);
       // echo '---c-->'.$postfeilds;
       $headers=  curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);
      // echo '---d--->'.$headers;
        # Return response instead of printing.
       $returntransfer =  curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
      //  echo '---e--->'.$returntransfer;
        # Send request.
        $result = curl_exec($ch);
       // echo '---f----'.$result;
        curl_close($ch);
      //  echo '---g---';
      //  echo 'return';
      //  echo 'result---->'.json_decode($result)->success;
        return json_decode($result)->success;
     
    }
}