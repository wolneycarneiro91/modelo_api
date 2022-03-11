<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\DB;
use App\Http\Requests\Tipo_de_escolaRequest;
use App\Models\Tipo_de_escola;

class Tipo_de_escolaController extends Controller
{
    protected $tipo_de_escola;
    public function __construct(Tipo_de_escola $tipo_de_escola){
            $this->tipo_de_escola = $tipo_de_escola;        
    } 
    public function index()
    {                           
        $data = $this->tipo_de_escola->all();
        return response()->json($data, 201);                
    }
    public function store(Tipo_de_escolaRequest $request)
    {
        $this->validate($request, $request->rules());   
        $dataFrom = $request->all();
        DB::beginTransaction();
        try {        
            $data = $this->tipo_de_escola->create($dataFrom);  
            DB::commit(); 
            return response()->json($data,201) ;
        } 
        catch (\Exception $e) {
            DB::rollback();
            return response()->json('Não foi possível cadastrar'.$e, 406);
        }             
    }
    public function show($id)
    {
        $data = $this->tipo_de_escola->find($id);
        if(!$data){
            return response()->json(['error'=>'Nada foi encontrado'],404) ;
        }
        return response()->json($data,201) ;
    }
    public function update(Tipo_de_escolaRequest $request, $id)
    { 
        $data = $this->tipo_de_escola->find($id);  
        if(!$data){
            return response()->json(['error'=>'Nada foi encontrado'],404) ;
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
        $data = $this->tipo_de_escola->find($id);
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
                return response()->json(['message_error'=>'Não foi possível excluir','error'=>$e], 406);
            }                
    }    
    
}
