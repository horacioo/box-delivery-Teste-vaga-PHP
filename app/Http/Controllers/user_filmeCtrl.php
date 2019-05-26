<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\filmes;
use App\user_filme;
use Illuminate\Support\Facades\Auth;



class user_filmeCtrl extends Controller
{
    public function favoritosApi(user_filme $user_filme,filmes $filmes ){
        ///$auth =  Auth::user();
        $usuario =1;
        $lista = $user_filme->where('user_id',$usuario)->where('like',1)->get();
        $arrayRetorno=array();
        $i=0;
        foreach($lista as $l):
            $arrayRetorno[$i]['nome']=$l->FilmesPai->nome;
            $arrayRetorno[$i]['ano']=$l->FilmesPai->ano;
            $arrayRetorno[$i]['imagem']=$l->FilmesPai->imagem;
            $arrayRetorno[$i]['sinopse']=$l->FilmesPai->sinopse;
            $arrayRetorno[$i]['like']=$l->like;
            $i++;
        endforeach;

        return response()->json($arrayRetorno);
        
        //return view('filmes.favoritos',compact('lista'));
    }

    public function favoritos(user_filme $user_filme,filmes $filmes ){
        ///$auth =  Auth::user();
        $usuario =1;
        $lista = $user_filme->where('user_id',$usuario)->where('like',1)->get();
        $arrayRetorno=array();
        $i=0;
        foreach($lista as $l):
            $arrayRetorno[$i]['nome']=$l->FilmesPai->nome;
            $arrayRetorno[$i]['ano']=$l->FilmesPai->ano;
            $arrayRetorno[$i]['imagem']=$l->FilmesPai->imagem;
            $arrayRetorno[$i]['sinopse']=$l->FilmesPai->sinopse;
            $arrayRetorno[$i]['like']=$l->like;
            $i++;
        endforeach;

        return response()->json($arrayRetorno);
        
        //return view('filmes.favoritos',compact('lista'));
    }


}
