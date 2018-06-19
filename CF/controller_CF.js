$(document).ready(function() {
  $("#index_logogrande").hide();
  $("#index_logogrande").fadeIn(4000);

  $("#navbar_profilo").click(function() {
    location.href = 'view_profilo.html';
  });
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
        $("#navbar_nickname").append("<b>" + utente_loggato.nickname + "<span id='span_idutente' style='display:none' >" + utente_loggato.id_utente + "</span></b>");
        $("#utente_nickname").append(utente_loggato.nickname);
        $("#utente_nome").append(utente_loggato.nome);
        $("#utente_cognome").append(utente_loggato.cognome);
        $("#utente_datanascita").append(utente_loggato.data_nascita);
        $("#utente_email").append(utente_loggato.email);
        $("#utente_password").append(utente_loggato.password);
        $("#utente_privilegio").append(utente_loggato.privilegio);
        $("#utente_propic").append("<img src='CF-userboy.png' class='rounded-circle' alt='immagine_profilo' width='200' height='200'>");
        if (utente_loggato.privilegio == "admin") {
          $("#agg_film").append("<li class='nav-item '><a class='nav-link font-weight-bold ' href='view_gestionefilm.html'>Gestione Film <i class='fa fa-cog'></i></a> </li>");
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
          var login = {
            login_email: $("#email").val(),
            login_password: $("#password").val(),
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




  //---liste view_profilo.html-----------------------------------------------------
  $("#apri_listadavedere").click(function() {
    var p = {
      id_utente: utente_loggato.id_utente,
    }
    $.getJSON("model_selectdavedere.php", p, function(result) { //prende il risultato di un foglio php
      $("#table_davedere").empty();
      $("#table_davedere").append("<thead><tr><th scope='col'></th><th scope='col'>Nome</th <th scope='col'>Last</th>  <th></th></tr> </thead>");
      for (var i in result) {
        $("#table_davedere").append("<tr id='rowdavedere_"+result[i].id_film+"'><td> <img  class='img-thumbnail border border-warning ' src='" + result[i].picfilm + "' width='80' height='120' ></img></td><td>" + result[i].nome_film + "</td><td><button id='" + result[i].id_film + "'  class='btn btn-sm btn-warning btn_filmvisto'><i class='fa fa-eye'></i></button></td></tr>");
      }
      $(".btn_filmvisto").click(function() {
        var param={
          id_utente: utente_loggato.id_utente,
          id_film: $(this).attr('id'),
        }
        $.getJSON("model_updatefilmvisto.php", param, function(result1) {
          ("#rowdavedere_"+param.id_film).hide();
        });
      });

    });
    $("#div_filmdavedere").slideDown("fast");
    $("#div_filmvisti").slideUp("fast");
  });
  $("#apri_listagiavisti").click(function() {
    var p = {
      id_utente: utente_loggato.id_utente,
    }
    $.getJSON("model_selectvisti.php", p, function(result) { //prende il risultato di un foglio php
      $("#table_visti").empty();
      $("#table_visti").append("<thead><tr><th scope='col'></th><th scope='col'>Nome</th <th scope='col'>Last</th>  </tr> </thead>");
      for (var i in result) {
        $("#table_visti").append("<tr> <td> <img class='img-thumbnail border border-warning ' src='" + result[i].picfilm + "' width='80' height='120' ></img></td><td>" + result[i].nome_film + "</td> <td><button class='btn btn-sm btn-outline-dark'><ico class='fa fa-times'></ico></button><button class='btn btn-sm btn-warning mx-2'><ico class='fa fa-info'></ico></button></td>  </tr>");
      }

      $("#div_filmvisti").slideDown("fast");
      $("#div_filmdavedere").slideUp("fast");

    });
  });

  //------------------------------------------------Animazione slide in view_gestionefilm.html-----------------------------------------------
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
  $.getJSON("model_selectregista.php", function(result) {
    for (var i in result) {
      $(".select_regista").append("<option id='" + result[i].id_regista + "'>" + result[i].nome + " " + result[i].cognome + "</option>");
    }
  });
  $.getJSON("model_selectfilm.php", function(result) {
    for (var i in result) {
      $("#modfilm_select").append("<option id='" + result[i].id_film + "'>" + result[i].nome_film + "</option>");
    }
  });

  $("#aggfilm_img").on('input propertychange paste', function() {
    $("#aggfilm_visimg").empty();
    $("#aggfilm_visimg").append("<img class='img-thumbnail' alt=' no image ' src='" + $("#aggfilm_img").val() + "' width='240' height='360' >");
  });

  $("#modfilm_img").on('input propertychange paste', function() {
    $("#modfilm_visimg").empty();
    $("#modfilm_visimg").append("<img  class='img-thumbnail' alt=' no image ' src='" + $("#modfilm_img").val() + "' width='240' height='360' >");
  });

  $("#aggregista_img").on('input propertychange paste', function() {
    $("#aggregista_visimg").empty();
    $("#aggregista_visimg").append("<img  class='img-thumbnail' alt=' no image ' src='" + $("#aggregista_img").val() + "' width='240' height='360' >");
  });

  $("#btn_aggfilm").click(function() {
    if ($("#aggfilm_nome").val() === "" || $("#aggfilm_anno").val() === "" || $("#aggfilm_durata").val() === "" || $("#aggfilm_img").val() === "" || $("#aggfilm_genere").val() === "" || $("#aggfilm_link").val() === "") {
      alert("Riempi tutto il form");
    } else {
      var dati = {
        nome: $("#aggfilm_nome").val(),
        regista: $("#aggfilm_selectregista").children(":selected").attr("id"),
        anno: $("#aggfilm_anno").val(),
        link: $("#aggfilm_link").val(),
        durata: $("#aggfilm_durata").val(),
        img: $("#aggfilm_img").val(),
        genere: $("#aggfilm_genere").val(),
      }
      $.getJSON("model_insertfilm.php", dati, function(result) {
        alert(result);
        $("#aggfilm_nome").val('');
        $("#aggfilm_anno").val('');
        $("#aggfilm_link").val('');
        $("#aggfilm_durata").val('');
        $("#aggfilm_img").val('');
        $("#aggfilm_genere").val('');
        $("#modfilm_visimg").empty();
        $("#card_aggfilm").slideUp();
      });
    }
  });
  $("#btn_aggregista").click(function() {
    if ($("#aggregista_nome").val() === "" || $("#aggregista_cognome").val() === "" || $("#aggregista_paese").val() === "" || $("#aggregista_datanascita").val() === "" || $("#aggregista_link").val() === "") {
      alert("Riempi tutto il form");
    } else {
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
          $(".select_regista").empty();
          for (var i in result) {
            $(".select_regista").append("<option id='" + result[i].id_regista + "'>" + result[i].nome + " " + result[i].cognome + "</option>"); //aggiorna la select senza bisogno di ricaricare la pagina
          }
        });
        alert(result); //alert per sapere l'esito della operazione
      });
    }
  });
  $(".modfilm-fade").hide();
  $("#modfilm_select").change(function(result) {
    $(".modfilm-fade").fadeOut();
    var dati = {
      id_film: $("#modfilm_select").children(":selected").attr("id"),
    }
    $.getJSON("model_selectunfilm.php", dati, function(result) {
      $("#modfilm_nome").val(result.nome_film);
      $("#modfilm_anno").val(result.anno);
      $("#modfilm_durata").val(result.durata);
      $("#modfilm_link").val(result.link_wiki);
      $("#modfilm_img").val(result.picfilm);
      $("#modfilm_genere").val(result.genere);
      $("#modfilm_registacorrente").text("regista corrente: " + result.nome + " " + result.cognome);
      $(".modfilm-fade").fadeIn("slow");
    });
  });

  $("#btn_modfilm").click(function() {
    var modfilm_dati = {
      id_film: $("#modfilm_select").children(":selected").attr("id"),
      nome: $("#modfilm_nome").val(),
      regista: $("#modfilm_selectregista").children(":selected").attr("id"),
      anno: $("#modfilm_anno").val(),
      link: $("#modfilm_link").val(),
      durata: $("#modfilm_durata").val(),
      img: $("#modfilm_img").val(),
      genere: $("#modfilm_genere").val(),
    }
    $.getJSON("model_updatefilm.php", modfilm_dati, function(risposta) {
      alert(risposta);
      $(".modfilm-fade").fadeOut();
      $("#card_modfilm").slideUp();
    })
  });

  //---MOSTRA FILM  in view_scopri.html-----------------------------------------------------


  $.getJSON("model_selectfilm.php", function(result) {
    $("#table_listafilm").append("<thead class='bg-dark text-white'><tr><th scope='col'> </th><th scope='col'>Nome</th> <th scope='col'>Regista</th> <th></th> </tr> </thead>");
    for (var i in result) {
      $("#table_listafilm").append("<tr><td><img class='img-thumbnail border border-warning ' mx-5' src='" + result[i].picfilm + "' width='90' height='160'></td><td>" + result[i].nome_film + "</td> <td>" + result[i].nome + " " + result[i].cognome + "</td><td><button  class='btn btn-md btn-warning btn_scoprifilm' id='" + result[i].id_film + "' data-toggle='modal' data-target='#modal_scoprifilm'><i class='fa fa-info'></i></button></td></tr>");
    }
    $(".btn_scoprifilm").click(function() {
      var film_cliccato = $(this).attr('id');
      var id_scoprifilm = {
        id_film: film_cliccato,
        id_utente: utente_loggato[0],
      }
      $.getJSON("model_controllofilm.php", id_scoprifilm, function(controllofilm) {
        $("#modal_btnfilm").empty();
        if (controllofilm === true) {
          $("#modal_btnfilm").append("  <button type='submit' id='btn_aggalista' class='btn btn-lg'>Aggiungi<i class='fa fa-plus'></i></button>");
        } else {
          $("#modal_btnfilm").append("  <button type='submit' class='btn btn-success btn-lg disabled'>Già nella tua lista <i class='fa fa-check'></i></button>");
        }
      });
      $.getJSON("model_selectunfilm.php", id_scoprifilm, function(infofilm) {
        $("#modal_img").empty();
        $("#modal_nome").empty();
        $("#modal_regista").empty();
        $("#modal_anno").empty();
        $("#modal_durata").empty();
        $("#modal_genere").empty();
        $("#modal_img").append(" <img src='" + infofilm.picfilm + "' width='200' height='270' >");
        $("#modal_nome").append(infofilm.nome_film);
        $("#modal_regista").append(infofilm.nome + " " + infofilm.cognome);
        $("#modal_anno").append(infofilm.anno);
        $("#modal_durata").append(infofilm.durata + " minuti");
        $("#modal_genere").append(infofilm.genere);

        $("#btn_aggalista").click(function() {
          $.getJSON("model_insertlista.php", id_scoprifilm, function(aggiunto) {

            $("#modal_btnfilm").empty();
            $("#modal_btnfilm").append("  <button type='submit' class='btn btn-success btn-lg disabled'>Già nella tua lista  <i class='fa fa-check'></i></button>");
          });
        });

      });


    });


  });





});