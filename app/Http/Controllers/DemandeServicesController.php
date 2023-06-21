<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use App\Models\DemandeServices;
use Illuminate\Support\Facades\Validator;
use Symfony\Component\HttpFoundation\Response;
class DemandeServicesController extends Controller
{

    public function demanderService(Request $request)
    {
       
        $validator = Validator::make($request->all(), [
            'etat' => 'required',
            'date' => 'required',
            'demandeur_id' => 'required',
            'reparateur_id' => 'required',
           
        ]);
        if ($validator->fails()) {
            return response()->json(['status' => 'error', 'message' => $validator->errors()], 
            Response::HTTP_BAD_REQUEST);
        }
        $data = $validator->validated();
        $demandeServices = DemandeServices::create($data);
        return response()->json(['status' => 'success', 'data' => $demandeServices], Response::HTTP_CREATED);

       
    }

    public function AccepterDemande(Request $request,$id)
    {
        
        $up = DB::update('update demandeservice set etat ="A" where id = ?  ',[$id]);
        return $up;
    }

    public function RefuseDemande(Request $request,$id)
    {
        
        $up = DB::update('update demandeservice set etat ="R" where id = ?  ',[$id]);
        return $up;
    }


    public function consulterDemandesServices(Request $request,$id)
    {
       
        $demandeservice = DB::select('select *  from demandeservice  where id = ? ', [$id]);
        return $demandeservice;
     
    }

    public function DSEnAttanteReparateur(Request $request,$id)
    {
       
        $demandeservice = DB::select(' select * ,ds.id, d.nom, d.prenom, d.adresse, d.email, d.telephone, d.ville    from demandeservice ds, demandeur d   where etat="E" and  d.id=ds.demandeur_id and  reparateur_id= ? ', [$id]);

        return $demandeservice;
     
    }

    public function DSAccepterReparateur(Request $request,$id)
    {
       
        $demandeservice = DB::select(' select * , d.nom, d.prenom, d.adresse, d.email, d.telephone, d.ville    from demandeservice ds, demandeur d   where etat="A" and  d.id=ds.demandeur_id and  reparateur_id= ? ', [$id]);

        return $demandeservice;
     
    }

    public function DSRefucerReparateur(Request $request,$id)
    {
       
        $demandeservice = DB::select(' select * , d.nom, d.prenom, d.adresse, d.email, d.telephone, d.ville    from demandeservice ds, demandeur d   where etat="R" and  d.id=ds.demandeur_id and  reparateur_id= ? ', [$id]);

        return $demandeservice;
     
    }

    public function NBEnAttante(Request $request)
    {
       
        $NBEnAttante = DB::select('  SELECT COUNT(etat) as "nbe" FROM `demandeservice` WHERE etat="E"  ');

        return $NBEnAttante;
     
    }

    public function NBAccepter(Request $request)
    {
       
        $NBEnAttante = DB::select('  SELECT COUNT(etat) as "nba" FROM `demandeservice` WHERE etat="A"  ');

        return $NBEnAttante;
     
    }

    public function NBRefuser(Request $request)
    {
       
        $NBEnAttante = DB::select('  SELECT COUNT(etat) as "nbr"  FROM `demandeservice` WHERE etat="R"  ');

        return $NBEnAttante;
     
    }

    public function CountNbServiceByReparateur(Request $request,$id_demandeur,$id_reparateur)
    {
       
        $NBEnAttante = DB::select('  SELECT COUNT(id) as "nb"  FROM `demandeservice` where demandeur_id  = ? and reparateur_id   = ?', [$id_demandeur,$id_reparateur]);

        return $NBEnAttante;
     
    }
   
}
