<?php

namespace App\Http\Controllers\Api;

use Illuminate\Http\Request;
use App\User;
use App\Day;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use Carbon\Carbon;

class AjaxController extends Controller
{

	public function start(Request $request)
	{
		$data = $request->all();

		$user = User::where('id',$data['id'])
				->get();
		$day = Carbon::now()->toFormattedDateString();
		$now = Carbon::now('Europe/Kiev')->toTimeString();

		Day::create([
				'time_begin' => $now,
				'day' => $day,
				'user_id' => $user[0]['id']
		]);

		return response()->json([
				'time' => $now
		]);
	}

    public function comment(Request $request)
    {

	    $data = $request->all();

		$user = User::where('id',$data['id'])
				->get();

	    $now = Carbon::now('Europe/Kiev')->toTimeString();

	    return response()->json([
			    'user' => $user[0]['name'],
		        'now' => $now
	    ]);
    }

}
