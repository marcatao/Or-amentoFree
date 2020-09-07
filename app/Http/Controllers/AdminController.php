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



    public function form_servico($orcamento_id,Request $request){
        $id= $request->param1 ;
        if( $id <> 0){
             $servico = \App\servico::find($id);
         }else{
             $servico = new \App\servico();
             $servico->id = 0;
         }
        return view('form-servico')
        ->with('orcamento_id',$orcamento_id)
        ->with('servico',$servico);
    }

    public function form_servico_store($orcamento_id, Request $request){
        $servico = new \App\servico();
        $id= $request->param1;

        if( $id <> 0) $servico = \App\servico::find($id);
        
        $servico->descricao = $request->param2;
        $servico->valor = (double) $request->param3;
        $servico->orcamento_id = $orcamento_id;
        $servico->save();
        
        return redirect(route('formulario',$orcamento_id));

    }

    public function form_servico_delete($id){
        $servico = \App\servico::find($id);
        
        if($servico->delete()){
            return "ok";
        }
        return "not";
        
    }
}
