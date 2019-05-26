@extends('layouts.app')

@section('content')

        @foreach($lista as $f)
        <p>--- {{ $f->FilmesPai }}</p>
        @endforeach

@stop