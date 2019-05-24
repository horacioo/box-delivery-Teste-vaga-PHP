$(document).ready(function (){
    getFilmes();
}
);


function getFilmes(){
    console.log('chamando os filmes');
    var endereco="http://localhost/testeEmprego/storage/app/public/";
    $.ajax({
      method:'GET',  
      url:'http://localhost/testeEmprego/public/api/filmes',
      success:function(response){
        console.log(response.length);
        for(var i = 0; i< response.length; i++) 
               { 
                   console.log(''+response[i].nome);
                   $('.filmes').prepend(
                       "<li>"
                       +"<h3>"+response[i].nome+"</h3>"
                       +""+response[i].ano+""
                       +"<p>"+response[i].sinopse+"</p>"
                       +"<div><img src='"+endereco+"imagens/"+response[i].imagem+"' alt=''></div>"
                       +"<dic class='select'></div>"
                       +"</li>"
                       );
               }
      },
      fail:function(){console.log('deu erro')},
    });
}