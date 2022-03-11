<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\Event;
use App\Models\Auditoria;
use Exception;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;

class AuditoriaServiceProvider extends ServiceProvider
{
    public function register()
    {
        //
    }
    public function boot()
    {
        try {
            Event::listen(['eloquent.created: *', 'eloquent.updated: *', 'eloquent.deleted: *'], function ($origem, $model) {
                $tableName = $model[0]->getTable();
                if ($tableName != 'auditoria') {
                    $originalData = $model[0]->getOriginal();
                    $newData = $model[0]->getAttributes();
                    Auditoria::create([
                        "user_id" => request()->user_key,
                        "tipo_evento" => explode('.', explode(':', $origem)[0])[1],
                        "valor_anterior" => json_encode($originalData),
                        "valor_novo" => json_encode($newData),
                        "url" => request()->server('HTTP_HOST'),
                        "ip_andress" => request()->ip(),
                        "user_agent" => request()->server('HTTP_USER_AGENT'),
                    ]);
                }
            });
        } catch (Exception $e) {
            Log::error(['cod'=>'aud','error'=>$e]);
        }
    }
}
