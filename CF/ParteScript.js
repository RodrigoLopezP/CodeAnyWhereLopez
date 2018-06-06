$(document).ready(function() {
  $("#div_login").hide();
  $("#div_signup").hide();

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

  $("#btn_prova").click(function() {  
    $.getJSON("model_prova.php", function(result){   //prende il risultato di un foglio php
      $("#table_film").empty();
        for(var i in result){
            $("#table_film").append("<tr><td>"+result[i].nome+"</td><td>"+result[i].cognome+"</td><td>"+result[i].email+"</td><td>"+result[i].sesso+"</td></tr>");
        }
    });
  });
  
  $("#btn_confermasignup").click(function() {
    $.getJSON("model_signup.php", {
      
      "nickname":$('#nickname').val(),
      "nome":$('#nome').val(),
      "cognome":$('#cognome').val(),
      "email":$('#email').val(),
      "password":$('#password').val(),
      "sesso":$('#sesso').val(),
      "data_nascita":$('#datanascita').val(),    
      
    } ,function(result){
      if(result === true){
        alert('Registrazione eseguita');
      }
      else{
        alert("Errore:"+ result);
      }
    });  

  });
});