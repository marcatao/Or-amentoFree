@isset($o)
@if($o)

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
@endif
@endisset