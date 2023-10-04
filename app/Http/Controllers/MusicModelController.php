<?php

namespace App\Http\Controllers;

use App\Models\MusicModel;
use Illuminate\Http\Request;

class MusicModelController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $images = MusicModel::orderBy('id','desc')
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

                    $file = new MusicModel();
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
    public function EditSelectedItems(Request $request){
        try{
            $ids = $request->input('ids');
            $images = MusicModel::whereIn('id', $ids)->get();
            return response()->json($images);
        }catch(Exception $e){
          return  $message = $e->getMessage();
        }
    }

    /**
     * Display the specified resource.
     */
    public function updateContent(MusicModel $musicModel,$id,Request $request)

    {
        $content = MusicModel::find($id);
        $content->update([
            'Contents' => $request->content
        ]);
        return $content;
    }

    public function updatelogo(MusicModel $musicModel,$id,Request $request)

    {
        $update_logo = MusicModel::find($id);
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
     * Show the form for editing the specified resource.
     */
    public function edit(MusicModel $musicModel,$id)
    {
        $imageEdit = MusicModel::find($id);
        return response()->json($imageEdit);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request,$id, MusicModel $musicModel)
    {
        try{
            $imageUpdate = MusicModel::find($id);

        if($request->file('file')){
            $path = 'assets/img/images';

            if($imageUpdate->images!=''){
                if(file_exists($path.'/'.$imageUpdate->images)){
                    unlink($path.'/'.$imageUpdate->images);
                }
            }
            $gnn = time().'.'.$request->file->getClientOriginalExtension();
            $request->file->move(public_path('assets/img/images'),$gnn);

            $imageUpdate->update([
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
    public function destroy(MusicModel $musicModel, Request $request )
    {
        $ids = $request->input('ids');

        foreach($ids as $id){
            $image = MusicModel::find($id);
            if($image){
                $path = "assets/img/images";
                if($image->images !=''){
                    if(file_exists($path.'/'.$image->images)){
                        unlink($path.'/'.$image->images);
                    }
                }
            }
        }

        $img = MusicModel::whereIn('id', $ids);
        $img->delete();
        return response()->json(['success' => true]);
    }
}
