<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Costumer;
use App\User;
class CostumerController extends Controller
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
        $costumer = Costumer::paginate(4);
        return view('admin.costumer.index',compact('costumer'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $costumer = Costumer::all();
        return view('admin.costumer.create',compact('costumer'));
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
        'name' => 'required',
        'address' => 'required',
        'phone' => 'required',
        'gender' => 'required',

    ]);
        $costumer = new Costumer;
        $costumer->name = $request->name;
        $costumer->address = $request->address;
        $costumer->phone = $request->phone;
        $costumer->gender = $request->gender;
        
        $costumer->save();
        return redirect('admin/costumer');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $costumer = Costumer::find($id);
        return view('admin.costumer.view',compact('costumer'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $costumer = Costumer::find($id);
        return view('admin.costumer.edit',compact('costumer'));
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
        'name' => 'required',
        'address' => 'required',
        'phone' => 'required',
        'gender' => 'required',

    ]);
        $costumer = Costumer::find($id);
        $costumer->name = $request->name;
        $costumer->address = $request->address;
        $costumer->phone = $request->phone;
        $costumer->gender = $request->gender;
        
        $costumer->save();
        return redirect('admin/costumer');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $costumer = Costumer::find($id);
        $user = User::where('username','=',$costumer->user_id);

        $user->delete();
        $costumer->delete();
        return redirect('admin/costumer');
    }

    public function search(Request $request)
    {
        $keyword = $request['keyword'];

        $costumer = Costumer::whereHas('user', function($query) use($keyword) {
        $query->where('username', 'LIKE', "%{$keyword}%")->orWhere('email', 'LIKE', "%{$keyword}%");
        })->orWhere('name','LIKE',"%{$keyword}%")->orWhere('address','LIKE',"%{$keyword}%")->orWhere('phone','LIKE',"%{$keyword}%")->orWhere('gender','LIKE',"%{$keyword}%")->paginate(4);
        return view('admin.costumer.index',compact(['costumer']));
    }
    
}
