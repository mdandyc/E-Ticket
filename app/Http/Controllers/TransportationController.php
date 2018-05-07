<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Transportation;
use App\TransportationType;
use App\Rute;

class TransportationController extends Controller
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
        $transportation = Transportation::paginate(4);
        return view('admin.transportation.index',compact('transportation'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $transportation = Transportation::all();
        $transportationtype = TransportationType::all();
        return view('admin.transportation.create',compact(['transportation'],['transportationtype']));
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
        'code' => 'required',
        'description' => 'required',
        'seat_qty' => 'required',
        'transportation_type_id' => 'required',

    ]);
        $transportation = new Transportation;
        $transportation->code = $request->code;
        $transportation->description = $request->description;
        $transportation->seat_qty = $request->seat_qty;
        $transportation->transportation_type_id = $request->transportation_type_id;
        
        $transportation->save();
        return redirect('admin/transportasi');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $transportation = Transportation::find($id);
        return view('admin.transportation.view',compact('transportation'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $transportation = Transportation::find($id);
        $transportationtype = TransportationType::all();
        return view('admin.transportation.edit',compact(['transportation'],['transportationtype']));
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
        'code' => 'required',
        'description' => 'required',
        'seat_qty' => 'required',
        'transportation_type_id' => 'required',

    ]);
        $transportation = Transportation::find($id);
        $transportation->code = $request->code;
        $transportation->description = $request->description;
        $transportation->seat_qty = $request->seat_qty;
        $transportation->transportation_type_id = $request->transportation_type_id;
        
        $transportation->save();
        return redirect('admin/transportasi');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $transportation = Transportation::find($id);
        $rute = Rute::where('transportation_id',$id);
        $transportation->delete();
        $rute->delete();
        return redirect('admin/transportasi');
    }
    public function search(Request $request)
    {
        $keyword = $request['keyword'];
       

        $transportation = Transportation::whereHas('transportationtype', function($query) use($keyword) {
        $query->where('description', 'LIKE', "%{$keyword}%");
        })->orWhere('code','LIKE',"%{$keyword}%")->orWhere('description','LIKE',"%{$keyword}%")->orWhere('seat_qty','LIKE',"%{$keyword}%")->paginate(6);

        return view('admin.transportation.index',compact(['transportation']));
    }
}
