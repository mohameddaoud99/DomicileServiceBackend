<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use App\Models\Demandeur;
use Illuminate\Support\Facades\Validator;
use Symfony\Component\HttpFoundation\Response;
class DemandeurController extends Controller
{
    public function inscrit(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'nom' => 'required',
            'prenom' => 'required',
            'adresse' => 'required',
            'email' => 'required',
            'telephone' => 'required',
            'ville' => 'required',
            'password'=> 'required'
        ]);
        if ($validator->fails()) {
            return response()->json(['status' => 'error', 'message' => $validator->errors()], 
            Response::HTTP_BAD_REQUEST);
        }
        $data = $validator->validated();
        $demandeur = Demandeur::create($data);
        return response()->json(['status' => 'success', 'data' => $demandeur], Response::HTTP_CREATED);

       
    }

    public function login(Request $request,$email,$password)
    {
        $login = DB::select('select * from demandeur where email = ? and password = ?', [$email,$password]);
        return $login;
     
    }

    public function getServiceByReparateur(Request $request, $id)
    {
        $getService = DB::select('select *  from demandeservice where id = ? ',[$id]);
        return $getService;

       

           
     
    }

}
