
<input type="text" value="{{$servico->id}}" name="id" id="id">
<div class="form-group">
    <label for="descricao" class="bmd-label-floating">Descrição do servico</label>
    <textarea t class="form-control" id="descricao" name="descricao"  rows="4" required>{{$servico->descricao}}</textarea>
    <span class="bmd-help">Descreva o serviço que sera impresso no orçamento</span>
</div>

<div class="form-group">
    <label for="valor" class="bmd-label-floating">Valor do servico</label>
    <input type="text" class="form-control" id="valor" name="valor" value="{{$servico->valor}}" required>
    <span class="text-danger" id="return"></span>
</div>
<button class="btn btn-primary btn-block" onclick="store_servico()">Salvar</button>
</form>

<script>
function store_servico(){
    console.log('aqui');
    const desc = $('#descricao').val();
    const valor = parseFloat($('#valor').val());
    if(desc == '' || valor == ''){
        $('#return').html('Preencha todos os campos');
        return false;
    }
 
    requisicao('{{route('form-servico',$orcamento_id)}}','post','{{$servico->id}}', desc, valor)
    .then(result => {
        location.reload();
    });   
}
function isFloat(n){
    return n === +n && n !== (n|0);
}
</script>

