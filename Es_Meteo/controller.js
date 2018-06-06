$(document).ready(function() {
  $("#textdt").hide();
  var urlF;
  //Quando fai click sul button con l'ID 'searchW'-------------------------------------------------------------------
  $("#searchW").click(function() {
    $('#t1_main').empty();
    $('#t1_desc').empty();
    $('#t1_temp').empty();
    $('#t1_press').empty();
    $('#t1_hum').empty();
    $('#t1_wspeed').empty();
    $('#t1_wdeg').empty();
    $('#t1_vis').empty();
    $('#nomecitta').empty();
    $('#oraesatta').empty();
    var d = new Date();
    $('#oraesatta').append(' <b>Weather:</br> ' + d + '</b>');
    var js_citta = $('#luogo').val();
    $.getJSON("http://api.openweathermap.org/data/2.5/weather?q=" + js_citta + "&APPID=8e0cbb88341f3e0600e358d962ea07d9", function(result) {
      $('#t1_main').append(result.weather[0].main);
      $('#t1_desc').append(result.weather[0].description);
      $('#t1_temp').append(result.main.temp);
      $('#t1_press').append(result.main.pressure);
      $('#t1_hum').append(result.main.humidity);
      $('#t1_wspeed').append(result.wind.speed);
      $('#t1_wdeg').append(result.wind.deg);
      $('#t1_vis').append(result.visibility);
      $('#nomecitta').append(result.name + ", " + result.sys.country + " (lon: " + result.coord.lon + ", lat: " + result.coord.lat + ")");
    });
  });
  //Quando fai click sul button con l'ID 'searchF'-----------------------------------------------------------------
  $("#searchF").click(function() {
    var js_cittaF = $("#luogoF").val();
    $("#nomecittaF").empty();
    $.getJSON("http://api.openweathermap.org/data/2.5/forecast?q=" + document.getElementById('luogoF').value + "&APPID=8e0cbb88341f3e0600e358d962ea07d9", function(resultF) {
      urlF = resultF;
      $("#textdt").show();
      $("#nomecittaF").append(resultF.city.name + ", " + resultF.city.country + " (lon: " + resultF.city.coord.lon + ", lat: " + resultF.city.coord.lat + ")");
      //Riempimento della select con le ore
      for (var i in resultF.list) {
        $("#selectDT").append("<option> " + resultF.list[i].dt_txt + "</option> ");
      }
    });
  });
  //Quando viene selezionato un valore nella selectDT
  $("#selectDT").on('change', function() {
    $('#t1_mainF').empty();
    $('#t1_descF').empty();
    $('#t1_tempF').empty();
    $('#t1_pressF').empty();
    $('#t1_humF').empty();
    $('#t1_wspeedF').empty();
    $('#t1_wdegF').empty();
    $('#t1_visF').empty();
    var DT_scelta = document.getElementById("selectDT").value;
    $('#t1_descF').append("U");
    for (var i = 0; i < urlF.list.length; i++) {
      if (urlF.list[i].dt_txt == DT_scelta) {
        $('#t1_mainF').append(urlF.list[i].weather[0].main);
        $('#t1_descF').append(urlF.list[i].weather[0].description);
        $('#t1_tempF').append(urlF.list[i].main.temp);
        $('#t1_pressF').append(urlF.list[i].main.pressure);
        $('#t1_humF').append(urlF.list[i].main.humidity);
        $('#t1_wspeedF').append(urlF.list[i].wind.speed);
        $('#t1_wdegF').append(urlF.list[i].wind.deg);
      }

    }



  });
});