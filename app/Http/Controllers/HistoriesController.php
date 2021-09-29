<?php

namespace App\Http\Controllers;

use App\Models\History;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
use App\Models\User;
use Illuminate\Support\Facades\DB;

class HistoriesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\History  $history
     * @return \Illuminate\Http\Response
     */
    public function show(History $history)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\History  $history
     * @return \Illuminate\Http\Response
     */
    public function edit(History $history)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\History  $history
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, History $history)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\History  $history
     * @return \Illuminate\Http\Response
     */
    public function destroy(History $history)
    {
        //
    }

    public function add_money($email, Request $request){

        $this->validate($request, [            
            'money' => ['required', 'numeric'],
        ]);

        $current_time = Carbon::now();        
        
        $user = User::where('email', '=', $email)->first();;
        // $user = DB::table('users')->where('email', $email)->first();

        $user_money = $user->money;
        $user_email = $user->email;

        $user->money = $user_money + $request->input('money');
        $user->updated_at = $current_time->toDateTimeString();
        $user->save();  
        
        $user = DB::table('users')->where('email', $email)->first();

        DB::table('histories')->insert([
            'money' => $request->input('money'),
            'email' => $user_email,
            'description' => 'Top Up From Website',
            'status' => 'tambah',
            'created_at' => $current_time->toDateTimeString(),
            'updated_at' => $current_time->toDateTimeString(),
        ]);
        
        return redirect()->route('home');
    }

    public function routelist(){
        return view('auth.routelist');
    }
}
