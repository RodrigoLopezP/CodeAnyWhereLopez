$(document).ready(function() {

  $("#div_signup").hide();

  var utente_loggato = [];
  verifica_login();
  


  function verifica_login() {
    $.getJSON("model_login.php", function(result) {
      if (result == "UtenteNonTrovato") {
        alert(result);
      } else if (result == "Error_query") {
        alert(result);
      } else {
        utente_loggato = result;
        $("#utente_nickname").append(utente_loggato[1]);
        $("#utente_nome").append(utente_loggato[2]);
        $("#utente_cognome").append(utente_loggato[3]);
        $("#utente_datanascita").append(utente_loggato[4]);
        $("#utente_email").append(utente_loggato[5]);
        $("#utente_password").append(utente_loggato[6]);
        if(utente_loggato[7]!== null){
           $("#utente_propic").append("<img src='data:image/jpeg;base64,"+ utente_loggato[7] +"' class='rounded-circle' alt='immagine_profilo' width='300' height='300'>");
         }
        else{
        $("#utente_propic").append("<img src='https://www.vccircle.com/wp-content/uploads/2017/03/default-profile.png' class='rounded-circle' alt='immagine_profilo' width='300' height='300'>");
       }
      }
    });
  }
  
 

//----------------LOGOUT-----------------------------------------------------
  $("#btn_logout").click(function() {
    $.getJSON("model_logout.php", function(result) {
      if(result===true){
      alert('Disconessione effettuata.');
      location.href = 'index.html';
      }
      else{
       alert('Devi prima fare login');
      }
      });

  });
  $("#btn_aprilogin").click(function() {
    $("#div_login").show();
    if ($('#div_signup').is(':visible')) {
      $("#div_signup").hide();
    }

  });

  $("#btn_aprisignup").click(function() {
    $("#div_signup").show();
    if ($('#div_login').is(':visible')) {
      $("#div_login").hide();
    }
  });


  //-REGISTRAZIONE---------------------------------------------------------------------
  $("#btn_confermasignup").click(function() {
    var signup = {
      nickname: $('#nickname').val(),
      nome: $('#nome').val(),
      cognome: $('#cognome').val(),
      email: $('#email').val(),
      password: $('#password').val(),
      data_nascita: $('#datanascita').val(),
      propic: $('#propic').val(),
    }
    $.getJSON("model_signup.php", signup, function(result) {
      if (result == "ciao") {
        alert('Registrazione eseguita');
        location.href = 'view_profile.html';
      } else {
        alert("Errore:" + result);
      }
    });

  });



  //-LOGIN---------------------------------------------------------------------
  $("#btn_login").click(function() {
    var login = {
      login_email: $("#login_email").val(),
      login_password: $("#login_password").val(),
    }
    $.getJSON("model_login.php", login, function(result) {
      location.href = 'view_profile.html';
      utente_loggato = result;
      $("#utente_nome").append(utente_loggato[1]);
    });
  });



  //-Lista di utenti-----------DA LEVARE----------------------------------------------------------
  $("#btn_prova").click(function() {
    $.getJSON("model_prova.php", function(result) { //prende il risultato di un foglio php
      $("#table_film").empty();
      for (var i in result) {
        $("#table_film").append("<tr><td>" + result[i].nome + "</td><td>" + result[i].cognome + "</td><td>" + result[i].email + "</td><td>" + result[i].propic + "</td></tr>");
      }
    });
  });

});