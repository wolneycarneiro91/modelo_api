<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Support\Str;

class TabelaGenerica extends Model
{
    use SoftDeletes;   
    protected $table ='tabela_generica';         
    protected $guarded = ['id'];
    protected $dates = ['deleted_at'];
    protected $fillable = ["nm_tabela_generica","ds_tabela_generica","cd_tabela_generica"];

    public function grupoTabGeneric(){
        return $this->belongsToMany(GrupoTabGeneric::class,'grupo_tabela_tabela_generica','id_tabela_generica','id_grupo_tabela');
    }    
}
