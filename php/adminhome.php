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
        <div class= "col-sm-2" id="sidebar">
            <nav id="navigator">
                
                <a href="adminhome.php" style="color:white"><i class="glyphicon glyphicon-home"></i> <strong> Admin Home </strong></a>
                 <p id="check-in" class="open-button" onclick="openForm()"><i class="glyphicon glyphicon-check"></i> <strong> Check-in Guest </strong></p>
                 <a href="viewchecked.php" style="color:white"><i class="glyphicon glyphicon-eye-open"></i><strong>View Checked-in</strong></a>
                <p id="check-out" class="open-button" onclick="opencheckoutForm()"> <i class="glyphicon glyphicon-remove" style="color: red"></i> <strong>Check-out Guest </strong></p>
               <a href="logout.php" style="color:white"><i class="glyphicon glyphicon-log-out"></i>  <strong> Logout </strong></a>
                
            </nav>
            
    </div>
    
    <?php

  session_start();
   if ( isset($_GET['success']) && $_GET['success'] == 1 )
{
     // treat the succes case ex:
     echo"<script language='Javascript'>alert('Successfully checked in');</script>";
}



  if (isset($_SESSION["id"])) { //if you have more session-vars that are needed for login, also check if they are set and refresh them as well

    $_SESSION["id"] = $_SESSION["id"];

  }

?>
    
    
    <div class="col-xs-10">
                 
    <h1>Guest List</h1>
    <div>
      <button type="button" id="delete" class="btn btn-danger" style="
    float: right;margin-bottom: 10px;">Delete Selected</button>
    <table class="table table-hover table-bordered id"="guest">
      <tr>
        <th><input type="checkbox" id="checkAll"/></th>  
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
        <td><input class="checkbox" type="checkbox" name="id[]" id="<?php echo $row['customer_id'] ?>"/>
        <td><?php echo $row['customer_id'] ?></td>
        <td class="col-xs-1.5"> <?php echo $row['full_name'] ?> </td>
        <td> <?php echo $row['email'] ?> </td>
        <td> <?php echo $row['telephone'] ?> </td>
        <td> <?php echo $row['start_date'] ?> </td>
        <td> <?php echo $row['end_date'] ?> </td>
        <td> <?php echo $row['booking_type'] ?> </td>
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
  
    </div>
    </div> 
	
<script src="https://code.jquery.com/jquery-3.1.1.min.js" type="text/javascript"></script>
<script src="js/bootstrap.min.js"></script>
<script>
$(document).ready(function(){
    $('#checkAll').click(function(){
        if(this.checked){
            $('.checkbox').each(function(){
                this.checked=true;
            });
            
        }else{
            $('.checkbox').each(function(){
                this.checked=false;
            })
        }
    });
    $('#delete').click(function(){
    var dataArr = new Array();
    if($('input:checkbox:checked').length > 0){
      $('input:checkbox:checked').each(function(){
        dataArr.push($(this).attr('id'));
        $(this).closest('tr').remove();
      }); 
      sendResponse(dataArr)
    }else{
        alert('no records selected ')
    }
});
function sendResponse(dataArr){
    $.ajax({
        type:'post',
        url:'function.php',
        data : {'data' :dataArr},
        success:function(response){
            alert(response);
        },
        error : function(errResponse){
            alert(errResponse);
        }
    })
}


});


   
</script>



<div class="form-popup col-sm-4" id="myForm">
  <form action="checkinprocess.php" class="form-container" method="post">
    <h1>Check-in</h1>
    <div class="form-group">
    <label for="id"><b>ID#</b></label>
    <input class="form-control" type="number" placeholder="Enter Guest's id number" name="id" required>
    </div>
    <div class="form-group">
    <label for="name"><b>Fullname</b></label>
    <input type="text" class="form-control" placeholder="Enter Guest's name" name="name" required>
    </div>
    <div class="form-group">
     <button type="submit" class="btn btn-primary">Submit</button>
    </div>
  </form>
  <span><input type="submit" class="btn btn-danger" onclick="closeForm()" value="Close"></span>
</div>

<div class="form-popup col-sm-4" id="myoutForm">
  <form action="checkoutprocess.php" class="form-container" method="post">
    <h1>Check-out</h1>
    <div class="form-group">
    <label for="id"><b>ID#</b></label>
    <input class="form-control" type="number" placeholder="Enter Guest's id number" name="id" required>
    </div>
    <div class="form-group">
    <label for="name"><b>Fullname</b></label>
    <input type="text" class="form-control" placeholder="Enter Guest's name" name="name" required>
    </div>
    <div class="form-group">
     <button type="submit" class="btn btn-primary">Submit</button>
    </div>
  </form>
  <span><input type="submit" class="btn btn-danger" onclick="closecheckoutForm()" value="Close"></span>
</div>



    
    
    </div>

    </body>
</html>