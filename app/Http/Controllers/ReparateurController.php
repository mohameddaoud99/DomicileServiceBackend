<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use App\Models\Reparateur;
use Illuminate\Support\Facades\Validator;
use Symfony\Component\HttpFoundation\Response;

class ReparateurController extends Controller
{
    public function inscritReparateur(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'nom' => 'required',
            'prenom' => 'required',
            'adresse' => 'required',
            'email' => 'required',
            'telephone' => 'required',
            'ville' => 'required',
            'evaluation'=> 'required',
            'password'=> 'required',
            "TypeServiceID"=>'required'
        ]);
        if ($validator->fails()) {
            return response()->json(['status' => 'error', 'message' => $validator->errors()], 
            Response::HTTP_BAD_REQUEST);
        }
        $data = $validator->validated();
        $reparateur = Reparateur::create($data);
        return response()->json(['status' => 'success', 'data' => $reparateur], Response::HTTP_CREATED);

    }

    public function login(Request $request,$email,$password)
    {
        $login = DB::select('select * from reparateur where email = ? and password = ?', [$email,$password]);
        return $login;
     
    }

    public function consulterProfileRéparateur(Request $request,$id)
    {
        $consulterProfileRéparateur = DB::select('select r.*,ts.nomservice,ts.description from  typeservice ts , reparateur r where ts.reparateur_id=r.id and reparateur_id= ? ', [$id]);
        return $consulterProfileRéparateur;
     
    }

    public function choisirReparateur(Request $request,$id)
    {
        $choisirReparateur = DB::select('select *  from reparateur  where id = ? ', [$id]);
        return $choisirReparateur;
     
    }

    public function getAllReparateur(Request $request)
    {
        $getAllReparateur = DB::select('select *  from reparateur ');
        return $getAllReparateur;
     
    }

    public function getReparateurByServiceAndVille(Request $request, $TypeServiceID ,$ville)
    {
        $getReparateur = DB::select('select *  from reparateur where TypeServiceID = ? and ville  = ?', [$TypeServiceID,$ville]);
        return $getReparateur;
     
    }

    public function getReparateurByService(Request $request, $id)
    {
        $getReparateur = DB::select('select *  from reparateur where TypeServiceID = ? ',[$id]);
        return $getReparateur;
     
    }

    public function getReparateurByID(Request $request, $id)
    {
        $getReparateur = DB::select('select *  from reparateur where id = ? ',[$id]);
        return $getReparateur;
     
    }


    public function getAllReparateurWithEvaluation(Request $request)
    {
       
        $evaluation = DB::select(
        'SELECT rep.id,rep.nom,rep.prenom,rep.ville ,ROUND(AVG(ev.valeur)) as valeur 
        FROM reparateur rep 
        LEFT JOIN evaluation ev ON rep.id = ev.reparateur_id 
        GROUP BY rep.id' );
        return $evaluation;
     
    }
 
    public function getReparateurWithEvaluationByService(Request $request,$id)
    {
       
        $evaluation = DB::select(
        'SELECT rep.id,rep.nom,rep.prenom,rep.ville ,ROUND(AVG(ev.valeur)) as valeur 
        FROM reparateur rep 
        LEFT JOIN evaluation ev ON rep.id = ev.reparateur_id 
        where TypeServiceID = ? GROUP BY rep.id' ,[$id]);
        return $evaluation;
     
    }

    


   /* public function consulterDemandesServices()
    {
        $demandeServicess = DemandeServices::all();
        return response()->json($demandeServicess);
     
    }*/

}
