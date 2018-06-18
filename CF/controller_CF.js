$(document).ready(function() {
  var utente_loggato;
  verifica_login(); 
  function verifica_login() {
    $.getJSON("model_login.php", function(result) {
      if (result == "UtenteNonTrovato") {
        alert(result);
      } else if (result == "Error_query") {
        alert(result);
      } else {
        utente_loggato = result;
        $("#navbar_nickname").append(utente_loggato.nickname + "<span id='span_idutente' style='display:none' >" + utente_loggato.id_utente + "</span>");
        $("#utente_nickname").append(utente_loggato.nickname);
        $("#utente_nome").append(utente_loggato.nome);
        $("#utente_cognome").append(utente_loggato.cognome);
        $("#utente_datanascita").append(utente_loggato.data_nascita);
        $("#utente_email").append(utente_loggato.email);
        $("#utente_password").append(utente_loggato.password);
        $("#utente_privilegio").append(utente_loggato.privilegio);
        $("#utente_propic").append("<img src='CF-userboy.png' class='rounded-circle' alt='immagine_profilo' width='300' height='300'>");
        if (utente_loggato.privilegio == "admin") {
          $("#agg_film").append("<li class='nav-item '><a class='nav-link ' href='view_gestionefilm.html'><b>Gestione Film</b></a> </li>");
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

  //-Lista di utenti---------------------------------------------------DA LEVARE----------------------------------------------------------
  $("#btn_prova").click(function() {
    $.getJSON("model_prova.php", function(result) { //prende il risultato di un foglio php
      $("#table_film").empty();
      for (var i in result) {
        $("#table_film").append("<tr><td>" + result[i].nome + "</td><td>" + result[i].cognome + "</td><td>" + result[i].email + "</td></tr>");
      }
    });
  });

  //---mostra graficamente le liste dell'utente in view_profilo.html-----------------------------------------------------
  $("#aprilista1").click(function() {
    var p = {
      id_utente: utente_loggato.id_utente,
    }
    $.getJSON("model_selectdavedere.php", p, function(result) { //prende il risultato di un foglio php
      $("#table_davedere").empty();
      $("#table_davedere").append("<thead><tr><th scope='col'></th><th scope='col'>Nome</th <th scope='col'>Last</th> <th scope='col'>Anno</th>   </tr> </thead>");
      for (var i in result) {
        $("#table_davedere").append("<tr><td> <img src='" + result[i].picfilm + "' width='80' height='120' ></img></td><td>" + result[i].nome_film + "</td><td>" + result[i].anno + "</td></tr>");
      }
    });
  });
  $("#aprilista2").click(function() {
    var p = {
      id_utente: utente_loggato.id_utente,
    }
    $.getJSON("model_selectvisti.php", p, function(result) { //prende il risultato di un foglio php
      $("#table_visti").empty();
      $("#table_visti").append("<thead><tr><th scope='col'></th><th scope='col'>Nome</th <th scope='col'>Last</th> <th scope='col'>Anno</th>   </tr> </thead>");
      for (var i in result) {
        $("#table_visti").append("<tr> <td> <img src='" + result[i].picfilm + "' width='80' height='120' ></img></td><td>" + result[i].nome_film + "</td><td>" + result[i].anno + "</td>  </tr>");
      }
      $("#div_filmvisti").slideDown("Fast");
    });
  });

  //---MOSTRA FILM  in view_scopri.html-----------------------------------------------------

if (window.location.pathname == "/CF/view_scopri.html") {
    $.getJSON("model_selectfilm.php", function(result) {
      $("#table_listafilm").append("<thead class='bg-dark text-white'><tr><th scope='col'> </th><th scope='col'>Nome</th> <th scope='col'>Regista</th> <th></th> </tr> </thead>");
      for (var i in result) {
        $("#table_listafilm").append("<tr><td><img class='img-thumbnail border-success mx-5' src='" + result[i].picfilm + "' width='90' height='160'></img></td><td>" + result[i].nome_film + "</td> <td>" + result[i].nome + " " + result[i].cognome + "</td>    <td><button  class='btn btn_scoprifilm' id='" + result[i].id_film + "' data-toggle='modal' data-target='#modal_scoprifilm'><i class='fa fa-info'></i></button></td></tr>");
      }

      $(".btn_scoprifilm").click(function() {
        var dati = {
          id_film: $(this).attr('id'),
        }
        $.getJSON("model_selectunfilm.php", dati, function(result1) {
          $("#modal_filmimg").append(" <img src='" + result.picfilm + "' width='80' height='120' ></img>");
          $("#boi").append(result1.nome_film); 
          $("#modal_filmregista").append(result1.nome+" "+result1.cognome); 
          $("#modal_filmanno").append(result1.anno);
          $("#modal_filmdurata").append(result1.durata);
          $("#modal_filmgenere").append(result1.genere);
        });
        
        
      });
    });
  
}



  //------------------------------------------------Animazione slide in view_gestione.html-----------------------------------------------
  $("#a_film").click(function() {
    $("#opzioni_film").slideToggle("fast");
  });
  $("#a_regista").click(function() {

    $("#opzioni_regista").slideToggle("fast");
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
  //-----------view_gestionefilm.html-----------------------------------------------------------------------------------------------------------------------------
  if (window.location.pathname == "/CF/view_gestionefilm.html") {
    $.getJSON("model_selectregista.php", function(result) {
      for (var i in result) {
        $("#select_regista").append("<option id='" + result[i].id_regista + "'>" + result[i].nome + " " + result[i].cognome + "</option>");
      }
    });
  }
  $("#btn_aggfilm").click(function() {
    var dati = {
      nome: $("#aggfilm_nome").val(),
      regista: $("#select_regista").children(":selected").attr("id"),
      anno: $("#aggfilm_anno").val(),
      link: $("#aggfilm_link").val(),
      durata: $("#aggfilm_durata").val(),
      img: $("#aggfilm_img").val(),
      genere: $("#aggfilm_genere").val(),
    }
    $.getJSON("model_insertfilm.php", dati, function(result) {
      alert(result);
    });
  });
  $("#btn_aggregista").click(function() {
    var dati = {
      nome: $("#aggregista_nome").val(),
      cognome: $("#aggregista_cognome").val(),
      paese: $("#aggregista_paese").val(),
      datanascita: $("#aggregista_datanascita").val(),
      img: $("#aggregista_img").val(),
      link: $("#aggregista_link").val(),
    }
    $.getJSON("model_insertregista.php", dati, function(result) {
      $.getJSON("model_selectregista.php", function(result) { //prende i dati aggiornati dalla table regista
        $("#select_regista").empty();
        for (var i in result) {
          $("#select_regista").append("<option id='" + result[i].id_regista + "'>" + result[i].nome + " " + result[i].cognome + "</option>"); //aggiorna la select senza bisogno di ricaricare la pagina
        }
      });
      alert(result); //alert per sapere l'esito della operazione
    });
  });
});