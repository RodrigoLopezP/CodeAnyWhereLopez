<?php
session_start();
$vinto=false;
$_SESSION["suggerimento"]="";
if(!isset($_POST["indovina"])){
  $_SESSION["tentativi"]=1;
  $_SESSION["guess"]=rand(0,5);
}
elseif($_SESSION["tentativi"]!=8){
  $_SESSION["tentativi"]++;
  if($_SESSION["guess"] < $_POST["numero"]){
   $_SESSION["suggerimento"]="Numero troppo grande!"; 
  }
  elseif($_SESSION["guess"] > $_POST["numero"]){
    $_SESSION["suggerimento"]="Numero troppo piccolo!";
  }
  else{
    $_SESSION["tentativi"]--;
    $vinto=true;
  }
}
function ricomincia(){
  session_close();
}
?>    
  
 
<html>
<HEAD>
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
</HEAD>

<BODY bgcolor="#E6E6FA">
  <div align=center>
  <h1>GIOCO DELL'INDOVINA NUMERO</h1>  
  </br>
  <?php
    if($vinto==false&& $_SESSION["tentativi"]!=8){ ?> 
    
      
     <form action="" method="post">
       <div class="form-group">
        <label>Tentativo n. <?php echo $_SESSION["tentativi"]?></label>
        <input type="text" class="form-control" autocomplete="off  "placeholder="Indovina il numero" name="numero">     
          </div>
        <?php echo $_SESSION["suggerimento"];?>
        <input type="submit" value="Conferma" class="btn btn-danger">
        <input name="indovina" type="hidden" value="<?php echo $_SESSION["guess"];?>">
           </form>
   
  <?php }
    elseif($vinto==false&& $_SESSION["tentativi"]==8) {
   ?>
    <h3>
    Spiacenti...</br>
    Hai raggiunto il limite massimo di tentativi.
    </h3>
  <?php }
    elseif($vinto==true){
  ?> 
      <h3>BRAVO!</h3>
      <p>
    Hai indovinato il numero in <?php 
      if($_SESSION["tentativi"]==1){
        echo $_SESSION["tentativi"], " tentativo";
      }
      else 
        echo $_SESSION["tentativi"], " tentativi";
    ?> 
  </p>
      <form method="get" action="index.html">
    <input type="submit" onclick="ricomincia()" class="btn btn-success" value="GIOCA DI NUOVO">    
  </form>
 <?php
    }
  ?>


  
  </div>

</BODY>
</html>


