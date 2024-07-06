<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class TestController extends Controller
{

    private Request $request;

    public function __construct(Request $request)
    {
        $this->request = $request;
    }

    public function index(Request $request)
    {
        // Query Builder
        $users = DB::table('users')->select('name', 'email')->get()->toArray();
        return view('main', ['users' => $users]);
    }

    public function create(Request $request)
    {
        $request->validate([
            'name'     => ['required'],
            'email'    => ['required'],
            'password' => ['required'],
        ], []);
        $data = $request->only('name', 'email', 'password');
        DB::table('users')->insert($data);
        return redirect()->route('get.test');
    }


}