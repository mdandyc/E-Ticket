<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use App\Rute;
use App\Costumer;
use App\Reservation;

class ReservationController extends Controller
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
        $reservation = Reservation::paginate(4);
        return view('admin.reservation.index',compact('reservation'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $rute = Rute::all();
        $costumer = Costumer::all();
        $user = User::all();
        $reservation = Reservation::all();
        return view('admin.reservation.create',compact(['rute'],['costumer'],['user'],['reservation']));
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

        'reservation_at' => 'required',
        'reservation_date' => 'required',
        'costumer_id' => 'required',
        'seat_code' => 'required',
        'rute_id' => 'required',
        'user_id' => 'required',

    ]);
        $reservation = new Reservation;

        $reservation->reservation_code = time();
        $reservation->reservation_at = $request->reservation_at;
        $reservation->reservation_date = $request->reservation_date;
        $reservation->costumer_id = $request->costumer_id;
        $reservation->seat_code = $request->seat_code;
        $reservation->rute_id = $request->rute_id;
        $reservation->user_id = $request->user_id;
        
        $reservation->save();
        return redirect('admin/reservation');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $reservation = Reservation::find($id);
        return view('admin.reservation.view',compact('reservation'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $rute = Rute::all();
        $costumer = Costumer::all();
        $user = User::all();
        $reservation = Reservation::find($id);
        return view('admin.reservation.edit',compact(['rute'],['costumer'],['user'],['reservation']));
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
        'reservation_at' => 'required',
        'reservation_date' => 'required',
        'costumer_id' => 'required',
        'seat_code' => 'required',
        'rute_id' => 'required',
        'user_id' => 'required',

    ]);
        $reservation = Reservation::find($id);
        $reservation->reservation_at = $request->reservation_at;
        $reservation->reservation_date = $request->reservation_date;
        $reservation->costumer_id = $request->costumer_id;
        $reservation->seat_code = $request->seat_code;
        $reservation->rute_id = $request->rute_id;
        $reservation->user_id = $request->user_id;
        
        $reservation->save();
        return redirect('admin/reservation');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $reservation = Reservation::find($id);
        $reservation->delete();

        return redirect('admin/reservation');
    }
    public function search(Request $request)
    {
        $keyword = $request['keyword'];

        $reservation = Reservation::whereHas('rute', function($query) use($keyword) {
        $query->where('rute_to', 'LIKE', "%{$keyword}%")->orWhere('rute_form', 'LIKE', "%{$keyword}%")->orWhere('price', 'LIKE', "%{$keyword}%");
        })->orWhereHas('user', function($query) use($keyword) {
        $query->where('username', 'LIKE', "%{$keyword}%")->orWhere('name', 'LIKE', "%{$keyword}%")->orWhere('email', 'LIKE', "%{$keyword}%");
        })->orWhere('reservation_code','LIKE',"%{$keyword}%")->orWhere('reservation_at','LIKE',"%{$keyword}%")->orWhere('reservation_date','LIKE',"%{$keyword}%")->orWhere('seat_code','LIKE',"%{$keyword}%")->paginate(4);


        //$keyword = $request['keyword'];
        // $rute = Rute::where('rute_from','LIKE',"%{$keyword}%")
        // ->paginate(100);

        return view('admin.reservation.index',compact(['reservation']));
    }
}
