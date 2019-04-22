<?php

require_once('connectdb.php'); #'inclusion' of php file to connect database for use

require ('../PHPMailer/src/Exception.php');
require ('../PHPMailer/src/PHPMailer.php');
$name = filter_input(INPUT_POST, 'name');
$email = filter_input(INPUT_POST, 'email');
$number = filter_input(INPUT_POST, 'number');
$start_date = filter_input(INPUT_POST,'startduration');
$end_date = filter_input(INPUT_POST,'endduration');
$booking_type=filter_input(INPUT_POST,'booking_type');
$adults=filter_input(INPUT_POST, 'adults');
$children=filter_input(INPUT_POST,'children');
$paymentname = filter_input(INPUT_POST,'paymentname');
$cardnum=filter_input(INPUT_POST,'payment1');
$cvnum=filter_input(INPUT_POST,'payment2');
$paymentexp=filter_input(INPUT_POST,'paymentexp');


function dateDiffInDays($date1, $date2)  
{ 
    // Calulating the difference in timestamps 
    $diff = strtotime($date2) - strtotime($date1); 
      
    // 1 day = 24 hours 
    // 24 * 60 * 60 = 86400 seconds 
    return abs(round($diff / 86400)); 
}

$length = dateDiffInDays($start_date,$end_date);


if (!empty($name) || !empty($email) || !empty($number) || !empty($start_date) ||
!empty($end_date) || !empty($bookingtype) || !empty($adult) || !empty($children) || !empty($paymentname) ||
!empty($cardnum) || !empty($cvnum) || !empty($paymentexp)){
    

    
    $insert = "INSERT INTO bookings (full_name,email,telephone,start_date,end_date,num_nights,totalcharge,booking_type,num_adults,num_child,paymentname,cardnum,cvnum,paymentexp) values ('$name', '$email',
    '$number','$start_date','$end_date','$length','$length'*(select t1.nightly_rate from roomrates t1 where t1.room = '$booking_type'),'$booking_type','$adults','$children','$paymentname','$cardnum',
    '$cvnum', '$paymentexp')";
    
    if($conn->query($insert)){
        header("location:availablerooms.php?booking=success");
        $conn->query("UPDATE available_rooms SET availability = availability - 1 WHERE room_type='$booking_type'");
      
    
}else {
    echo "All fields are required";
    die();
}





}
$conn->close();

?>