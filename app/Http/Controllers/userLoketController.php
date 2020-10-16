<?php

namespace App\Http\Controllers;

use App\User;
use App\loket;
use App\userLoket;
use App\Customer;
use App\Antrian;

use Validator,Redirect,Response;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Hash;
use Yajra\DataTables\DataTables;

class userLoketController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $getDate = Customer::first();
        if ($getDate) {
            $oldDate = date('d-m-Y', strtotime('+1 days', strtotime($getDate->created_at)));
            $nowDate = date('d-m-Y');   
            if (strtotime($nowDate) >= strtotime($oldDate)) {
                Customer::truncate();
                Antrian::truncate();
            }
        }

        return view('admin.userLoket.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $model = new User();
        $loket = loket::all();
        return view('admin.userLoket.form',['model'=>$model,'loket'=>$loket]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {    
     
        $this->validate($request,[
            'foto'=> 'required|image|mimes:jpeg,png,jpg|max:2048',
            'name'=>'required|string',
            'loket_id'=>'required',
            'email'=>'required|email',
            'password'=>'required|max:100'
        ]);

        $foto = $request->file('foto');
        $namafile = $foto->getClientOriginalName();
        $destinasi = 'public/image/fotoUser';
        $foto->move($destinasi,$namafile);

        $model = new userLoket();
        $model->name = $request->name;
        $model->loket_id = $request->loket_id;
        $model->email = $request->email;
        $model->password = Hash::make($request->password);
        $model->foto = $namafile;
        $model->save();
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $val = $id;
        return view('admin.userLoket.changepass',compact('val'));
    }

    public function changepassword(Request $request,$id){
        $model = userLoket::where('id',$id)->update(['password'=>Hash::make($request->password)]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $model = userLoket::where('id',$id)->first();
        $loket = loket::all();
        return view('admin.userLoket.form',['model'=>$model,'loket'=>$loket]);

    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {

        $valueFoto= '';

        if (!is_null($request->foto)) {
            $foto = $request->file('foto');
            $namafile = $foto->getClientOriginalName();
            $destinasi = 'image/fotoUser';
            $foto->move($destinasi,$namafile);

            $valueFoto = $namafile;
        }else {
            $fotoFile = $request->tampungFoto;
            $valueFoto = $fotoFile;
        }

        $model = userLoket::where('id',$id)->update([
            'name'=>$request->name,
            'loket_id'=>$request->loket_id,
            'foto'=>$valueFoto,
            'email'=> $request->email
        ]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $model = userLoket::where('id',$id)->first();
        $model->delete();
    }

    public function indexLogin(){
        return view('admin.authUserLoket.loginLoket');
    }

    public function loginLoket(Request $request){
        
        $email = $request->username;
        $password = $request->password;

        $data = User::where('email',$email)->first();
        if ($data) {
            if (Hash::check($password, $data->password)) {
                Session::put('name',$data->name);
                Session::put('role',$data->role);
                Session::put('foto',$data->foto);
                Session::put('loket',$data->loket_id);
                Session::put('login',TRUE);
                return redirect('/loginUserLoket/dashboard');   
            }else {
                return redirect('loginUserLoket')->with('alert','Password atau Email, Salah !');
            }
        } else {
            return redirect('loginUserLoket')->with('alert','Password atau Email, Salah!');
        }
    }

    public function dashboard(){
        if (!Session::get('login')) {
            return redirect('loginUserLoket')->with('alert','Kamu harus login dulu');
        }else {
            return view('admin.authUserLoket.dashboard');
        }

        if (Session::get('login')) {
            return redirect('/loginUserLoket/dashboard');
        }
        
        
    }

    public function logoutLoket() {
        Session::flush();
        return redirect('loginUserLoket')->with('alert','Kamu sudah logout');
    }

    public function Datatable(){

        $model = userLoket::query();
        return DataTables::of($model)->addColumn('action',function($model){
            return view('layouts.action.aksi1',[
                'url_edit'=>route('userloket.edit',$model->id),
                'url_changePassword'=>route('userloket.show',$model->id),
                'url_destroy'=>route('userloket.destroy',$model->id)
            ]);
        })->addIndexColumn()->rawColumns(['action'])->make(true);

    }


    public function indexdataantrian(){
        $customer = Customer::where('id', '>=', 0)->orderBy('no_antrian', 'asc')->get();
        return view('admin.antrian.index', compact('customer'));
    }

    public function DatatableAntrian(){
        $model = Customer::query();
        return DataTables::of($model)->make(true);

    }

}
