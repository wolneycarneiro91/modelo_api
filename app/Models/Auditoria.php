<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Auditoria extends Model
{
    use SoftDeletes;
    protected $guarded = ['id'];
    protected $dates = ['deleted_at'];
    protected $table = "auditoria";
    protected $fillable = [
        "user_id",
        "tipo_evento",
        "valor_anterior",
        "nome_tabela",
        "valor_novo",
        "url",
        "ip_andress",
        "user_agent"
    ];
}
