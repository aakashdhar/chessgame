<?php

class FCM {

    //put your code here
    // constructor
    function __construct() {
        
    }

    /**
     * Sending Push Notification
     */
    public function send_notification($registatoin_ids,$ofname,$ofcode,$ofamt) {
        
        
        
		define("GOOGLE_API_KEY","AAAA6yO2WVQ:APA91bHLgwbYp8wLJPunz-gBlcwgTqFv9gKGmWQCZcYHZiAijX-VbMYGx4B8OV9QYvheVn-GEAXWVzP4BOvcMGOOdkMU3u1LR5GU5P_-8d5_LujsdJIs06H_LLC-at8sT_6o110UQ_VZhaOaNJ0ZWsX4is6DNy6l3Q");
		
        // Set POST variables
        $url = 'https://fcm.googleapis.com/fcm/send';

       /* $fields = array(
            'registration_ids' => $registatoin_ids,
            'data' => $message,
			
        );*/
        //if($short=='') $short='QuillBooks Notification';
        
       
          $fields = array('registration_ids' => $registatoin_ids,'data' => array('cname' => $ofname,'cmob'=>$ofcode,'source'=>$ofamt));
         
     

        $headers = array(
            'Authorization: key='.GOOGLE_API_KEY,
            'Content-Type: application/json'
        );
        
        //print(json_encode($fields));
        
        // Open connection
        $ch = curl_init();

        // Set the url, number of POST vars, POST data
        curl_setopt($ch, CURLOPT_URL, $url);

        curl_setopt($ch, CURLOPT_POST, true);
        curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);

        
        // Disabling SSL Certificate support temporarly
        curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
        curl_setopt($ch, CURLOPT_IPRESOLVE, CURL_IPRESOLVE_V4);
        curl_setopt($ch, CURLOPT_POSTFIELDS, json_encode($fields));
        
     

        // Execute post
        $result = curl_exec($ch);
        if ($result === FALSE) 
        {
            die('Curl failed: ' . curl_error($ch));
        }
        else
        {
         echo "success";
        } 

        // Close connection
        curl_close($ch);
        //echo $result;
    }

}

?>