<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\User;
use App\Models\History;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Carbon;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        // $product = Products::find($id);

        $email = Auth::user()->email;
        // $user = User::findOrFail($id);
        $user = DB::table('users')->where('email', $email)->first();

        $histories = DB::table('histories')
                ->where('email', '=', $email)
                ->get();

        return view('home', compact('user','histories'));
    }
}
