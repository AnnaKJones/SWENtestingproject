<?php

session_start();
if (isset($_SESSION['id']))
{
    session_destroy();
    header("location:/html/homepage.html");
}


?>  
<?php

session_start();
if (isset($_SESSION['id']))
{
    session_destroy();
    header("location:/html/homepage.html");
}


?>  
