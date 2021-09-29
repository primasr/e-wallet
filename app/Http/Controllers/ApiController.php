<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\History;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Carbon;

class ApiController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function getAllUser()
    {
        // $users = User::get()->toJson(JSON_PRETTY_PRINT);
        $users = User::get();
        return response($users, 200);
    }

    public function getUserByEmail($email) {
        if (User::where('email', $email)->exists()) {
            // $users = User::where('email', $email)->get()->toJson(JSON_PRETTY_PRINT);
            $users = User::where('email', $email)->get();

            return response($users, 200);
          } else {
            return response()->json([
              "message" => "User not found",
              "status" => "success",
            ], 404);
          }
    }

    public function getAllHistory()
    {
        // $users = User::get()->toJson(JSON_PRETTY_PRINT);
        $history = History::get();
        return response($history, 200);
    }

    public function getHistoryByEmail($email) {
        if (History::where('email', $email)->exists()) {
            // $users = User::where('id', $email)->get()->toJson(JSON_PRETTY_PRINT);
            $history = History::where('email', $email)->get();

            return response($history, 200);
          } else {
            return response()->json([
              "message" => "History user not found",
              "status" => "fail",
            ], 404);
          }

        //   $respon = [
        //     'status' => 'error',
        //     'message' => 'You dont have permission',
        // ];
        // return response()->json($respon, 400);  
    }

    public function transaction($email, Request $request){

        $validatedData =  $request->validate([
            'money' => 'required|numeric',
            'status' => 'required|string|max:10', // tambah atau kurang
            'description' => 'required|string|max:255',
        ]);

        if (User::where('email', $email)->exists() && History::where('email', $email)->exists()) {
            $user = User::where('email', '=', $email)->first();
            // $history = History::where('email', '=', $email)->first();

            $user_email = $user->email;

            $current_time = Carbon::now();

            $money = $validatedData['money'];
            $status = $validatedData['status'];
            $description = $validatedData['description'];

            if ($status == "kurang") {
                $user->money = $user->money - $money;
            } else if ($status == "tambah") {
                $user->money = $user->money + $money;
            }

            $user->save();

            DB::table('histories')->insert([
                'money' => $money,
                'email' => $user_email,
                'description' => $description,
                'status' => $status,
                'created_at' => $current_time->toDateTimeString(),
                'updated_at' => $current_time->toDateTimeString(),
            ]);      
    
            return response()->json([
                "message" => "records updated successfully",
                "status" => "success",
            ], 200);
            } else {
            return response()->json([
                "message" => "Payment Account not found. Please register to our website",
                "status" => "fail",
            ], 404);
            
        }
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
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
