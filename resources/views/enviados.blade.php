@extends('layouts.app')

@section('content')


<div class="page-header header-filter clear-filter purple-filter" data-parallax="true" >
    <div class="container">
      <div class="row">
        <div class="col-md-8 ml-auto mr-auto">
          <div class="brand">
            <h1>Orçamentos Enviados</h1>
            <h3>Edite, reenvie seus orçamentos realizados...</h3>
          </div>
        </div>
      </div>
    </div>
  </div>

  
<div class="main main-raised mt-5">
<div class="section section-basic">
  <div class="container" id="main_form">
    <div class="title">
      <h2>Orçamentos Enviados</h2>
    </div>
   

    @foreach ($orcamentos as $o)
    <div class="row servico" id="servico_{{$o->id}}">
        <div class="col-md-1">{{$o->id}}</div>
        <div class="col-md-3">{{$o->nomeCliente}}</div>
        <div class="col-md-3">{{$o->emailCliente}}</div>
        @php
            $servicos = \App\servico::where('orcamento_id',$o->id)->get();
        @endphp
        <div class="col-md-2">R$: {{number_format($servicos->SUM('valor'),2,'.',',')}}</div>
        <div class="col-md-1"><a href="{{route('formulario',$o->id)}}"><span class="material-icons">edit</span></a></div>
        <div class="col-md-1"><a href="{{route('email',$o->id)}}"><span class="material-icons">email</span></a></div>
    </div>
    @endforeach
</div>
</div></div>
@endsection