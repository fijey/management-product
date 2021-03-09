<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\RequestRegister;
use App\Http\Requests\RequestLogin;
use App\Models\User;
use Auth;
class AuthController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('auth.login');
    }

    public function register() 
    {
        return view('auth.register');
    }

    public function registerstore(RequestRegister $request) {
        
        $user = User::create($request->validated());
        $user->password = bcrypt($request->password);
        $user->update();

        return redirect('/login')->with('success', 'Registered Success');
        

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
    public function store(RequestLogin $request)
    {
        if (Auth::guard('web')->attempt($request->only('email', 'password'))) {
            
            return redirect('/dashboard');
       }

       return redirect('/login')->with('statusLogin', 'Email/Katasandi Salah');

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
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
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
    public function destroy()
    {
       Auth::logout();
    
        return redirect('/login');
    }
}
