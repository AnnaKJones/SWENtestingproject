<?php

require_once('connectdb.php'); #'inclusion' of php file to connect database for use
$id = $_POST['id'];
$name =$_POST['name'];
$date_checked= date('Y,m,d h:i:sa');


if (!empty($id) || !empty($name)){
    
     $sql = "SELECT * FROM checkedinUsers WHERE guest_id='$id' and name='$name'";
     $result = mysqli_query($conn,$sql);
    $num= mysqli_num_rows($result);
    if($num == 1){
    $del="delete from checkedinUsers where guest_id='$id'";
    $insert = "INSERT INTO checkedoutUsers (guest_id,name,date_checkout) values ('$id', '$name',
    '$date_checked')";
    if($conn->query($del)){
        if($conn->query($insert)){
        header("location: /php/adminhome.php");
   

}}else{
    echo "No existing booking from this person";
    die();
}     
}
 
}   
$conn->close();

?>

