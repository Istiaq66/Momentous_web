<?php

function notify($to,$data){

    $api_key="AAAALG-lRfs:APA91bElxT-27QfhIu-b7hf4nSyttChym2nnBlppCeIwmC0pRWBWjLGVVq-TOgCligOtLqfWZE3lLjsf0Gtxdy1BI2SA_xVwQ7IXjvchldeCUrvfd_Z69_EjRXgByH9MJJytZvfHTSRm";
    $url="https://fcm.googleapis.com/fcm/send";
    $fields=json_encode(array('to'=>$to,'notification'=>$data));

    // Generated by curl-to-PHP: http://incarnate.github.io/curl-to-php/
    $ch = curl_init();

    curl_setopt($ch, CURLOPT_URL, $url);
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
    curl_setopt($ch, CURLOPT_POST, 1);
    curl_setopt($ch, CURLOPT_POSTFIELDS, ($fields));

    $headers = array();
    $headers[] = 'Authorization: key ='.$api_key;
    $headers[] = 'Content-Type: application/json';
    curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);

    $result = curl_exec($ch);
    if (curl_errno($ch)) {
        echo 'Error:' . curl_error($ch);
    }
    curl_close($ch);
}
  $to = '/topics/Momentous';
  $data=array(
    'title'=>'New Order              ',
    'body'=>'Hey an order has landed please check',
    //'image'=>'https://thumbs.dreamstime.com/b/order-red-stamp-text-white-44561786.jpg'
   );

notify($to,$data);

?>