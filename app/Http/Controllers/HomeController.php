<?php

namespace App\Http\Controllers;
use Auth;
use App\User;
use Illuminate\Http\Request;

use Illuminate\Support\Facades\DB;

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
        // $users = DB::table('users')->get();
        $users = User::where('id', '!=', auth()->id())->get();
        return view('home', ['users' => $users]);
    }
    public function request(Request $request)
    {
        $data = $request->all();
        $senderid = Auth::user()->id;
        $reciverid = $data['id'];
        // dd($senderid);

        DB::table('friend_request')->insert([
            ['sender_id' => $senderid,
             'reciver_id' => $reciverid,
             'status'     => 0,
             'created_at' => DB::raw('CURRENT_TIMESTAMP'),
             'updated_at' => DB::raw('CURRENT_TIMESTAMP')
            ],
        ]);

        return response()->json(['response' => 'Request Sent!', 'msg' => 'true', 'data' => $reciverid]);
    }
}
