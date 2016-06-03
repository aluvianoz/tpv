<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;

class ajaxController extends Controller
{
    public function index(){

      return view('ajax.index');

    }

    public function searchProduct(Request $request){
        if($request->ajax()){
          return response()->json([
            "id" => "5",
            "producto" => "coca-cola",
            "precio" => "23"
          ]);
        }
    }
}
