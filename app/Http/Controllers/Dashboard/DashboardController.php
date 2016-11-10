<?php

namespace App\Http\Controllers\Dashboard;

use Illuminate\Http\Request;
use App\Http\Requests;
use Carbon\Carbon;
use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\User;

class DashboardController extends Controller
{

	/*
	 * Метод отрабатывающий по умолчанию если заходит АДМИН
	 */
	public function index()
	{
		/*
		 * Выбираем всех пользователей с ролью "ЮЗЕР"
		 */
		$allUsers = User::where('role_id',1)
				->get();
		/*
		 * Формируем текущую метку времени
		 */
		$now = Carbon::now()->toTimeString();

		return view('dashboard.index')->with([
				'users' => $allUsers,
				'now' => $now,
		]);
	}

	/*
	 * Метод для удаления пользователя
	 */
	public function deleteUser($id)
	{
		User::where('id',$id)
				->delete();
		return redirect('/admin');
	}
}
