@extends('filmes.public.templateModel.index')


@section('titulo')
{{$titulo}}
@stop


@section('conteudo')
        <h2>Bem vindo a lista de filmes do site</h2>
        <input type="hidden" id="Me" value="{{$user->id}}">
        <ul class="filmes"></ul>
@stop