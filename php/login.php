<?php
session_start();
$message='';
try{
   if(isset($_POST["login"]))
    {

require_once('connectdb.php'); #'inclusion' of php file to connect database for use

    $uname = $_POST['username'];
    $pword = md5($_POST['password']);
 
        if(empty($_POST["username"]) || empty($_POST["password"]))
        {
          echo "All fields are required";
        }
        else
        { 
            $sql = "SELECT * FROM users WHERE username ='$uname'and password='$pword'"; 
            $result = mysqli_query($conn,$sql);
            $num= mysqli_num_rows($result);
            if($num == 1){
                header("location: /php/adminhome.php");
                 $_SESSION["id"] = $uname["id"];
            }else{
                header("location: index.php?login=failed");
                throw new Exception("Incorrect Username or Password");
            }
            
        }
}
}catch(Exception $e) {
    #display message for exception caught
    $message = sprintf('<lable>%s</lable>', $e->getMessage());
    echo $message;
}