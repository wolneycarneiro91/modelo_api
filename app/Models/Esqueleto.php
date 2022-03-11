<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Esqueleto extends Model
{
    use SoftDeletes;
    protected $guarded = ['id'];
    protected $dates = ['deleted_at'];
    protected $fillable = ["estrutura"];
}
