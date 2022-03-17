<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Support\Str;

class GrupoTabelaTabelaGenerica extends Model
{
    use SoftDeletes; 
    protected $table ='grupo_tabela_tabela_generica';                
    protected $guarded = ['id'];
    protected $dates = ['deleted_at'];
    protected $fillable = ["id_grupo_tabela","id_tabela_generica"];


    public function tabelaGenerica(){
        return $this->hasMany(TabelaGenerica::class,'id_tabela_generica');
    }
    public function grupoTabGeneric(){
        return $this->belongsTo(GrupoTabGeneric::class,'');
    }    
}
