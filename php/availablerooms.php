<!DOCTYPE html>
<html>
	<meta charset="utf-8">
	
    <head>
        <link rel="stylesheet" type="text/css" href="/css/bootstrap.min.css">
        <link rel="stylesheet" type="text/css" href="/css/style.css">
        <script src="/js/script.js" type="text/javascript"></script>
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
		</head>	

	<body>
 <header id="banner">Hotel Comingle</header>
    <div class="topnav">
  <a href="/html/homepage.html">Home</a>
  <a href="/html/booking.html">Book Room</a>
  <a class="active" href="availablerooms.php">Rooms and Rates</a>
  <a href="#contact">Contact</a>
  <a href="#about">About</a>
  <div class=" "><a class="admin" href="index.php">Admin Portal</a></div>
 
</div>

<?php if ( isset($_GET['booking']) && $_GET['booking'] == success )
{
     // treat the succes case ex:
     $result='<div class="alert alert-success alert  col-sm-4  " style="margin-top: 20px" ><a href="#" class="close" data-dismiss="alert">&times;</a>Booking Successful</div>';
     echo $result;
}
    ?>

<div class="col-sm-6">
    <h1>Room Rates</h1>
    <table class="table table-hover table-bordered ">
    <thead class="thead-dark">
      <tr>
        <th>Rooms</th>
        <th>Nightly Rate(US)</th>
      </tr>
    </thead>
      <?php
     require_once('connectdb.php');
      $sql = "SELECT room,nightly_rate FROM roomrates";
      $result = $conn->query($sql);

if ($result->num_rows > 0) {
    // output data of each row
    while($row = $result->fetch_assoc()) {
      echo "<tr><td>".$row["room"]."</td><td>$".$row["nightly_rate"]."</td></tr>";
      
    }
}else{
  echo "0 results";
}

      ?>
  </table>
		
	</div>	
	
    <div class="col-sm-6">
    <h1>Available Rooms</h1>
    <table class="table table-hover table-bordered ">
    <thead class="thead-dark">
      <tr>
        <th>Rooms</th>
        <th>Availability</th>
      </tr>
    </thead>
      <?php
     require_once('connectdb.php');
      $sql = "SELECT room_type,availability FROM available_rooms";
      $result = $conn->query($sql);

if ($result->num_rows > 0) {
    // output data of each row
    while($row = $result->fetch_assoc()) {
      echo "<tr><td>".$row["room_type"]."</td><td>".$row["availability"]."</td></tr>";
      
    }
}else{
  echo "0 results";
}
$conn-> close();
      ?>
    </table>
  
    </div>
	






	</body>
</html>