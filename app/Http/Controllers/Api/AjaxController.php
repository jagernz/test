<?php

namespace App\Http\Controllers\Api;

use Illuminate\Http\Request;
use App\User;
use App\Day;
use App\Rest;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use Carbon\Carbon;
use Illuminate\Support\Facades\DB;

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
	    $nowForBase = Carbon::now('Europe/Kiev');

	    $day = Day::where('day',$data['day'])
			    ->get();

	    Rest::create([
			    'comments' => $data['comment'],
			    'created_at' => $nowForBase,
			    'updated_at' => NULL,
			    'day_id' => $day[0]['id'],
		        'user_id' => $user[0]['id']
	    ]);

	    return response()->json([
			    'user' => $user[0]['name'],
		        'now' => $now
	    ]);
    }

	public function endRest(Request $request)
	{
		$data = $request->all();
		$user = User::where('id',$data['id'])
				->get();

		$now = Carbon::now('Europe/Kiev')->toTimeString();
		$nowForBase = Carbon::now('Europe/Kiev');

		Rest::where('updated_at',NULL)->update(['updated_at' => $nowForBase]);

		return response()->json([
				'user' => $user[0]['name'],
				'now' => $now
		]);
	}

	public function endOfDay(Request $request)
	{
		$data = $request->all();
		$user = User::where('id',$data['id'])
				->get();

		$now = Carbon::now('Europe/Kiev')->toTimeString();
		$nowForBase = Carbon::now('Europe/Kiev');

		Day::where('time_end','00:00:00')->update(['time_end' => $nowForBase]);

		return response()->json([
				'message' => '',
		]);
	}

}
