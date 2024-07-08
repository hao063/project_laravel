<?php

namespace App\Http\Controllers;

use App\Models\User;
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
        $users = User::select('id', 'name', 'email')
            ->where('name', 'LIKE', '%'.$request->search.'%')
            ->get();

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
        return redirect()->route('get.index');
    }

    public function detail(Request $request, int $id)
    {
        $user = DB::table('users')->where('id', $id)->first();
        return view('detail', ['user' => $user]);
    }

    public function update(Request $request)
    {
        $request->validate([
            'name'  => 'required',
            'email' => 'required',
        ], [
            'required' => 'Mày phải nhập',
        ]);

        DB::table('users')
            ->where('id', $request->id)
            ->update([
                'name'  => $request->name,
                'email' => $request->email,
            ]);
        return redirect()->route('get.detail', ['id' => $request->id]);
    }

    public function delete(Request $request, int $id)
    {
        DB::table('users')
            ->where('id', $id)
            ->delete();
        return redirect()->route('get.index');
    }

}