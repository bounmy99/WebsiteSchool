<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\InformationModel;
class InformationController extends Controller
{
    public function getAll(){
        try{
            $getall = InformationModel::orderBy('id','desc')
            ->paginate(5)
            ->toArray();
             
             $success = "GetDataSuccess";
             $error = false;

             $response = [
                'success' => $success,
                'error' => $error,
                'data'=> $getall
             ];
             return array_reverse($getall);
        }catch(Exception $e){
            $success = $e->getMessage();
             $error = true;
        }
       
    }
    public function addInfor(Request $request){
        $information = new InformationModel;
        $information->contents_1 = $request->content_1;
        $information->contents_2 = $request->content_2;
        $information->save();
        return response()->json($information);
    }
    public function updateInfor(Request $request,$id){
        $update = InformationModel::find($id);
        $update->update([
            'contents_1' => $request->content_1,
            'contents_2' => $request->content_2
        ]);
    }
}
