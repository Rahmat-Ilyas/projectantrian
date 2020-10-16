<?php

namespace App\Http\Controllers;

use App\videoDisplay;
use App\teksJalan;
use App\Customer;
use App\Antrian;
use App\monitor;

use Illuminate\Http\Request;
use App\Helpers\UserSystemInfoHelper;

class displayController extends Controller
{
    public function index(Request $request){
        $getip = UserSystemInfoHelper::get_ip();
        $getbrowser = UserSystemInfoHelper::get_browsers();
        $getdevice = UserSystemInfoHelper::get_device();
        $getos = UserSystemInfoHelper::get_os();

        $video = videoDisplay::where('id',1)->first();
        $teksJalan = teksJalan::where('id',1)->first();

        $getDate = Customer::first();
        if ($getDate) {
            $oldDate = date('d-m-Y', strtotime('+1 days', strtotime($getDate->created_at)));
            $nowDate = date('d-m-Y');   
            if (strtotime($nowDate) >= strtotime($oldDate)) {
                Customer::truncate();
                Antrian::truncate();
            }
        }

        return view('admin.display.index',['getip'=>$getip,'getbrowser'=>$getbrowser,'getdevice'=>$getdevice,'getos'=>$getos,'video'=>$video,'teksJalan'=>$teksJalan]);
    }

    public function office(){
        $video = videoDisplay::where('id',1)->first();
        $teksJalan = teksJalan::where('id',1)->first();
        return view('admin.display.office',['video'=>$video,'teksJalan'=>$teksJalan]);
    }

    public function timedisplay(){
        date_default_timezone_get('Asia/Jakarta');
        echo $timestamp = date('H:i:s');
    }

    public function formvideoUpload(){
        $model = new videoDisplay();
        return view('admin.display.formVideo',compact('model'));
    }

    public function updateVideo(Request $request){

        $this->validate($request,[
            'foto'=>'mimes:mp4,mov|max:50000'
        ]);
       

        $videoM = $request->file('foto');
        $namafile = $videoM->getClientOriginalName();
        $destinasi = 'public/video';
        $videoM->move($destinasi,$namafile);

        $model = videoDisplay::where('id',1)->first();
        $model->nama = $namafile;
        $model->save();

    }

    public function teskJalan(Request $request){
        $model = teksJalan::where('id',1)->first();
        $model->isi = $request->isi;
        $model->save();
    }

   

}
