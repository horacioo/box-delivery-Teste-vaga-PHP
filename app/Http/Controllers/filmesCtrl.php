<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\filmes;
use App\genero;
use Illuminate\Support\Facades\Storage;



class filmesCtrl extends Controller
{

    var $url = "http://localhost/testeEmprego/storage/app/public/";



    public function index(filmes $filmes){
        $titulo ="filmes mais legais";
        $filmes = $filmes->all();
        $url= $this->url;
        return view('filmes.public.filmesHome',compact('titulo','filmes','url'));
    }



    public function lista(filmes $filmes){
        $filmesLista = $filmes->all();
        return view('filmes.filmes',compact('filmesLista'));
    }

    public function cria(genero $genero){
        $gen = $genero->all();
        return view('filmes.admin.criafilmes',compact('gen'));
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
