<?php include 'conn.php';
  session_start();
if(isset($_POST['LogOut'])){
  session_destroy();
  header("Location:index.php");
}
?>

<html>
<head>
</head>
<body>
   <?php 
    if (isset($_SESSION['ID'])){
      echo "<h1>  Sei loggato come ". $_SESSION["Nome"]."  ". $_SESSION["Cognome"] . "</h1>
         <form method='POST'>
       <input type='submit' name='LogOut' value='LogOut' >
        </form>";
    }
    else{
      echo "<h1> Non sei loggato</h1>";
    }
  ?>  
 
  
   <button onclick ="location='index.php'">
   Home
  </button>
</body>

</html>