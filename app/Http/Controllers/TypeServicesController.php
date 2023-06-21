<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;

class TypeServicesController extends Controller
{
    public function rechercherServices(Request $request,$nomservice)
    {
        $rechercherServices = DB::select('select * from typeservice where nomservice = ?', [$nomservice]);
        return $rechercherServices;
     
    }
    public function getAllServices(Request $request)
    {
        $AllServices = DB::select('select * from typeservice ');
        return $AllServices;
     
    }
}
