$('document').ready(function(){
    
$('.btn').click(function(){
         event.preventDefault();
         $.ajax({
              method:"POST",
              url:"http://localhost/testeEmprego/public/api/auth/login",
              data:{
                     email:"lanterna_@hotmail.com",
                     password:"fanzine2019"
                   },
              success:function(response){console.log(response.token); getToken(response.token); },
              error:function(response){console.log(response)}     
         });
});
    
});

function getToken(token){
    localStorage.setItem('MyMoviesToken', token);
}