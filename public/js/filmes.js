$(document).ready(function (){
       getFilmes();
        //$(".reunioes").delegate( ".btnAcessoAtividade", "click", clickBtnAcessoAtividade ) 
       $(".filmes").delegate( ".like", "click", info );
      }
);
/*******************************/
function info(){

  var like = $(this).val();
  var filme = $(this).siblings(".filmeCod").val();
  var user = $('#Me').val();
  console.log('\r \n like ='+like+"\r \n filme ="+filme+"\r \n usuario ="+user);

  if(parseInt(like)==0){$(this).parent().parent().css('background-color','#ff9900'); }
  if(parseInt(like)==1){$(this).parent().parent().css('background-color','#27ff00'); }

  $.ajax({
    method:'GET',
    url:'http://localhost/testeEmprego/public/api/filmes/favoritar',
    data:{'filme_id':filme, 'user_id':user, 'like':like},
    success:function(response){console.log("deu certo");},
    error:function(response){console.log('algo deu errado, rever o envio '+response)}
  });

}
/*******************************/
function getFilmes(){
    console.log('chamando os filmes');
    
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
                       +"<div><img src='"+endereco+""+response[i].imagem+"' alt=''></div>"
                       +"<div class='select'>"
                            +"<form class='likex'>"
                                +"<input type='hidden' class='filmeCod' name='filmeCod' value='"+response[i].id+"'>"
                                +"<label for='gostei_"+i+"'>gostei </label>"
                                    +"<input id='gostei_"+i+"'    class='like' type='radio' value='1' name='like'>"
                                +"<label for='naoGostei_"+i+"'>não gostei</label>"
                                    +"<input id='naoGostei_"+i+"' class='like' type='radio' value='0' name='like'>"
                            +"</form>"
                       +"</div>"
                       +"</li>"
                       );
               }
      },
      fail:function(){console.log('deu erro')},
    });
}