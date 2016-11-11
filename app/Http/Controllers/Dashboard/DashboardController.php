<?php

	namespace App\Http\Controllers\Dashboard;

	use Illuminate\Http\Request;
	use App\Http\Requests;
	use Carbon\Carbon;
	use App\Http\Controllers\Controller;
	use Illuminate\Foundation\Auth\User;
	use Illuminate\Support\Facades\DB;

	class DashboardController extends Controller {
		/*
		 * Метод отрабатывающий по умолчанию если заходит АДМИН
		 */
		public function index() {
			/*
			 * Выбираем всех пользователей с ролью "ЮЗЕР"
			 */
			$users = User::where('role_id', 1)
					->get();
			/*
			 * Формируем текущую метку времени
			 */
			$now = Carbon::now()->toTimeString();

			$usersComments = DB::table('users')
					->join('rest', 'users.id', '=', 'rest.user_id')
					->get();

			return view('dashboard.index', compact('now', 'users', 'usersComments'));
		}

		/*
		 * Метод для удаления пользователя
		 */
		public function deleteUser($id) {
			User::findOrFail($id)->delete();

			return redirect()->to('/admin');
		}
	}