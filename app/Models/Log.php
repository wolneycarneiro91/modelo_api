<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use OwenIt\Auditing\Contracts\Auditable;

class Log extends Model implements Auditable
{
    use \OwenIt\Auditing\Auditable;    
    use SoftDeletes;
    protected $guarded = ['id'];
    protected $dates = ['deleted_at'];
    protected $fillable = ["user_type","user_id","event","old_values","new_values","url","ip_andress","user_agent"];
}
