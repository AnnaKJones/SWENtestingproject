    <?php

  session_start();



  if (isset($_SESSION["id"])) { //if you have more session-vars that are needed for login, also check if they are set and refresh them as well

    $_SESSION["id"] = $_SESSION["id"];

  }

?>
  
    <h1>Guest List</h1>
    <div>
    <table class="table table-hover ">
      <tr>
        <th>ID#</th>
        <th>Name</th>
        <th>Email</th>
        <th>Telephone</th>
        <th>From</th>
        <th>To</th>
        <th>Room Type</th>
        <th>Number Of Adults</th>
        <th>Number of Children</th>

      </tr>
      <?php
     require_once('connectdb.php');
         
     
      $sql = "SELECT customer_id,full_name,email,telephone,start_date,end_date,booking_type,num_adults,num_child from bookings";
      $result = $conn->query($sql);

if ($result->num_rows > 0) {
    // output data of each row
    while($row = $result->fetch_assoc()) {
        ?>
        <tr>
        <td> <?php echo $row['customer_id'] ?> </td>
        <td> <?php echo $row['full_name'] ?> </td>
        <td> <?php echo $row['email'] ?> </td>
        <td> <?php echo $row['telephone'] ?> </td>
        <td> <?php echo $row['start_date'] ?> </td>
        <td> <?php echo $row['end_date'] ?> </td>
        <td> <?php echo $row['booking_type'] ?> </td>
        <td> <?php echo $row['num_adults'] ?> </td>
        <td> <?php echo $row['num_child'] ?> </td>
        
        </tr>
        <?php
    }
}else{
  echo "0 results";
}

$conn-> close();
      ?>
    </table>
  
    </div>
	
<script src="https://code.jquery.com/jquery-3.1.1.min.js" type="text/javascript"></script>
<script src="js/bootstrap.min.js"></script>
<script>
   
</script>





	</body>
</html>