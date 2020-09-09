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
   
   <form method="post" action="{{route('formulario',$o->id)}}">  
    {{  csrf_field() }}
         <div class="form-group">
            <label for="nomeCliente" class="bmd-label-floating">Nome Cliente</label>
            <input type="text" class="form-control" id="nomeCliente" name="nomeCliente" value="{{$o->nomeCliente}}" required>
            <span class="bmd-help">Inserir o nome do cliente</span>
          </div>

          <div class="form-group">
            <label for="emailCliente" class="bmd-label-floating">Email Cliente</label>
            <input type="email" class="form-control" id="emailCliente" name="emailCliente"  value="{{$o->emailCliente}}" required>
            <span class="bmd-help">Inserir o email do cliente</span>
          </div>

          <div class="space-50"></div>


      <div class="title">
           <h2>Serviços<button onclick="chamaModal()" class="btn btn-primary pull-right">Adicionar</button></h2>
      </div>
  
        <div id="servico_root">
          @include('servicos-lista')
        </div>

      <div class="form-group">
        <label for="nomeCliente" class="bmd-label-floating">Observações</label>
        <textarea class="form-control" id="obs" name="obs">{{$o->obs}}</textarea>
     </div>
 
 
      <button type="submit" class="btn btn-primary btn-block">Enviar Oraçamento</button> 
   </form>    
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

  function lista_servico(id){
    requisicao('{{route('lista-servico')}}','get', id)
    .then(result => {
     $('#servico_root').html(result);
    });
  }

</script>
@endsection