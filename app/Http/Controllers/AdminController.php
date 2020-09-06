<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\orcamento;

class AdminController extends Controller
{
   
    public function app(){
        return $this->puxaUltima();
    }

    public function puxaUltima(){
        $o = orcamento::where('status',0)->first();
        if(!$o){
            $o = new orcamento();
            $o->nomeCliente = '';
            $o->emailCliente = '';
            $o->status=0;
        }
        $o->save();
        return redirect(route('formulario',$o->id));
    }

    public function formulario($id){
        $o = orcamento::find($id);
        return view('form')->with('o',$o);
    }



    public function form_servico(){
        return view('form-servico');
    }
}
