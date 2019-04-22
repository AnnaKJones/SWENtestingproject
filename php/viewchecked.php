<html>
    <meta charset="utf-8">
    <head>
        <title>Hotel Testing</title>
        <link rel="stylesheet" type="text/css" href="/css/bootstrap.min.css">
        <link rel="stylesheet" type="text/css" href="/css/style.css">
        <script src="/js/script.js" type="text/javascript"></script>
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
    </head>
    
        <header id="banner">Hotel Comingle</header>
    <div>
    
    <?php

  session_start();

  if (isset($_SESSION["id"])) { //if you have more session-vars that are needed for login, also check if they are set and refresh them as well

    $_SESSION["id"] = $_SESSION["id"];

  }

?>
    
   <div class="col-sm-10">
    <h1>Checked-in List</h1>
    <table class="table table-hover table-bordered ">
    <thead class="thead-dark">
      <tr>
         <th>ID#</th> 
        <th>Name</th>
        <th>Email</th>
        <th>Room Type</th>
        <th>Check-in Time</th>
        <th>Length of stay(Nights)</th>
        <th>Total Charges($)</th>
        <th>No. Adults</th>
        <th>No.Children</th>
      </tr>
    </thead>
      <?php
     require_once('connectdb.php');
      $sql = "SELECT guest_id,name,email,booking_type,date_checkin,num_nights,totalcharge
      ,num_adults,num_child from bookings join checkedinUsers on checkedinUsers.guest_id = bookings.customer_id " ;
      $result = $conn->query($sql);

if ($result->num_rows > 0) {
    // output data of each row
    while($row = $result->fetch_assoc()) {
        
        ?>
        <tr>
        <td> <?php echo $row['guest_id'] ?> </td>
        <td > <?php echo $row['name'] ?> </td>
        <td> <?php echo $row['email'] ?> </td>
        <td> <?php echo $row['booking_type'] ?> </td>
        <td> <?php echo $row['date_checkin'] ?> </td>
        <td> <?php echo $row['num_nights'] ?> </td>
        <td> <?php echo $row['totalcharge'] ?> </td>
        <td class="col-xs-1"> <?php echo $row['num_adults'] ?> </td>
        <td class="col-xs-1.5"> <?php echo $row['num_child'] ?> </td>
        </tr>
     <?php 
    }
}else{
  echo "0 results";
}

      ?>
    </table>
    
    
       <div class="col-sm-10">
    <h1>Check-out List</h1>
    <table class="table table-hover table-bordered ">
    <thead class="thead-dark">
      <tr>
         <th>ID#</th> 
        <th>Name</th>
        <th>Email</th>
        <th>Room Type</th>
        <th>Check-out Time</th>
        <th>Length of stay(Nights)</th>
        <th>Total Charges($)</th>
        <th>No. Adults</th>
        <th>No.Children</th>
      </tr>
    </thead>
      <?php
     require_once('connectdb.php');
      $sql = "SELECT guest_id,name,email,booking_type,date_checkout,num_nights,totalcharge
      ,num_adults,num_child from bookings join checkedoutUsers on checkedoutUsers.guest_id = bookings.customer_id " ;
      $result = $conn->query($sql);

if ($result->num_rows > 0) {
    // output data of each row
    while($row = $result->fetch_assoc()) {
        
        ?>
        <tr>
        <td> <?php echo $row['guest_id'] ?> </td>
        <td > <?php echo $row['name'] ?> </td>
        <td> <?php echo $row['email'] ?> </td>
        <td> <?php echo $row['booking_type'] ?> </td>
        <td> <?php echo $row['date_checkout'] ?> </td>
        <td> <?php echo $row['num_nights'] ?> </td>
        <td> <?php echo $row['totalcharge'] ?> </td>
        <td class="col-xs-1"> <?php echo $row['num_adults'] ?> </td>
        <td class="col-xs-1.5"> <?php echo $row['num_child'] ?> </td>
        </tr>
     <?php 
    }
}else{
  echo "0 results";
}
$conn-> close();
      ?>
    </table>
    <button onclick="history.go(-1);">Back </button>
  
    </div>
	  
   
    
    
    </div>

    </body>
</html>