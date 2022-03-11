<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Models\TipoDeAluno;
use Illuminate\Database\Eloquent\SoftDeletes;

class Sala extends Model
{
    use SoftDeletes;
    protected $guarded = ['id'];
    protected $dates = ['deleted_at'];
    protected $fillable = ["tipo_aluno_id","tipo_escola_id","quantidade_alunos"];

    public function tipoDeAluno()
    {
        return $this->hasOne(TipoDeAluno::class);
    }   
    public function tipo_de_escola()
    {
        return $this->hasOne(Tipo_de_escola::class);
    }      
}
