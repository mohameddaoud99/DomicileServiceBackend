<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use DB;
use App\Models\Evaluation;
use Illuminate\Support\Facades\Validator;
use Symfony\Component\HttpFoundation\Response;

class EvaluationController extends Controller
{
    
    public function afficheEvaluation (Request $request,$id)
    {
       
        $demandeservice = DB::select('select e.* , d.nom, d.prenom, d.adresse, d.email, d.telephone, d.ville  from  evaluation e , demandeur d where  e.demandeur_id=d.id and reparateur_id= ? ', [$id]);

        return $demandeservice;
     
    }


    public function EvaluerReparateur(Request $request)
    {
       
        $validator = Validator::make($request->all(), [
            'valeur' => 'required',
            'reparateur_id' => 'required',
            'demandeur_id' => 'required',
        ]);
        if ($validator->fails()) {
            return response()->json(['status' => 'error', 'message' => $validator->errors()], 
            Response::HTTP_BAD_REQUEST);
        }
        
        $data = $validator->validated();
        $evaluation = Evaluation::create($data);
        return response()->json(['status' => 'success', 'data' => $evaluation], Response::HTTP_CREATED);

       
    }

   public function getEvaluationByReparateur(Request $request,$id)
    {
       
        $evaluation = DB::select('SELECT ROUND(AVG(valeur)) as valeur FROM evaluation WHERE reparateur_id = ? ', [$id]);
        
        return $evaluation;
     
    }
    

    public function getEvaluationByReparateurByDemandeur(Request $request,$id)
    {
       
        $evaluation = DB::select('SELECT  d.nom,d.prenom,d.adresse,d.telephone,d.ville,e.valeur FROM evaluation e , demandeur d WHERE  d.id=e.demandeur_id and reparateur_id = ? ', [$id]);
        
        return $evaluation;
     
    }

}
