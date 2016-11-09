<?php

namespace App\Http\Controllers\Dashboard;

use Illuminate\Http\Request;
use App\Http\Requests;
use Carbon\Carbon;
use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\User;

class DashboardController extends Controller
{
	public function index()
	{
		$allUsers = User::where('role_id',1)
				->get();

		$now = Carbon::now()->toTimeString();

		return view('dashboard.index')->with([
				'users' => $allUsers,
				'now' => $now,
		]);
	}

	public function deleteUser($id)
	{
		User::where('id',$id)
				->delete();
		return redirect('/admin');
	}
}