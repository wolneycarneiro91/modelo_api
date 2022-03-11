<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\DB;
use App\Http\Requests\EsqueletoRequest;
use App\Models\Esqueleto;
use Illuminate\Http\Response;

class EsqueletoController extends Controller
{
    protected $esqueleto;
    public function __construct(Esqueleto $esqueleto){
            $this->esqueleto = $esqueleto;        
    } 
    public function index()
    {                           
        $data = $this->esqueleto->all();
        return response()->json($data, 201);                
    }
    public function store(EsqueletoRequest $request)
    {        
        $dataFrom = $request->all();
        DB::beginTransaction();
        try {        
            $data = $this->esqueleto->create($dataFrom);  
            DB::commit(); 
            return response()->json($data,201) ;
        } 
        catch (\Exception $e) {
            DB::rollback();
            return response()->json(['message'=>'Não foi possível cadastrar','error'=>$e], 406);
        }             
    }
    public function show($id)
    {
        $data = $this->esqueleto->find($id);
        if(!$data){
            return response()->json(['error'=>'Nada foi encontrado'],Response::HTTP_NOT_FOUND ) ;
        }
        return response()->json($data,Response::HTTP_OK) ;
    }
    public function update(EsqueletoRequest $request, $id)
    { 
        $data = $this->esqueleto->find($id);  
        if(!$data){
            return response()->json(['error'=>'Nada foi encontrado'],Response::HTTP_NOT_FOUND) ;
        } 
        $this->validate($request, $request->rules());    
        $dataFrom = $request->all();
        DB::beginTransaction();
        try {          
            $data->update($dataFrom);  
            DB::commit(); 
            return response()->json($data,201) ;    
            }
        catch (\Exception $e)
             {
             DB::rollback();
             return response()->json('Não foi possível atualizar', 406);
            }                             
    }

    public function delete($id)
    {
        $data = $this->esqueleto->find($id);
        if(!$data){
            return response()->json(['error'=>'Nada foi encontrado'],404) ;
        }
         DB::beginTransaction();
         try {  
                $data->delete();
                DB::commit(); 
                return response()->json(['success'=>'Deletado com sucesso.'],201) ; 
         }
        catch (\Exception $e)
             {
                DB::rollback();
                return response()->json('Não foi possível excluir', 406);
            }                
    }    
    
}
