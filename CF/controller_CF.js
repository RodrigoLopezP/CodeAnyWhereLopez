$(document).ready(function() {
  var utente_loggato = [];
  verifica_login();
  //------------------------------------------------Animazione slide in view_gestione-----------------------------------------------
  $("#a_film").click(function() {
    $(".gestione_menu").slideUp("fast");
    $("#opzioni_film").slideDown("fast");
  });
  $("#a_regista").click(function() {
    $(".gestione_menu").slideUp("fast");
    $("#opzioni_regista").slideDown("fast");
  });
  $("#a_attore").click(function() {
    $(".gestione_menu").slideUp("fast");
    $("#opzioni_attore").slideDown("fast");
  });
  //-----------
  $("#a_aggfilm").click(function() {
    $("#card_gestione").children().slideUp("fast");
    $("#card_aggfilm").slideDown("fast");
  });
  $("#a_modfilm").click(function() {
    $("#card_gestione").children().slideUp("fast");
    $("#card_modfilm").slideDown("fast");
  });
  $("#a_elifilm").click(function() {
    $("#card_gestione").children().slideUp("fast");
    $("#card_elifilm").slideDown("fast");
  });
  //-----------
  $("#a_aggregista").click(function() {
    $("#card_gestione").children().slideUp("fast");
    $("#card_aggregista").slideDown("fast");

  });
  $("#a_modregista").click(function() {
    $("#card_gestione").children().slideUp("fast");
    $("#card_modregista").slideDown("fast");

  });
  $("#a_eliregista").click(function() {
    $("#card_gestione").children().slideUp("fast");
    $("#card_eliregista").slideDown("fast");
  });
  //-----------
  $("#a_aggattore").click(function() {
    $("#card_gestione").children().slideUp("fast");
    $("#card_aggattore").slideDown("fast");

  });
  $("#a_modattore").click(function() {
    $("#card_gestione").children().slideUp("fast");
    $("#card_modattore").slideDown("fast");
  });
  $("#a_eliattore").click(function() {
    $("#card_gestione").children().slideUp("fast");
    $("#card_eliattore").slideDown("fast");
  });
  //----------------------------------------------------------------------------------------------------------------------------------------


  function verifica_login() {
    $.getJSON("model_login.php", function(result) {
      if (result == "UtenteNonTrovato") {
        alert(result);
      } else if (result == "Error_query") {
        alert(result);
      } else {
        utente_loggato = result;
        $("#navbar_nickname").text(utente_loggato.nickname);
        $("#utente_nickname").append(utente_loggato.nickname);
        $("#utente_nome").append(utente_loggato.nome);
        $("#utente_cognome").append(utente_loggato.cognome);
        $("#utente_datanascita").append(utente_loggato.data_nascita);
        $("#utente_email").append(utente_loggato.email);
        $("#utente_password").append(utente_loggato.password);
        $("#utente_privilegio").append(utente_loggato.privilegio);
        $("#utente_propic").append("<img src='https://www.vccircle.com/wp-content/uploads/2017/03/default-profile.png' class='rounded-circle' alt='immagine_profilo' width='300' height='300'>");
        if (utente_loggato.privilegio == "admin") {
          $("#agg_film").append("<li class='nav-item '><a class='nav-link' href='view_gestionefilm.html'><b>Gestione Film</b></a> </li>");
        }

      }
    });
  }



  //----------------LOGOUT-----------------------------------------------------
  $(".cf_logout").click(function() {
    $.getJSON("model_logout.php", function(result) {
      if (result === true) {
        alert('Disconessione effettuata.');
        location.href = "index.html";
      } else {
        alert('Devi prima fare login');
        location.href = "index.html";
      }
    });

  });



  //-REGISTRAZIONE---------------------------------------------------------------------
  $("#btn_confermasignup").click(function() {

    if ($("#password").val() != $("#confirm_password").val()) {
      $('#password').val("");
      $('#confirm_password').val("");
      alert("Errore nella conferma della password");

    } else {
      var signup = {
        nickname: $('#nickname').val(),
        nome: $('#nome').val(),
        cognome: $('#cognome').val(),
        email: $('#email').val(),
        password: $('#password').val(),
        data_nascita: $('#datanascita').val(),
      }
      $.getJSON("model_signup.php", signup, function(result) {
        if (result == "Registrazione eseguita") {
          alert('Registrazione eseguita');
          location.href = 'view_profilo.html';
        } else {
          alert("Errore:" + result);
        }
      });
    }
  });



  //-LOGIN---------------------------------------------------------------------
  $("#btn_login").click(function() {
    var login = {
      login_email: $("#login_email").val(),
      login_password: $("#login_password").val(),
    }
    $.getJSON("model_login.php", login, function(result) {
      if (result == "UtenteNonTrovato") {
        alert("Errore: utente non trovato");
        $("#login_email").val("");
        $("#login_password").val("");
      } else if (result == "ErrorQuery") {
        alert("Errore: Scrivere di nuovo email e password");
        $("#login_email").empty();
        $("#login_password").empty();
      } else {
        utente_loggato = result;
        location.href = 'view_profilo.html';
      }
    });
  });

  $("#navbar_profilo").click(function() {
    location.href = 'view_profilo.html';
  });

  //-Lista di utenti-----------DA LEVARE----------------------------------------------------------
  $("#btn_prova").click(function() {
    $.getJSON("model_prova.php", function(result) { //prende il risultato di un foglio php
      $("#table_film").empty();
      for (var i in result) {
        $("#table_film").append("<tr><td>" + result[i].nome + "</td><td>" + result[i].cognome + "</td><td>" + result[i].email + "</td></tr>");
      }
    });
  });

});