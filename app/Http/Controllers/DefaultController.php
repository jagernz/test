<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use Illuminate\Support\Facades\DB;

use Illuminate\Support\Facades\Auth;

use App\Http\Requests;

use Carbon\Carbon;

class DefaultController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        $now = Carbon::now();
        $userAuth = Auth::user()->name;
        $user = DB::table('users')->where('name', $userAuth)->first();
	    return view('default.index')->with([
            'user' => $user,
            'now' => $now,
        ]);

    }
}
