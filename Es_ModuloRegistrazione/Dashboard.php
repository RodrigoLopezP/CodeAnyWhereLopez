<?php include 'conn.php';?>
<html>

<head>
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
</head>

<body>
  <h1>
     Sei loggato come <?php echo "Sei loggato come". $_SESSION["ID_user"]; ?>
  </h1>
 <button>
   Log out
  </button>
</body>

</html>