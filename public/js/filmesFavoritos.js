$('document').ready(function(){ 
         carregaFilmes();
     }
);



function carregaFilmes(){
    console.log("teste");
    $.ajax({
        method:'GET',
        url:"http://localhost/testeEmprego/public/api/filmes/favoritos",
        success:function(response){
            
            for(var i = 0; i< response.length; i++) {
                  console.log(response[i].nome);
                  $('.favoritosLista').prepend(
                      "<li>"
                         +"<p>"+response[i].nome+"</p>"
                         +"<div><img src='"+endereco+response[i].imagem+"'></div>"
                      +"</li>"
                  );
            }
        },
        error:function(response){ console.log(e.message); }
    });
}