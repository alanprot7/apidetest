<?php

namespace App\Http\Controllers;

use App\Contato;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class ContatosController extends Controller
{
    public function index(){
        return Contato::all();
    }
    
    public function store(Request $request){
        
        $contato = new Contato();

        $contato->name = $request->input('name');
        $contato->email = $request->input('email');

        if($contato){
            $contato->save();
        }

        return $contato;

    }

    public function leitura(){

        $arquivo = Storage::get('db.json');

        $arquivoJson = json_decode($arquivo);

        return $arquivoJson->restaurants;
    }
}
