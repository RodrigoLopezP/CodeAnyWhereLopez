<?php
include 'conn.php';
session_start();
?>
<html>
  <head>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">

  </head>
  <body>
   <div>
     <nav>
       <ul>
         <?php
         if (!isset($_SESSION['ID'])){
         echo "<li><a href='LogIn.php'>Log In</a></li>
         <li><a href='SignUp.php'>Sign Up</a></li>";
          }
         ?>
         <li><a href='Dashboard.php'>Dashboard</a></li>
       </ul>
     </nav>
    </div>
    
     <table class="table table-sm"> 
          
        </table>
  </body>
</html>