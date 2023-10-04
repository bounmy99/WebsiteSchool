<?php

namespace App\Http\Controllers;

use App\Models\DanceModel;
use Illuminate\Http\Request;

class DanceModelController extends Controller
{
      /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $images = DanceModel::orderBy('id','desc')
        ->paginate(8)
        ->toArray();
        return response()->json($images);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(Request $request)
    {
        try{

            if ($request->hasFile('images')) {
                $files = $request->file('images');
                foreach($files as $file){
                    $filename = $file->getClientOriginalName();
                    $extension = $file->getClientOriginalExtension();
                    $fileName = time().".".$extension;
                    $destinationPath = 'assets/img/images'.'/';
                    $file->move($destinationPath, $fileName);

                    $file = new DanceModel();
                    $file->Contents = $request->contents;
                    $file->images = $fileName;
                    $file->save();
                    
                    $message = "ອັບໂຫຼດຂໍ້ມູນສຳເລັດ";
                    $success = true;
                }

            }
        }catch(Exception $e){
            $message = $e->getMessage();
            $success = false;
        }

        $response = [
            "message" => $message,
            "success" => $success,
        ];

        return response()->json($response);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function updateContent(Request $request,$id)
    {
        $updateContent = DanceModel::find($id);
        $updateContent->update([
            'Contents' => $request->content
        ]);
        return response()->json(['success' => true,'data'=>$updateContent]);
    }

    public function updatelogo(Request $request,$id)
    {
        $update_logo = DanceModel::find($id);
        if($request->file('file')){
            $path = 'assets/img/logo/logo';
            if($update_logo->logo !=''){
                if(file_exists($path.'/'.$update_logo->logo)){
                    unlink($path.'/'.$update_logo->logo);
                }
            }
            $new_name = time().'.'.$request->file->getClientOriginalExtension();
            $request->file->move(public_path('assets/img/logo/logo'),$new_name);
            $update_logo->update([
                'logo'=>$new_name,
            ]);
        }
        return response()->json(['success'=>true,$update_logo]);
    }

    /**
     * Display the specified resource.
     */
    public function EditSelectedItems(Request $request){
        try{
            $ids = $request->input('ids');
            $images = DanceModel::whereIn('id', $ids)->get();
            return response()->json($images);
        }catch(Exception $e){
          return  $message = $e->getMessage();
        }
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(DanceModel $danceModel,$id)
    {
        try{
            $edit = DanceModel::find($id);
            return response()->json($edit);
        }catch(Exception $e){
            return $e->getMessage();
        }
       
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id, DanceModel $danceModel)
    {
        try{
            $Update = DanceModel::find($id);
            if($request->file('file')){
                $path = 'assets/img/images';
    
                if($Update->images!=''){
                    if(file_exists($path.'/'.$Update->images)){
                        unlink($path.'/'.$Update->images);
                    }
                }
                $gnn = time().'.'.$request->file->getClientOriginalExtension();
                $request->file->move(public_path('assets/img/images'),$gnn);
    
                $Update->update([
                    "images" => $gnn,
                    "Content" => $request->content
                ]);
            }
            $message = "ອັບເດດຂໍ້ມູນສຳເລັດ";
            $success = true;

        }catch(Exception $e){
            $message = $e->getMassage();
            $success = false;
        }

        $response = [
            'message' => $message,
            'success' => $success
        ];

        return response()->json($response);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(DanceModel $danceModel, Request $request)
    {
        {
            $ids = $request->input('ids');
            foreach($ids as $id){
                $delete = DanceModel::find($id);
                if($delete){
                    $path = "assets/img/images";
                    if($delete->images !=''){
                        if(file_exists($path.'/'.$delete->images)){
                            unlink($path.'/'.$delete->images);
                        }
                    }
                }
            }
            $img = DanceModel::whereIn('id', $ids)->delete();
            return response()->json(['success' => true]);
        }
    }
}
