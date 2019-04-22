<html>
    <meta charset="utf-8">
    <head>
        <title>Hotel Testing</title>
        <link rel="stylesheet" type="text/css" href="/css/bootstrap.min.css">
        <link rel="stylesheet" type="text/css" href="/css/style.css">
        <script src="/js/script.js" type="text/javascript"></script>
          <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/js/bootstrap.min.js"></script>
    </head>
    
        <header id="banner">Hotel Comingle</header>
     
        
        
    <?php if ( isset($_GET['login']) && $_GET['login'] == failed )
        {
         // treat the succes case ex:
         $result='<div class="alert alert-danger alert  col-sm-4  " style="margin-top: 20px; margin-left:10px" ><a href="#" class="close" data-dismiss="alert">&times;</a>Incorrect Username or Password</div>';
         echo $result;
        }
    ?> 
    
        <div  class="col-sm-4">    
        <form id="form" action="/php/login.php" method="post" onsubmit= "return validateUser()" class="needs-validation" novalidate>
            <h1 id="heading">User Login</h1>
            <div class="form-group">
                <label for="username"> <strong>Username</strong> </label>
                <input type="text" name="username" class="form-control" required >
                <div class="invalid-feedback">Invalid username</div>
            </div>
        
            <div class="form-group">
                <label for="password"> <strong>Password</strong> </label>
                <input type="password" name="password" class="form-control" required>
                <div class="invalid-feedback">Invalid password</div>
            </div>
        
            <div class="form-group">
                <button name="login" type="submit" class="btn btn-primary">Submit</button>
            </div>
        </form>
        
    </div>
    <script>
        var form = document.querySelector('.needs-validation');
form.addEventListener('submit',function(event){
  if(form.checkValidity()===false){
    event.preventDefault();
    event.stopPropagation();
  }
  form.classList.add('was-validated');
})
    </script>
    
    </body>
</html>