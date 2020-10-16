<?php

namespace App\Http\Controllers;

use App\User;
use App\loket;
use App\Antrian;
use App\Customer;
use App\Events\DemoEvent;
use App\Events\FinishEvent;

use Illuminate\Http\Request;

class myDisplayController extends Controller
{
    // Config Admin
	public function admin_config(Request $request)
	{
		if ($request->req == 'admin-config') {
			$loket = count(loket::all());
			$user = count(User::where('role', 'user')->get());
			$antrian = count(Customer::all());

			$meja1 = count(Customer::where('loket_id', 1)->get());
			$meja2 = count(Customer::where('loket_id', 2)->get());
			$meja3 = count(Customer::where('loket_id', 3)->get());
			$meja4 = count(Customer::where('loket_id', 4)->get());
			$meja5 = count(Customer::where('loket_id', 5)->get());
			$meja6 = count(Customer::where('loket_id', 6)->get());

			return response()->json(['loket' => $loket, 'user' => $user, 'antrian' => $antrian, 'meja1' => $meja1, 'meja2' => $meja2, 'meja3' => $meja3, 'meja4' => $meja4, 'meja5' => $meja5, 'meja6' => $meja6], 200);
		} else if ($request->req == 'reset-antrian') {
            Customer::truncate();
            Antrian::truncate();
        }
	}

    // Config Display
	public function display_config(Request $request)
	{
		if ($request->req == 'get-data') {
			$get_loket = Antrian::where('status', 'calling')->first();
			$get_loket1 = Customer::where('loket_id', 1)->where('status', '!=', 'waiting')->where('status', '!=', 'finish')->first();
			$get_loket2 = Customer::where('loket_id', 2)->where('status', '!=', 'waiting')->where('status', '!=', 'finish')->first();
			$get_loket3 = Customer::where('loket_id', 3)->where('status', '!=', 'waiting')->where('status', '!=', 'finish')->first();
			$get_loket4 = Customer::where('loket_id', 4)->where('status', '!=', 'waiting')->where('status', '!=', 'finish')->first();
			$get_loket5 = Customer::where('loket_id', 5)->where('status', '!=', 'waiting')->where('status', '!=', 'finish')->first();
			$get_loket6 = Customer::where('loket_id', 6)->where('status', '!=', 'waiting')->where('status', '!=', 'finish')->first();

			if ($get_loket1) $loket1 = $get_loket1->no_antrian;
			else $loket1 = "-";

			if ($get_loket2) $loket2 = $get_loket2->no_antrian;
			else $loket2 = "-";

			if ($get_loket3) $loket3 = $get_loket3->no_antrian;
			else $loket3 = "-";

			if ($get_loket4) $loket4 = $get_loket4->no_antrian;
			else $loket4 = "-";

			if ($get_loket5) $loket5 = $get_loket5->no_antrian;
			else $loket5 = "-";

			if ($get_loket6) $loket6 = $get_loket6->no_antrian;
			else $loket6 = "-";

			return response()->json(['loket1' => $loket1, 'loket2' => $loket2, 'loket3' => $loket3, 'loket4' => $loket4, 'loket5' => $loket5, 'loket6' => $loket6], 200);
		} else if ($request->req == 'calling') {
			$get_next = Antrian::where('status', 'waiting')->orWhere('status', 'calling')->first();
			if ($get_next) $next = true;
			else $next = false;

			$call = Antrian::where('status', 'calling')->first();
			if ($call) {
				$kd = substr($call->no_antrian, 0, 1);
				$no1 = str_replace("-00", "", substr($call->no_antrian, 1));
				$no2 = str_replace("-0", "", substr($call->no_antrian, 1));

				if ($no1 == substr($call->no_antrian, 1)) $no = $no2;
				else $no = $no1;

				return response()->json(['voice' => true, 'kode' => $kd, 'nomor' => $no, 'meja' => $call->loket_id, 'no_antrian' => $call->no_antrian, 'loket' => $call->loket_id, 'next' => $next], 200);
			} else {
				return response()->json(['voice' => null, 'kode' => null, 'nomor' => null, 'meja' => null, 'no_antrian' => '0-000', 'loket' => 1, 'next' => null], 200);
			}
		} else if ($request->req == 'update') {
			// Update
			$update = Antrian::where('status', 'calling')->first();
			$update->status = 'finish';
			$update->save();

			$set_call = Antrian::where('status', 'waiting')->first();
			if ($set_call) {
				$set_call->status = 'calling';
				$set_call->save();
			}
		} else if ($request->req == 'finish') {
			event(new FinishEvent($request->req, $request->loket_id));
		}
	}

	public function test_pusher(Request $request)
	{
		event(new DemoEvent($request->message));

		return [
			'message' => $request->message
		];
	}
}
