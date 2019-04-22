<?php
require_once('newbooking.php');
require_once('connectdb.php');
if($_GET){
    if(isset($_GET['email'])){
        $email=$_POST['email'];
        if($email ==''){
            unset($email);
        }
    }
    if(isset($_POST['token'])){
        $token = $_POST['token'];
        if($token==''){
            unset($token);
        }
    }
    if(!empty($email) && !empty($token)){
        $select= $conn->prepare("SELECT id from bookings WHERE email=$email and token =token");
        $select->execute(array(
            'email' => $email,
            'token' => $token
            ));
            if($select ->fetchColumn() > 0){
                $update = $conn->prepare("UPDATE bookings SET confirmation = 1, token = '' where email =$email ");
                $update->execute(array(
                    'email'=> $email
                    ));
                    echo 'success';
            }
    }
}

?>