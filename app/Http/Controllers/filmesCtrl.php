<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\filmes;
use App\genero;
use App\user_filme;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Auth;


class filmesCtrl extends Controller
{

    var $url = "http://localhost/testeEmprego/storage/app/public/";




    /*public function favoritos(Request $Request, user_filme $uf,filmes $filmes){
        $auth =  Auth::user();
        $listaFilmes = $uf->all();//where('user_id',$auth->id)->get();
        return view('filmes.favoritos',compact('listaFilmes'));
    }*/



    public function favoritar(Request $Request,user_filme $uf){
             $x = $uf->where('user_id',$Request->user_id)->where('filme_id',$Request->filme_id)->first('id');
             if($x != null ){ $x->like=$Request->like;  $x->save();}else{ $uf->create($Request->all()); }
             return response()->json(array("x"=>"oi mundo"));
    }



    public function index(filmes $filmes){
        $user   = Auth::user();//usar apenas pela web, não pela api
        $titulo ="lista de filmes!!!!";
        $filmes = $filmes->all();
        $url= $this->url;
        return view('filmes.public.filmesHome',compact('titulo','filmes','url','user'));
    }



    public function lista(filmes $filmes){
        $filmesLista = $filmes->all();
        return view('filmes.filmes',compact('filmesLista'));
    }

    public function cria(genero $genero){
        $gen = $genero->all();
        $ano =['2009','2010','2011','2012','2013','2014','2015','2016','2017','2018','2018']; 
        return view('filmes.admin.criafilmes',compact('gen','ano'));
    }

   

    public function All(filmes $filmes){
          $filme = $filmes->all()->sortBy('created_at');
          $pasta =  Storage::allFiles('app');//Storage::directories();
          return response()->json($filme);///gerando o json
    }


    public function cadastrar(Request $Request,filmes $filmes){
                $imageName = time().'.'.request()->imagem->getClientOriginalExtension();
                $Request->file('imagem')->move(storage_path('app/public/imagens'),$imageName);
                $dados['imagem']= $imageName;
                $dados['generos_id']= $Request->generos_id;
                $dados['nome']= $Request->nome;
                $dados['ano']= $Request->ano;
                $dados['sinopse']= $Request->sinopse; 
                $filmes::firstOrCreate($dados);
                return redirect(url('filmes/cria'));
    }


}
