$(document).ready(function(){
  
  $("#btn_mostraF").click(function(){
    
    $.ajax({
      method:"POST",
            url:"model.php",
            data:{mostra:mostraF},
            dataType:"json" })
      .done(function(result)
            {
      $("#table_film").html("");
        for (var i in result)
          $("#table_film").append("<tr><td>"+result[i].titolo+"</td><td>"+result[i].annoproduzione+"</td><td>"+result[i].genere+"</td></tr>");
    });
 
  });
  
});