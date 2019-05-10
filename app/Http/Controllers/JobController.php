<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Job;

class JobController extends Controller{
    public function index(){
        $data = Job::all();

        if(count($data) > 0){ //mengecek apakah data kosong atau tidak
            $res['message'] = "Success!";
            $res['values'] = $data; 
            return response($res);
        }
        else{
            $res['message'] = "Empty!";
            return response($res);
        }
    }

    public function show($id){
        $data = Job::where('id',$id)->get();

        if(count($data) > 0){ //mengecek apakah data kosong atau tidak
            $res['message'] = "Success!";
            $res['values'] = $data;
            return response($res);
        }
        else{
            $res['message'] = "Failed!";
            return response($res);
        }
    }

    public function store(Request $request){
        $nama_perusahaan = $request->input('nama_perusahaan');
        $alamat = $request->input('alamat');
        $jabatan = $request->input('jabatan');
        $gaji = $request->input('gaji');

        $data = new Job();
        $data->nama_perusahaan = $nama_perusahaan;
        $data->alamat = $alamat;
        $data->jabatan = $jabatan;
        $data->gaji = $gaji;
       
        if($data->save()){
            $res['message'] = "Success!";
            $res['value'] = "$data";
            return response($res);
        }
    }
    
    public function update(request $request, $id){
        $nama_perusahaan = $request->input('nama_perusahaan');
        $alamat = $request->input('alamat');
        $jabatan = $request->input('jabatan');
        $gaji = $request->input('gaji');
    
        $data = Job::where('id',$id)->first();
        $data->nama_perusahaan = $nama_perusahaan;
        $data->alamat = $alamat;
        $data->jabatan = $jabatan;
        $data->gaji = $gaji;
    
        if($data->save()){
            $res['message'] = "Success!";
            $res['value'] = "$data";
            return response($res);
        }
        else{
            $res['message'] = "Failed!";
            return response($res);
        }
    }

    public function destroy($id){
        $data = Job::where('id',$id)->first();

        if($data->delete()){
            $res['message'] = "Success!";
            $res['value'] = "$data";
            return response($res);
        }
        else{
            $res['message'] = "Failed!";
            return response($res);
        }
    }

}
