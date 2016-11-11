<?php

	/*
	|--------------------------------------------------------------------------
	| Application Routes
	|--------------------------------------------------------------------------
	|
	| Here is where you can register all of the routes for an application.
	| It's a breeze. Simply tell Laravel the URIs it should respond to
	| and give it the controller to call when that URI is requested.
	|
	*/

	/*
	 * Запуск аутентификации пользователя
	 */
	Route::auth();

	/*
	 * Программа пропускает только аутентифицированных пользователей.
	 */
	Route::group(['middleware' => ['auth']], function () {
		/*
		 * Маршруты доступные пользователям с ролью АДМИН
		 */
		Route::group([
				'middleware' => ['admin'],
				'prefix'     => 'admin'
		], function () {
			/*
			 * Дефолтная страничка админа с пользователями
			 */
			Route::get('/', 'Dashboard\DashboardController@index');
			/*
			 * Маршрут для удаления пользователя (без AJAX)
			 */
			Route::get('/del/{id}', 'Dashboard\DashboardController@deleteUser');
			/*
			 * Регистрируем нового пользователя (без проверки на валидность)
			 */
			Route::post('/register', 'Auth\AuthController@registerUser');
		});

		/*
		 * Маршруты доступные польщователям с ролью ЮЗЕР
		 */
		Route::group(['middleware' => ['user']], function () {
			/*
			 * Дефолтная отработка для юзера
			 */
			Route::get('/', 'DefaultController@index');
			/*
			 * Профиль пользователя
			 */
			Route::get('/home', 'HomeController@index');
			/*
			 * Маршрут который AJAX-ом делает отметку насчет начала работы
			 */
			Route::post('/startWork', 'Api\AjaxController@start');
			/*
			 * Маршрут который принимает AJAX-запрос насчет перерыва в работе
			 */
			Route::post('/sentComment', 'Api\AjaxController@comment');
			/*
			 * Маршрут который принимает AJAX-запрос об окончании перерыва в работе
			 */
			Route::post('/endOfRest', 'Api\AjaxController@endRest');
			/*
			 * Маршрут который принимает AJAX-запрос об окончании окончании рабочего дня			 */
			Route::post('/end', 'Api\AjaxController@endOfDay');
		});

	});
