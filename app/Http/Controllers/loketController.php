<?php

namespace App\Http\Controllers;

use App\loket;
use App\User;
use App\Antrian;
use App\Customer;
use Yajra\DataTables\DataTables;
use App\Events\CallingEvent;
use App\Events\ActionEvent;

use Illuminate\Http\Request;

class loketController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
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
        
        return view('admin.loket.index');
    }

    // public function indexTable(){
    //     $model = loket::all();
    //   return response()->json($model);
    // }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $model = new loket();
        return view('admin.loket.form',compact('model'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $model = loket::where('id',$id)->first();
        return view('admin.loket.form',compact('model'));
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
        $model = loket::where('id',$id)->update([
            'nama_loket'=>$request->nama_loket,
            'layanan'=>$request->layanan,
            'status'=>$request->status,
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

    }

    public function datatables(){

        $model = loket::query();
        return DataTables::of($model)->addColumn('action',function($model){
            return view('layouts.action.aksi',[
                'url_edit'=>route('loket.edit',$model->id),
                'url_destroy'=>route('loket.destroy',$model->id)
            ]);
        })->addIndexColumn()->rawColumns(['action'])->make(true);

    }


    // Loket Controller config_data rahmat ilyas :v 8===D
    public function config_data(Request $request)
    {
        if ($request->req == 'set-data') {
            $layanan = $request->layanan;
            if ($layanan == 'WNI') {
                $get1 = Customer::where('kategori', 'prioritas')->orderby('no_urut', 'asc')->where('status', 'waiting')->first();
                $get2 = Customer::where('kategori', 'umum')->orderby('no_urut', 'asc')->where('status', 'waiting')->first();
                if ($get1) $get = $get1;
                else if ($get2) $get = $get2;
                else $get = null;
            } else if ($layanan == 'BAP') {
                $get = Customer::where('kategori', 'bap')->where('status', 'waiting')->orderby('no_urut', 'asc')->first();
            } else if ($layanan == 'WNA') {
                $get = Customer::where('kategori', 'wna')->where('status', 'waiting')->orderby('no_urut', 'asc')->first();
            }

            if ($get) {
                $get->loket_id = $request->loket_id;
                $get->status = 'view';
                $get->save();
                $no_antrian = $get->no_antrian;
                $id = $get->id;
            } else {
                $no_antrian = null;
                $id = null;
            }

            event(new ActionEvent(true));
            return response()->json(['no_antrian' => $no_antrian, 'id' => $id], 200);
        } else if ($request->req == 'cek-status') {
            $cek_id = Customer::where('loket_id', $request->loket_id)->where('status', '!=', 'finish')->first();
            if ($cek_id) {
                $id = $cek_id->id;
                $status = $cek_id->status;
                $no_antrian = $cek_id->no_antrian;
            }
            else {
                $id = null;
                $status = 'empty';
                $no_antrian = '0-000';
            }

            event(new ActionEvent(true));
            return response()->json(['status' => $status, 'no_antrian' => $no_antrian, 'id' => $id], 200);
        } else if ($request->req == 'set-call') {
            $result = Customer::where('id', $request->customer_id)->first();
            $result->status = 'calling';
            $result->save();

            $cek_antrian = Antrian::where('status', 'calling')->first();

            if (!$cek_antrian) $status = 'calling';
            else $status = 'waiting';

            $antrian = new Antrian;
            $antrian->loket_id = $request->loket_id;
            $antrian->no_antrian = $result->no_antrian;
            $antrian->status = $status;
            $antrian->save();

            event(new ActionEvent(true));
        } else if ($request->req == 'cek-antrian') {
            event(new ActionEvent(true));
            $cek_antrian = Antrian::where('loket_id', $request->loket_id)->first();
            if (!$cek_antrian) 
                return response()->json(['status' => null], 200);
            else
                return response()->json(['status' => $cek_antrian->status], 200);
        } else if ($request->req == 'update-status') {
            $update = Customer::where('no_antrian', $request->no_antrian)->first();
            $update->status = 'finish';
            $update->save();

            $delete = Antrian::where('no_antrian', $request->no_antrian)->first();
            $delete->delete();
            event(new ActionEvent(true));
        } else if ($request->req == 'call-antrian') {
            $no_antrian = $request->no_antrian;
            $loket_id = $request->loket_id;
            event(new CallingEvent($no_antrian, $loket_id));
            event(new ActionEvent(true));
        } else if ($request->req == 'pause-antrian') {
            $result = Customer::where('id', $request->customer_id)->first();
            $result->loket_id = null;
            $result->status = 'waiting';
            $result->save();
            event(new ActionEvent(true));
        } else if ($request->req == 'skip-antrian') {
            $cstm = Customer::where('no_antrian', $request->no_antrian)->first();
            $delete = Antrian::where('no_antrian', $cstm->no_antrian)->first();
            $delete->delete();
            
            if ($cstm->kategori == 'umum') {
                $count = count(Customer::where('kategori', 'umum')->orWhere('kategori', 'prioritas')->get());
                $cstm->no_urut = $count + 1;
                $cstm->save();
                
                $order = Customer::where('kategori', 'umum')->orWhere('kategori', 'prioritas')->orderby('no_urut', 'asc')->get();
                $i = 1;
                foreach ($order as $update) {
                    $update->no_urut = $i;
                    $update->save();
                    echo $update->no_urut;
                    $i = $i + 1;
                }
            } else if ($cstm->kategori == 'prioritas') {
                $count = count(Customer::where('kategori', 'prioritas')->get());
                $cstm->no_urut = $count + 1;
                $cstm->save();

                $order1 = Customer::where('kategori', 'prioritas')->orderby('no_urut', 'asc')->get();
                $i = 1;
                foreach ($order1 as $update) {
                    $update->no_urut = $i;
                    $update->save();
                    $i = $i + 1;
                }

                $order2 = Customer::where('kategori', 'umum')->orderby('no_urut', 'asc')->get();
                $i = $count + 1;
                foreach ($order2 as $update) {
                    $update->no_urut = $i;
                    $update->save();
                    $i = $i + 1;
                }
            } else if ($cstm->kategori == 'bap') {
                $count = count(Customer::where('kategori', 'bap')->get());
                $cstm->no_urut = $count + 1;
                $cstm->save();

                $order = Customer::where('kategori', 'bap')->orderby('no_urut', 'asc')->get();
                $i = 1;
                foreach ($order as $update) {
                    $update->no_urut = $i;
                    $update->save();
                    $i = $i + 1;
                }
            } else if ($cstm->kategori == 'wna') {
                $count = count(Customer::where('kategori', 'wna')->get());
                $cstm->no_urut = $count + 1;
                $cstm->save();

                $order = Customer::where('kategori', 'wna')->orderby('no_urut', 'asc')->get();
                $i = 1;
                foreach ($order as $update) {
                    $update->no_urut = $i;
                    $update->save();
                    $i = $i + 1;
                }
            }
            $cstm->loket_id = null;
            $cstm->status = 'waiting';
            $cstm->save();
            event(new ActionEvent(true));
        } else if ($request->req == 'recall-antrian') {
            $update = Antrian::where('no_antrian', $request->no_antrian)->first();
            $cek = Antrian::where('status', 'calling')->first();
            if ($cek) $update->status = 'waiting';
            else $update->status = 'calling';
            $update->save();

            $no_antrian = $request->no_antrian;
            $loket_id = $request->loket_id;
            event(new CallingEvent($no_antrian, $loket_id));
            event(new ActionEvent(true));
        } else if ($request->req == 'info-antrian') {
            // Jumlah Antrian
            $layanan = $request->layanan;
            if ($layanan == 'WNI') {
                $get_prioritas = count(Customer::where('kategori', 'prioritas')->get());
                $get_umum = count(Customer::where('kategori', 'umum')->get());
                $get_jum_antr = $get_prioritas + $get_umum;
            }
            else if ($layanan == 'BAP') $get_jum_antr = count(Customer::where('kategori', 'bap')->get());
            else if ($layanan == 'WNA') $get_jum_antr = count(Customer::where('kategori', 'wna')->get());
            
            if ($get_jum_antr) $jum_antr = $get_jum_antr;
            else $jum_antr = "-";

            // Antrian Sekarang
            $get_antr_skrg = Customer::where('status', '!=', 'finish')->where('loket_id', $request->loket_id)->first();

            if ($get_antr_skrg) $antr_skrg = $get_antr_skrg->no_antrian;
            else $antr_skrg = "-";

            // Antrian Selanjutnya
            if ($layanan == 'WNI') {
                $next_prioritas = Customer::where('kategori', 'prioritas')->where('status', 'waiting')->orderby('no_urut', 'asc')->first();
                $next_umum = Customer::where('kategori', 'umum')->where('status', 'waiting')->orderby('no_urut', 'asc')->first();
                if ($next_prioritas) $get_antr_next = $next_prioritas;
                else $get_antr_next = $next_umum;
            }
            else if ($layanan == 'BAP') $get_antr_next = Customer::where('kategori', 'bap')->where('status', 'waiting')->orderby('no_urut', 'asc')->first();
            else if ($layanan == 'WNA') $get_antr_next = Customer::where('kategori', 'wna')->where('status', 'waiting')->orderby('no_urut', 'asc')->first();

            if ($get_antr_next) $antr_next = $get_antr_next->no_antrian;
            else $antr_next = "-";

            // Sisa Antrian
            if ($layanan == 'WNI') {
                $sisa_antr_prioritas = count(Customer::where('kategori', 'prioritas')->where('status', 'waiting')->get());
                $sisa_antr_umum = count(Customer::where('kategori', 'umum')->where('status', 'waiting')->get());
                $get_sisa_antr = $sisa_antr_prioritas + $sisa_antr_umum;
            }
            else if ($layanan == 'BAP') $get_sisa_antr = count(Customer::where('kategori', 'bap')->where('status', 'waiting')->get());
            else if ($layanan == 'WNA') $get_sisa_antr = count(Customer::where('kategori', 'wna')->where('status', 'waiting')->get());

            if ($get_sisa_antr) $sisa_antr = $get_sisa_antr;
            else $sisa_antr = "-";

            return response()->json(['info' => true, 'jum_antr' => $jum_antr, 'antr_skrg' => $antr_skrg, 'antr_next' => $antr_next, 'sisa_antr' => $sisa_antr], 200);
        }
    }
}
