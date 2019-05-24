@extends('filmes.public.templateModel.index')
@section('conteudo')
<h2>Bem vindo a lista de filmes do site</h2>

<ul class="filmes">
@foreach($filmes as $f)
  <!-- <li>
   <h3>{{$f->nome}}</h3>
   {{$f->ano}}
   <p>Gernero do filme: <b>{{$f->Generos->genero}}</b></p>
   <p>{{$f->sinopse}}</p>
   <div><img src="{{$url}}imagens/{{$f->imagem}}" alt=""></div>
   <div class="select">
        <form>
           <input type="hidden" name="id" value="{{$f->id}}">
           <label for="liked">gostei</label><input id='liked' type="radio" name="like">
           <label for="noLiked">not gostei</label><input id='noLiked' type="radio" name="like">
        </form>
   </div>
   </li>-->
@endforeach   
</ul>


@stop