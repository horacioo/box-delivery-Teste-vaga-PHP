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

    public function favoritar(Request $Request,user_filme $uf){
             $x = $uf->where('user_id',$Request->user_id)->where('filme_id',$Request->filme_id)->first('id');
             if($x != null ){ $x->like=$Request->like;  $x->save();}else{ $uf->create($Request->all()); }
             return response()->json(array("x"=>"oi mundo"));
    }



    public function index(filmes $filmes){
        $user   = Auth::user();//usar apenas pela web, não pela api
        $titulo ="lista de filmes!!!!";
        $url = $filmes->pastaImagens;
        $filmes = $filmes->all();
        return view('filmes.public.filmesHome',compact('titulo','filmes','user','url'));
    }



    public function lista(filmes $filmes){
        $filmesLista = $filmes->all();
        return view('filmes.filmes',compact('filmesLista'));
    }

    public function cria(genero $genero){
        $gen = $genero->all();
        $ano  = $this->Epocas();
        return view('filmes.admin.criafilmes',compact('gen','ano'));
    }

    private function Epocas(){
        $epocas = array(); 
        $year = "1895";
        while($year <= date("Y")):
        $epocas[]=$year;
        $year++;
        endwhile;
        return $epocas;
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
