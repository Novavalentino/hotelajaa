<?php

namespace App\Http\Controllers;

use App\Models\reservation;
use Illuminate\Http\Request;

class reservationController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $reservation = reservation::all();
  
        return view('reservation.index',compact('reservation'))
            ->with('i', (request()->input('page', 1) - 1) * 5);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('reservation.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            
            'guestname' => 'required',
            'checkindate' => 'required',
            'checkoutdate' => 'required',
        ]);
  
        reservation::create($request->all());
   
        return redirect()->route('reservation.index')
                        ->with('success','Berhasil Menyimpan !');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\reservation  $reservation
     * @return \Illuminate\Http\Response
     */
    public function show(reservation $reservation)
    {
        //    
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\reservation  $reservation
     * @return \Illuminate\Http\Response
     */
    public function edit(reservation $reservation)
    {
        return view('reservation.edit',compact('reservation'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\reservation  $reservation
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, reservation $reservation)
    {
        $request->validate([
            'guestname' => 'required',
            'checkindate' => 'required',
            'checkoutdate' => 'required',
        ]);
  
        $reservation->update($request->all());
  
        return redirect()->route('reservation.index')
                        ->with('success','Berhasil Update !');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\reservation  $reservation
     * @return \Illuminate\Http\Response
     */
    public function destroy(reservation $reservation)
    {
        $reservation->delete();
  
        return redirect()->route('reservation.index')
                        ->with('success','Berhasil Hapus !');
    
    }
}