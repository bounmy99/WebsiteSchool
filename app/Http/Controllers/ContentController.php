<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\ImageModel;
use App\Models\ContentModel;

class ContentController extends Controller
{
    public function Content(){
        try{
           $data = ImageModel::Join('content_models','content_models.id','=','image_models.content_id')
           ->select('image_models.images','content_models.contents')
           ->get();
           return response()->json($data);
        }catch(Exception $e){
            return $e->getMessage();
        };
    }
}
