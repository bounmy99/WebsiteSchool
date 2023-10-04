<?php

namespace App\Http\Controllers;

use App\Models\ContactModel;
use Illuminate\Http\Request;

class ContactModelController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $contact = ContactModel::all();
        return response()->json($contact);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(Request $request)
    {
        try{
             if($request->file('file')){
                $path = "assets/img/logo";
                $new_name = time().'.'.$request->file->getClientOriginalExtension();
                $request->file->move(public_path('assets/img/logo'),$new_name);
             }else{
                $new_name="";
             }
                $create = new ContactModel;
                $create->name_school = $request->NameSchool;
                $create->logo = $new_name;
                $create->address = $request->address;
                $create->phone_number = $request->phone_number;
                $create->email = $request->email;
                $create->facebook = $request->facebook;
                $create->whatsapp = $request->whatsapp;
                $create->save();
             
            $message = "ບັນທຶກຂໍ້ມູນສຳເລັດ";
            $success = true;
        }catch(Exception $e){
            $message = $e->getMessage();
            $success = false;
        }
        $response = [
            'message' => $message,
            'success' => $success
        ];

        return response()->json($response);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(ContactModel $contactModel)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(ContactModel $contactModel,$id)
    {
        $edit = ContactModel::find($id);
        return response()->json($edit);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, ContactModel $contactModel,$id)
    {
        try{
            $update = ContactModel::find($id);
            if($request->file('file')){
                $path = "assets/img/logo";
                if($update->logo != ''){
                    if(file_exists($path.'/'.$update->logo)){
                        unlink($path.'/'.$update->logo);
                    }
                }
                $new_name = time().'.'.$request->file->getClientOriginalExtension();
                $request->file->move(public_path('assets/img/logo'),$new_name);
                $update->update([
                    'name_school' => $request->NameSchool,
                    'logo' => $new_name,
                    'address' => $request->address,
                    'phone_number' => $request->phone_number,
                    'email' => $request->email,
                    'facebook' => $request->facebook,
                    'whatsapp' => $request->whatsapp,
                ]);
            }else{
                $new_name = '';
                $update->update([
                'name_school' => $request->NameSchool,
                'address' => $request->address,
                'phone_number' => $request->phone_number,
                'email' => $request->email,
                'facebook' => $request->facebook,
                'whatsapp' => $request->whatsapp,
            ]);
            }
          

            $message = "ອັບເດດຂໍ້ມູນສຳເລັດ";
            $success = true;
        }catch(Exception $e){
            $message = $e->getMessage();
            $success = true;
        }

        $response = [
            'message' => $message,
            'success' => $success,
            'data' => $update
        ];

        return response()->json($response);
    }
    public function updatebg(Request $request, ContactModel $contactModel,$id)
    {
        try{
            $update = ContactModel::find($id);
            if($request->file('file')){
                $path = "assets/img/backgrounds";
                if($update->bg != ''){
                    if(file_exists($path.'/'.$update->bg)){
                        unlink($path.'/'.$update->bg);
                    }
                }
                $new_name = time().'.'.$request->file->getClientOriginalExtension();
                $request->file->move(public_path('assets/img/backgrounds'),$new_name);
                $update->update([
                    'bg' => $new_name,
                ]);
            }
          
            $message = "ອັບເດດຂໍ້ມູນສຳເລັດ";
            $success = true;
        }catch(Exception $e){
            $message = $e->getMessage();
            $success = true;
        }

        $response = [
            'message' => $message,
            'success' => $success,
            'data' => $update
        ];

        return response()->json($response);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(ContactModel $contactModel)
    {
        //
    }
}
