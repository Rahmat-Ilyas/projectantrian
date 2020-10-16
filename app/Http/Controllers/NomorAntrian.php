<?php

namespace App\Http\Controllers;

use App\Customer;
use App\Antrian;
use App\Events\NomorAntrianEvent;

use Illuminate\Http\Request;

class NomorAntrian extends Controller
{
	public function nomor_antrian()
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
        
		return view('nomor_antrian');
	}

	public function create_antrian(Request $request)
	{
		$layanan = $request->layanan;

		$umum = Customer::where('kategori', 'umum')->first();
		$prioritas = Customer::where('kategori', 'prioritas')->first();
		$bap = Customer::where('kategori', 'bap')->first();
		$wna = Customer::where('kategori', 'wna')->first();

		if ($layanan == 'umum') {
			if (!$umum && !$prioritas) {
				$no_antrian = "A-".sprintf('%03s', 1);
				$no_urut = 1;
			} else if (!$umum && $prioritas) {
				$prioritas = Customer::where('kategori', 'prioritas')->orderby('no_urut', 'desc')->first();
				$no_urut = $prioritas->no_urut + 1;
				$no_antrian = "A-".sprintf('%03s', 1);
			} else {
				$umum = Customer::where('kategori', 'umum')->orderby('no_urut', 'desc')->first();
				$no_urut = $umum->no_urut + 1;
				$no_antrian = "A-".sprintf('%03s', count(Customer::where('kategori', 'umum')->get()) + 1);
			}
		} else if ($layanan == 'prioritas') {
			if (!$prioritas) {
				$no_antrian = "B-".sprintf('%03s', 1);
				$no_urut = 1;
			} else {
				$prioritas = Customer::where('kategori', 'prioritas')->orderby('no_urut', 'desc')->first();
				$no_urut = $prioritas->no_urut + 1;
				$no_antrian = "B-".sprintf('%03s', count(Customer::where('kategori', 'prioritas')->get()) + 1);
			}

			if ($umum) {
				$umum = Customer::where('kategori', 'umum')->orderby('no_urut', 'asc')->get();
				$i = $no_urut + 1;
				foreach ($umum as $update) {
					$update->no_urut = $i;
					$update->save();
					$i = $i + 1;
				}
			}
		} else if ($layanan == 'bap') {
			if (!$bap) {
				$no_antrian = "C-".sprintf('%03s', 1);
				$no_urut = 1;
			} else {
				$bap = Customer::where('kategori', 'bap')->orderby('no_urut', 'desc')->first();
				$no_urut = $bap->no_urut + 1;
				$no_antrian = "C-".sprintf('%03s', count(Customer::where('kategori', 'bap')->get()) + 1);
			}
		} else if ($layanan == 'wna') {
			if (!$wna) {
				$no_antrian = "D-".sprintf('%03s', 1);
				$no_urut = 1;
			} else {
				$wna = Customer::where('kategori', 'wna')->orderby('no_urut', 'desc')->first();
				$no_urut = $wna->no_urut + 1;
				$no_antrian = "D-".sprintf('%03s', count(Customer::where('kategori', 'wna')->get()) + 1);
			}
		}

		$customer = new Customer;
		$customer->no_urut = $no_urut;
		$customer->no_antrian = $no_antrian;
		$customer->kategori = $layanan;
		$customer->status = 'waiting';
		$customer->save();

		$antian = count(Customer::all());
		event(new NomorAntrianEvent($antian));

		return [
            'no_antrian' => $no_antrian
        ];
	}
}
