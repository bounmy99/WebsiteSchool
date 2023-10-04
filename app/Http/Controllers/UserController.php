<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;
use Session;
class UserController extends Controller

{
    public function user(){
        $user_id = Auth::user()->id;
        $user = User::where('id','!=',$user_id)->get();
        return response()->json($user);
    }
    public function account(){
        $user_id = Auth::user()->id;
        $user_account = User::where('id','=',$user_id)->get();
        return response()->json($user_account);

    }
    public function update_account(Request $request,$id){
        try{
            $update_account = User::find($id);
            if($request->file('file')){

                $path = 'assets/img/profileimages';
                if($update_account->image !=''){
                    if(file_exists($path.'/'.$update_account->image)){
                        unlink($path.'/'.$update_account->image);
                    }
                }

                $new_name = time().'.'.$request->file->getClientOriginalExtension();
                $request->file->move(public_path('assets/img/profileimages'),$new_name);
                $update_account->update([
                    'image'=>$new_name,
                    'name'=>$request->name,
                    'email'=>$request->email,
                    'status'=> $request->status
                ]);
            }else{
                $new_name = '';
                $update_account->update([
                    'name'=>$request->name,
                    'email'=>$request->email,
                    'status'=> $request->status
                ]);
            }
            $message = "ອັບເດດຂໍ້ມູນສຳເລັດ";
            $success = true;
        }catch(Exception $e){
            $message = $e->getMessage();
            $success = false;
        }
        $response = [
            'message' => $message,
            'success' => $success,
        ];

        return response()->json($response);
    }

    public function update_password(Request $request,$id){
        
        try{
            $input = $request->all();
            $update_password = User::find(auth()->user()->id);

           if(!Hash::check($input['old_password'], $update_password->password)){
               $success = false;
               $message = "ລະຫັດຜ່ານເກົ່າບໍ່ຖຶກຕ້ອງ";
           }else{
                $update_password->update([
                    "password" => Hash::make($request->new_password)
                ]); 
               $success = true;
               $message = "ອັບເດດລະຫັດຜ່ານສຳເລັດ";
           }

           
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
    public function register(Request $request){
        try{
            if($request->file('file')){
                $path = 'assets/img/profileimages';
                $new_name = time().'.'.$request->file->getClientOriginalExtension();
                $request->file->move(public_path('assets/img/profileimages'),$new_name);

                $check_email = User::where('email' , $request->email);

                if($check_email->count()){
                    $success = true;
                    $message = "ມີອີເມວ".$request->email."ນີ້ແລ້ວໃນລະບົບ";
                }else{
                    $register = new User();
                    $register->image = $new_name;
                    $register->name = $request->name;
                    $register->email= $request->email;
                    $register->status= $request->status;
                    $register->password = Hash::make($request->password);
                    $register->save();
                    
                    $success = true;
                    $message = 'ລົງທະບຽນສຳເລັດ';
                }
            }

           

        }catch(Exception $e){
            $success = false;
            $message = $e->getMessage();
        }

        $response = [
            'success' => $success,
            'message' => $message
        ];

        return response()->json($response);
    }

    public function user_edit($id){
        $user_edit = User::find($id);
        return response()->json($user_edit);
    }

    public function user_update(Request $request,$id){
        try{
            $user_update = User::find($id);
            if($request->file('file')){

                $path = 'assets/img/profileimages';
                if($user_update->image !=''){
                    if(file_exists($path.'/'.$user_update->image)){
                        unlink($path.'/'.$user_update->image);
                    }
                }

                $new_name = time().'.'.$request->file->getClientOriginalExtension();
                $request->file->move(public_path('assets/img/profileimages'),$new_name);
                $user_update->update([
                    'image'=>$new_name,
                    'name'=>$request->name,
                    'email'=>$request->email,
                    'status'=> $request->status,
                    'password'=>Hash::make($request->password)
                ]);
            }else{
                $new_name = '';
                $user_update->update([
                    'name'=>$request->name,
                    'email'=>$request->email,
                    'status'=> $request->status,
                    'password'=>Hash::make($request->password)
                ]);
            }
            $message = "ອັບເດດຂໍ້ມູນສຳເລັດ";
            $success = true;
        }catch(Exception $e){
            $message = $e->getMessage();
            $success = false;
        }
        $response = [
            'message' => $message,
            'success' => $success,
        ];

        return response()->json($response);
    }

    public function user_delete($id){

    try{
        $delete_user = User::find($id);

        $path = 'assets/img/profileimages';
        if($delete_user->image !=''){
            if(file_exists($path.'/'.$delete_user->image)){
                unlink($path.'/'.$delete_user->image);
            }
        }
        $delete_user -> delete();

        $message = "ລົບຂໍ້ມູນສຳເລັດ";
        $success = true;
    }catch(Exception $e){
        $message = $e->getMessage();
        $success = false;
    }
    $response = [
        'message' => $message,
        'success' => $success,
    ];

    return response()->json($response);

    }

    public function login(Request $request){
       try{

        $check_login = [
            'email' => $request->email,
            'password' => $request->password
        ];

        if(Auth::attempt($check_login)){
            $message = "ເຂົ້າສູ່ລະບົບສຳເລັດ";
            $success = true;
        }else{
            $message = "ອີເມວຫຼືລະຫັດຜ່ານບໍ່ຖຶກຕ້ອງ";
            $success = false;
        }

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

    public function logout(){
        try{
            Session::flush();

             $success = true;
             $message ="ອອກລະບົບສຳເລັດ";
 
         }catch(\illuminate\Database\QueryException $ex){
 
             $success = false;
             $message = $ex->getMessage();
         }

         $response = [
 
             "success" => "$success",
             "message" => "$message"
 
         ];
 
         return response()->json($response);
    }


}
