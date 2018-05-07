<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use App\Costumer;
use Illuminate\Support\Facades\Input;

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
        $user = User::paginate(4);
        return view('admin.user.index',compact('user'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $user = User::all();
        return view('admin.user.create',compact('user'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request, [ 
            'username' => 'required|max:255|unique:users',
            'name' => 'required|max:255',
            'level' => 'required',
            'email' => 'required|email|max:255|unique:users',
            'password' => 'required|min:6|confirmed',
    ]);

        $user = new User;
        $user->username = Input::get('username');
        $user->name = Input::get('name');
        $user->level = Input::get('level');
        $user->email = Input::get('email');
        $user->password = Input::get('password');

        $user->save();

        $costumer = new Costumer;
        $costumer->name = Input::get('name');
        $costumer->address = Input::get('address');
        $costumer->phone = Input::get('phone');
        $costumer->gender = Input::get('gender');
        $costumer->user_id = Input::get('username');

        $costumer->save();

        return redirect('admin/user');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $user = User::find($id);
        return view('admin.user.edit',compact(['role'],['user']));
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
        $this->validate($request, [
            'username' => 'required|max:255',
            'name' => 'required|max:255',
            'level' => 'required',
            'email' => 'required|email|max:255',
            'password' => 'required|min:6|confirmed',
    ]);

        $user = User::find($id);
        $user->username = Input::get('username');
        $user->name = Input::get('name');
        $user->level = Input::get('level');
        $user->email = Input::get('email');
        $user->password = Input::get('password');

        $user->save();
        return redirect('admin/user');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $user = User::find($id);
        $user->delete();
        return redirect('admin/user');
    }
    public function search(Request $request)
    {
        $keyword = $request['keyword'];
        $user = User::where('username','LIKE',"%{$keyword}%")->orWhere('name','LIKE',"%{$keyword}%")->orWhere('email','LIKE',"%{$keyword}%")->orWhere('level','LIKE',"%{$keyword}%")->paginate(4);


        return view('admin.user.index',compact(['user']));
    }
}
