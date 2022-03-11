<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Response;
use App\Http\Requests\CasaRequest;

use App\Models\Casa;
use Illuminate\Http\Request;

class CasaController extends Controller
{
    protected $casa;
    public function __construct(Casa $casa){
            $this->casa = $casa;        
    } 
    public function index(Request $request)
    {    
        
        if ($request->filled('limit')) {
            if ($request->limit == '-1') {
                $data = $this->casa->get();
            }
        } else {
            $data = $this->casa->paginate(config('app.pageLimit'));
        }                                     
        $data = $this->casa->all();
        return response()->json($data, Response::HTTP_OK );                
    }
    public function store(CasaRequest $request)
    {        
        $dataFrom = $request->all();
        DB::beginTransaction();
        try {        
            $data = $this->casa->create($dataFrom);  
            DB::commit(); 
            return response()->json($data,Response::HTTP_CREATED ) ;
        } 
        catch (\Exception $e) {
            DB::rollback();
            return response()->json('Não foi possível cadastrar', Response::HTTP_NOT_ACCEPTABLE );
        }             
    }
    public function show($id)
    {
        $data = $this->casa->find($id);
        if(!$data){
            return response()->json(['error'=>'Dados não encontrados'],Response::HTTP_NOT_FOUND) ;
        }
        return response()->json($data,Response::HTTP_OK ) ;
    }
    public function update(CasaRequest $request, $id)
    { 
        $data = $this->casa->find($id);  
        if(!$data){
            return response()->json(['error'=>'Dados não encontrados'],Response::HTTP_NOT_FOUND) ;
        }            
        $dataFrom = $request->all();
        DB::beginTransaction();
        try {          
            $data->update($dataFrom);  
            DB::commit(); 
            return response()->json($data,Response::HTTP_OK ) ;    
            }
        catch (\Exception $e)
             {
             DB::rollback();
             return response()->json('Não foi possível atualizar', Response::HTTP_NOT_ACCEPTABLE );
            }                             
    }

    public function destroy($id)
    {
        $data = $this->casa->find($id);
        if(!$data){
            return response()->json(['error'=>'Dados não encontrados'],Response::HTTP_NOT_FOUND) ;
        }
         DB::beginTransaction();
         try {  
                $data->delete();
                DB::commit(); 
                return response()->json(['success'=>'Deletado com sucesso.'],Response::HTTP_OK ) ; 
         }
        catch (\Exception $e)
             {
                DB::rollback();
                return response()->json('Não foi possível excluir', Response::HTTP_NOT_ACCEPTABLE );
            }                
    }    
    
}
