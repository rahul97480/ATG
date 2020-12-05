<?php

namespace App\Http\Controllers;
use App\Models\data;
use App\Mail\atgmail;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use Validator;

class WebServicesController extends Controller
{
    function view(){
        return view('/');
    }
    function apiResponse(Request $request){
        $data = array();
        $name = $request->input('name');
        $email = $request->input('email');
        $pincode = $request->input('pincode');
        if (empty($name)){
            array_push($data,"name:required");
        }
        if(empty($email)){
            array_push($data,"email:required");
        }
        if(empty($pincode)){
            array_push($data,"pincode:required");
        }
        $valid = Validator::make($request->all(),[     
            'email'=> 'unique:datas',
            ]);
        if($valid->fails()){
            array_push($data,"email:duplicate"); }    
    else{
        $data= new data;
        $data->name=$name;
        $data->email=$email;
        $data->pincode=$pincode;
        $data->save();
        $result=Mail::to($request->input('email'))->send(new atgmail());

        if (Mail::failures()) {
            return ['Unable to send mail Due To some Error'];
        }else{
            return ['status'=>'1','message'=>'sucessfully Sent'];
        }
    }
    $var =  ['status'=>'0','error'=>$data];
    return $var;
}
}