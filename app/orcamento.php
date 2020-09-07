<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class orcamento extends Model
{
    protected $table = 'orcamento';  

    public function servicos(){
        return $this->hasMany('App\servico','orcamento_id','id');
    }
}
