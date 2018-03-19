<?php
include 'conn.php';

?>
<html>
  <head>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">

  </head>
  <body>
   <div>
     <nav>
       <ul>
         <li><a href="LogIn.php">Log In</a></li>
            <li><a href="SignUp.php">Sign Up</a></li>
           <li><a href="Dashboard.php">Dashboard</a></li>
       </ul>
     </nav>
    </div>
     <table class="table table-sm"> 
          <?php     
              $stringa="SELECT * FROM utente";
      $query2=$dbh->prepare($stringa);
      if($query2->execute()){
        echo ' <thead> <tr> <th scope="col">ID utente</th><th scope="col">Cognome</th><th scope="col">Nome</th><th scope="col">Sesso</th> <th scope="col">Nazionalita</th><th scope="col">Patente</th><th scope="col">Email</th> </tr></thead> <tbody>';
        while($row=$query2->fetch()){
          echo '<tr> <td>'. $row['ID'].'</td><td> '. $row['Cognome'].'</td><td> '.$row['Nome'].'</td><td> '.$row['Sesso'].'</td><td> '.$row['Nazionalita'].' </td><td>'.$row['Patente'].'</td><td> '.$row['Email'].'</td></tr>';
        } 
        echo '</tbody>';
      }
            ?>
        </table>
  </body>
</html>