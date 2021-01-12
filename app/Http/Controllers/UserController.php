<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use URL;
use App\User;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $categories= Category::all();
        return 'this is list user page';
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $categories= Category::all();
        return redirect()->route('users.index');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //code validate data
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(User $user)
    {
        // dd($user);
        // $user = App\User::find($id);// select * from users where id=1 limit 1;
        return view('users.show', compact('user'));
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
    public function destroy($id)
    {
        //
    }
    public function forgotPass(){
        return view('forgot-pass');
    }
    public function sendEmailResetPass(Request $request, $id){
        $email = $request->email;
        //query ktra email cos trong DB 
        //taoj link reset pass
        // $link = URL::temporarySignedRoute('users.reset-pass',\Carbon\Carbon::now()->addMinute(1), $id);
        // dd($link);
        return redirect()->back()->with(['error' => 'validate fails']);
    }

    public function resetPass(Request $request , $id){
        return view('reset-pass');
    }
}
