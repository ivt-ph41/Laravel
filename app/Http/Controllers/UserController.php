<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use URL;
use App\User;
use App\Http\Requests\CreateUserRequest;

class UserController extends Controller
{
    public function __construct()
    {
        // $this->middleware('is.admin')->except('index','show');
        $this->middleware('is.owner')->only('show');
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {   \DB::enableQueryLog();

        // $users = User::withTrashed()->get();
        $users = User::with('profile')->get();
        // dd($users);
        // $users = User::onlyTrashed()->get();
        // dd(\DB::getQueryLog());
        return view('users.index', compact('users'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        // $categories= Category::all();
        // return redirect()->route('users.index');
        return view('users.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(CreateUserRequest $request)
    {
        // $request->validate([
        //     'username' => 'required|max:10|min:3',
        //     // 'username' => ['required','max:10','min:3']
        //     'email' => 'required|email|unique:users,email',
        //     'gender' => 'required|integer',
        //     'phone' => 'required|string',
        //     'password' => 'required|numeric|min:6'
        // ]);
        $data =$request->all();
        $data['password'] = bcrypt($data['password']);
        User::create($data);
        return 'success';
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show( $id)
    {
        $user = User::with('profile')->find($id);
        // return response()->json($user, 200);
        // dd($user);
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
        return 'edit page';
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
        \DB::enableQueryLog();
        User::find($id)->delete();
        // User::withTrashed()->find($id)->forceDelete();
        dd(\DB::getQueryLog());
        return 'success';
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
    public function recovery(){

        $user= User::onlyTrashed()->whereIn('id', [1,2,3])->restore();
        // $user= User::withTrashed()->find($id);
        // $user->restore();
        return 'success';
    }

    public function setRole($id, $roleID)
    {
        $roleID = explode(',', $roleID);
        $user = User::find($id);
        $user->roles()->attach($roleID);
        return 'success';
    }
    public function getRoles($id)
    {
        $roles = User::find($id)->roles;
        dd($roles->toArray());
    }
    public function deleteRole($id, $roleID= null)
    {
        $roleID = $roleID ? explode(',', $roleID) : null;   
        $user = User::find($id);
        $user->roles()->detach($roleID);
        return 'success';
    }
    public function syncRole($id, $roleID)
    {
        $roleID = explode(',', $roleID);   
        $user = User::find($id);
        $user->roles()->sync($roleID);
        return 'success';
    }
}
