<?php

require_once('connectdb.php'); #'inclusion' of php file to connect database for use
$id = $_POST['id'];
$name =$_POST['name'];
$date_checked= date('Y,m,d h:i:sa');


if (!empty($id) || !empty($name)){
    
     $sql = "SELECT * FROM bookings WHERE customer_id='$id' and full_name='$name'";
     $result = mysqli_query($conn,$sql);
    $num= mysqli_num_rows($result);
    if($num == 1){
    $insert = "INSERT INTO checkedinUsers (guest_id,name,date_checkin) values ('$id', '$name',
    '$date_checked')";
    if($conn->query($insert)){
        header("location: /php/adminhome.php?success=1");
        if ( isset($_GET['success']) && $_GET['success'] == 1 )
{
     // treat the succes case ex:
     echo"<script language='Javascript'>alert('Successfully checked in');</script>";
}
   

}else{
    echo "No existing booking from this person";
    die();
}     
}
 
}   
$conn->close();

?>

