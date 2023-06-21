<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use DB;
use App\Models\Contact;
use Illuminate\Support\Facades\Validator;
use Symfony\Component\HttpFoundation\Response;

class ContactController extends Controller
{
    public function ContacterReparateur(Request $request)
    {
       
        $validator = Validator::make($request->all(), [
            'message' => 'required',
            'reparateur_id' => 'required',
            'demandeur_id' => 'required',
        ]);
        if ($validator->fails()) {
            return response()->json(['status' => 'error', 'message' => $validator->errors()], 
            Response::HTTP_BAD_REQUEST);
        }
        
        $data = $validator->validated();
        $evaluation = Contact::create($data);
        return response()->json(['status' => 'success', 'data' => $evaluation], Response::HTTP_CREATED);

       
    }

    public function getMessageByReparateur(Request $request, $id)
    {
        $getMessage = DB::select('select *  from contact where id = ? ',[$id]);
        return $getMessage;

       /* $getMessage = DB::select(
            'SELECT c.message,d.nom,d.prenom  
            FROM contact c 
            INNER JOIN demandeur d ON c.reparateur_id  = d.id
            where c.reparateur_id = ? 
            GROUP BY d.id' ,[$id]);
            return $getMessage; */

           
     
    }
}
