<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use Alert;
use App\Mail\changePassword;
// use Mail;
use Illuminate\Support\Facades\Mail;

class EmailController extends Controller
{
    public function getRecoverPassword(){
        return view('clientsPage.changePassword');
    }

    public function postRecoverPassword(Request $req){

       $all_username = DB::table('users')
        ->get('username');

        $rules = [
            'user_name' => 'required'
        ];
        $messages = [
            'required' => 'This field is required'
        ];

        $req->validate($rules,$messages);

        $this_username = $req->user_name;

        $data = DB::table('users')
        ->where('username',$this_username)
        ->get();

        if(isset($data[0])){
            $user_email = DB::table('users')
            ->where('username',$this_username)
            ->get('Email');

          

            $characters = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
            $randomString = ''; 
            $n = 10;
        
            for ($i = 0; $i < $n; $i++) {
                $index = rand(0, strlen($characters) - 1);
                $randomString .= $characters[$index];
            }

            $new_password = bcrypt($randomString);

            DB::table('users')
            ->where('username',$this_username)
            ->update(['password' => $new_password]);
            
            $details = [
                'title' => 'khanh an lon'
                ,'body' => 'Your new password is:'.$randomString
            ];

            Mail::to($user_email[0]->Email)->send(new changePassword($details));
            dd('gui roi');
        }
        else{
            return redirect()->back();
        }
    }
}