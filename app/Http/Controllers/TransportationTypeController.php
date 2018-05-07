<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\TransportationType;
use App\Rute;
use App\Transportation;

class TransportationTypeController extends Controller
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
        $transportationtype = TransportationType::paginate(4);
        return view('admin.transportationtype.index',compact('transportationtype'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $transportationtype = TransportationType::all();
        return view('admin.transportationtype.create',compact('transportationtype'));
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
        'description' => 'required',

    ]);
        $transportationtype = new TransportationType;
        $transportationtype->description = $request->description;
        
        $transportationtype->save();
        return redirect('admin/transportasitype');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $transportationtype = TransportationType::find($id);
        return view('admin.transportationtype.view',compact('transportationtype'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $transportationtype = TransportationType::find($id);
        return view('admin.transportationtype.edit',compact('transportationtype'));
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
        'description' => 'required',

    ]);
        $transportationtype = TransportationType::find($id);
        $transportationtype->description = $request->description;
        
        $transportationtype->save();
        return redirect('admin/transportasitype');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $transportationtype = TransportationType::find($id);
        $transportation = Transportation::where('transportation_type_id',$id);
        $transportationtype->delete();
        $transportation->delete();
        return redirect('admin/transportasitype');
    }
    public function search(Request $request)
    {
        $keyword = $request['keyword'];
        $transportationtype = TransportationType::where('description','LIKE',"%{$keyword}%")->paginate(5);


        return view('admin.transportationtype.index',compact(['transportationtype']));
    }
}

