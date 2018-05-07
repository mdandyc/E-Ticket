<?php

namespace App\Http\Controllers\User;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Reservation;
use App\Costumer;
use App\Transportation;
use Auth;

class ReservationController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $reservation = Reservation::where('user_id','=',Auth::user()->username)->paginate(4);
        $costumer = Costumer::all();
        $transportation = Transportation::all();
        return view('user.reservation.index',compact(['reservation'],['costumer'],['transportation']));
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
    public function store(Request $request)
    {
        $this->validate($request, [

        'costumer_id' => 'required',
        'rute_id' => 'required',
        'user_id' => 'required',

    ]);
        $reservation = new Reservation;

        $reservation->reservation_code = time();
        $reservation->reservation_at = date('h:i:s');
        $reservation->reservation_date = date('d-m-y');
        $reservation->costumer_id = $request->costumer_id;
        $reservation->seat_code = rand(0,20);
        $reservation->rute_id = $request->rute_id;
        $reservation->user_id = $request->user_id;
        
        $reservation->save();
        return redirect('/user/reservation');
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
    public function destroy($id)
    {
        //
    }
}
