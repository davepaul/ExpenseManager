<?php

namespace App\Http\Controllers;

use App\User;
use App\Role;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class UserController extends Controller
{
       /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function __construct()
    {
        $this->middleware('auth');
    }
    public function index()
    {

       $users =  DB::table('users')
                  ->join('roles', 'users.role_id', '=', 'roles.id')
                  ->select('users.*', 'roles.display_name')
                  ->get();

       return view('users.index', compact('users'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $roles = Role::all();
        return view('users.create', compact('roles'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        DB::table('users')->insert(
        array(
            'name'           => $request->name,
            'email'          => $request->email,
            'role_id'        => $request->role_id,
            'password'       => Hash::make("12345678"),
            'created_at'     => date("Y-m-d"),
            'updated_at'     => date("Y-m-d"),
            )
        );
        return redirect('/users')->with('success', 'user successfully added');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\user  $user
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $user = DB::table('users')
                  ->join('roles', 'users.role_id', '=', 'roles.id')
                  ->select('users.*', 'roles.display_name')
                  ->where('users.id', $id)
                  ->first();

        return view("users.delete", compact('user'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\User  $user
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $data['roles'] = Role::all();
        $data['user']  = User::findOrFail($id);
        return view("users.edit", compact('data'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\User  $user
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        DB::table('users')->where('id', $id)->update(
        array(
            'name'           => $request->name,
            'role_id'        => $request->role_id,
            'updated_at'     => date("Y-m-d"),
            )
        );

        return redirect('/users')->with('success', 'user successfully updated');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\User  $user
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $user = User::findOrFail($id);
        $user->delete();

        return redirect('/users')->with('success', 'user successfully deleted');
    }
}
