<?php

namespace App\Http\Controllers;
use App\Models\data;
use Illuminate\Http\Request;
use Validator;

class ATGController extends Controller
{
    function store(Request $request){
        $valid = Validator::make($request->all(),[
            'email'=>'required |unique:datas',    
            ]);
        if($valid->fails()){
            $request->session()->flash('msg','Email already Registered');
            return redirect ('/');
        }else{
        $data= new data;
        $data->name=$request->input('name');
        $data->email=$request->input('email');
        $data->pincode=$request->input('pincode');
        $result=$data->save();
        if ($result){
            $request->session()->flash('sucess','Data saved');
            return redirect('/');
        }else{
            return redirect ('/');
        }
    }
    }
       

}