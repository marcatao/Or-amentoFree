@extends('layouts.app')

@section('content')


<div class="page-header header-filter clear-filter purple-filter" data-parallax="true" >
    <div class="container">
      <div class="row">
        <div class="col-md-8 ml-auto mr-auto">
          <div class="brand">
            <h1>Orçamento</h1>
            <h3>Formulario de geração de orçamentos</h3>
          </div>
        </div>
      </div>
    </div>
  </div>

  
<div class="main main-raised mt-5">
<div class="section section-basic">
  <div class="container" id="main_form">
    <div class="title">
      <h2>Dados do cliente</h2>
    </div>
   
         <div class="form-group">
            <label for="nomeCliente" class="bmd-label-floating">Nome Cliente</label>
            <input type="text" class="form-control" id="nomeCliente" name="nomeCliente" required>
            <span class="bmd-help">Inserir o nome do cliente</span>
          </div>

          <div class="form-group">
            <label for="emailCliente" class="bmd-label-floating">Email Cliente</label>
            <input type="email" class="form-control" id="emailCliente" name="emailCliente" required>
            <span class="bmd-help">Inserir o email do cliente</span>
          </div>

          <div class="space-50"></div>


      <div class="title">
           <h2>Serviços<button onclick="chamaModal()" class="btn btn-primary pull-right">Adicionar</button></h2>
      </div>
     @if(count($o->servicos)==0)
        <h2 class="text-center text-muted">Nenhum serviço informado</h2>
     @endif

      @foreach ($o->servicos as $serv)
          <div class="row servico" id="servico_{{$serv->id}}">
            <div class="col-7">{{$serv->descricao}}</div>
            <div class="col-3">R$: {{number_format($serv->valor,2,'.',',')}}</div>
            <div class="col-2">
              <a class="text-danger"  onclick="deleta_servico('{{$serv->id}}')">
                
                <span class="material-icons">
                restore_from_trash
                </span>
                
              </a> 
            </div>

          </div>
      @endforeach
   
 
 
      <button onclick="enviaOrçamento()" class="btn btn-primary btn-block">Enviar Oraçamento</button> 
     
</div>

   
</div>
</div>


<div id="sliderRegular" class="slider" style="display: none"></div>
<div id="sliderDouble" class="slider slider-info"  style="display: none"></div>


@endsection

@section('scripts')
<script>
  function chamaModal(){
    event.preventDefault();
    $('.modal-title').html('Descreva o serviço e valor:');
    $('#myModal').modal('show');
    requisicao('{{route('form-servico',$o->id)}}','get',0)
    .then(result => {
     $('.modal-body').html(result);
    });
  }

  function deleta_servico(id){
    let url = '{{route('form-servico','ids')}}';
    url = url.replace('ids',id);
    requisicao(url,'delete')
    .then(result => {
     $('#servico_'+id).hide('slow');
    });
  }

  function enviaOrçamento(){
    alert('Enviar orcamento');
  }
</script>
@endsection