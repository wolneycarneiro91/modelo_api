<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Response;
use Illuminate\Http\Request;
use App\Http\Requests\BoloRequest;
use App\Models\Bolo;

class BoloController extends Controller
{
    protected $bolo;
    public function __construct(Bolo $bolo){
            $this->bolo = $bolo;        
    } 
    public function index(Request $request)
    {    
        if ($request->filled('limit')) {
            if ($request->limit == '-1') {
                $data = $this->bolo->get();
            }
        } else {
            $data = $this->bolo->paginate(config('app.pageLimit'));
        }                                     
        $data = $this->bolo->all();
        return response()->json($data, Response::HTTP_OK );                
    }
    public function store(BoloRequest $request)
    {        
        $dataFrom = $request->all();
        DB::beginTransaction();
        try {        
            $data = $this->bolo->create($dataFrom);  
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
        $data = $this->bolo->find($id);
        if(!$data){
            return response()->json(['error'=>'Dados não encontrados'],Response::HTTP_NOT_FOUND) ;
        }
        return response()->json($data,Response::HTTP_OK ) ;
    }
    public function update(BoloRequest $request, $id)
    { 
        $data = $this->bolo->find($id);  
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
        $data = $this->bolo->find($id);
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
