<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Support\Str;

class GrupoTabGeneric extends Model
{
    use SoftDeletes;    
    protected $table ='grupo_tabgeneric';        
    protected $guarded = ['id'];
    protected $dates = ['deleted_at'];
    protected $fillable = ["ds_grupo_tabgeneric","nm_grupo_tabgeneric"];

    public function tabelaGenerica(){
        return $this->belongsToMany(TabelaGenerica::class,'grupo_tabela_tabela_generica','id_grupo_tabela','id_tabela_generica');
    }
}
