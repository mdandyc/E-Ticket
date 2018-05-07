<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Rute;
use App\Transportation;
use App\Reservation;
use App\Costumer;

class RuteController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function __construct()
    {
        $this->middleware('auth')->except('home','search');
    }
    public function index()
    {
        $rute = Rute::paginate(4);
        return view('admin.rute.index',compact('rute'));
    }
    public function home()
    {
        $rute = Rute::paginate(6);
        return view('welcome',compact('rute'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $rute = Rute::all();
        $transportation = Transportation::all();
        return view('admin.rute.create',compact(['rute'],['transportation']));
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
        'depart_at' => 'required',
        'rute_form' => 'required',
        'rute_to' => 'required',
        'price' => 'required',
        'transportation_id' => 'required',

    ]);
        $rute = new Rute;
        $rute->depart_at = $request->depart_at;
        $rute->rute_form = $request->rute_form;
        $rute->rute_to = $request->rute_to;
        $rute->price = $request->price;
        $rute->transportation_id = $request->transportation_id;
        
        $rute->save();
        return redirect('admin/rute');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $rute = Rute::find($id);
        return view('admin.rute.view',compact('rute'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $rute = Rute::find($id);
        $transportation = Transportation::all();
        return view('admin.rute.edit',compact(['rute'],['transportation']));
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
        'depart_at' => 'required',
        'rute_form' => 'required',
        'rute_to' => 'required',
        'price' => 'required',
        'transportation_id' => 'required',

    ]);
        $rute = Rute::find($id);
        $rute->depart_at = $request->depart_at;
        $rute->rute_form = $request->rute_form;
        $rute->rute_to = $request->rute_to;
        $rute->price = $request->price;
        $rute->transportation_id = $request->transportation_id;
        
        $rute->save();
        return redirect('admin/rute');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $rute = Rute::find($id);
        $reservation = Reservation::where('rute_id',$id);
        $rute->delete();

        return redirect('admin/rute');
    }
    public function search(Request $request)
    {
        $keyword = $request['keyword'];
        $ruteto = $request['rute_to'];
        $ruteform = $request['rute_form'];

        $rute = Rute::whereHas('transportation', function($query) use($keyword) {
        $query->where('transportation_type_id', 'LIKE', "%{$keyword}%");
        })->where('rute_form','LIKE',"%{$ruteform}%")->where('rute_to','LIKE',"%{$ruteto}%")->paginate(100);

        $costumer = Costumer::all();
        


        //$keyword = $request['keyword'];
        // $rute = Rute::where('rute_from','LIKE',"%{$keyword}%")
        // ->paginate(100);

        return view('search',compact(['rute'],['costumer']));
    }
    public function search2(Request $request)
    {
        $keyword = $request['keyword'];

        $rute = Rute::whereHas('transportation', function($query) use($keyword) {
        $query->where('transportation_type_id', 'LIKE', "%{$keyword}%")->orWhere('code', 'LIKE', "%{$keyword}%")->orWhere('description', 'LIKE', "%{$keyword}%");
        })->orWhere('rute_form','LIKE',"%{$keyword}%")->orWhere('rute_to','LIKE',"%{$keyword}%")->orWhere('depart_at','LIKE',"%{$keyword}%")->orWhere('price','LIKE',"%{$keyword}%")->paginate(4);


        //$keyword = $request['keyword'];
        // $rute = Rute::where('rute_from','LIKE',"%{$keyword}%")
        // ->paginate(100);

        return view('admin.rute.index',compact(['rute']));
    }
}
