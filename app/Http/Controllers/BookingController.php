<?php

namespace App\Http\Controllers;

use App\Models\booking;
use App\Models\roomtype;
use Illuminate\Http\Request;

class BookingController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $booking = booking::all();
        $roomtypes = Roomtype::all();
  
        return view('booking.index',compact('booking', 'roomtypes'))
            ->with('i', (request()->input('page', 1) - 1) * 5);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
              
        return view('booking.create', compact('roomtypes'));
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
            
            'bookername' => 'required',
            'email' => 'required',
            'phonenumber' => 'required',
            'guestname' => 'required',
            'roomtype' => 'required',
        ]);
  
        booking::create($request->all());
   
        return redirect('/dashboard/myprofile')->with('success', 'Booking Success! To View Booking Details, please Go To Profile');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\booking  $booking
     * @return \Illuminate\Http\Response
     */
    public function show(booking $booking)
    {
        //    
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\booking  $booking
     * @return \Illuminate\Http\Response
     */
    public function edit(booking $booking)
    {
        return view('booking.edit',compact('booking'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\booking  $booking
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, booking $booking)
    {
        $request->validate([
            'bookingname' => 'required',
            'description' => 'required',
        ]);
  
        $booking->update($request->all());
  
        return redirect()->route('booking.index')
                        ->with('success','Berhasil Update !');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\booking  $booking
     * @return \Illuminate\Http\Response
     */
    public function destroy(booking $booking)
    {
        $booking->delete();
  
        return redirect()->route('booking.index')
                        ->with('success','Berhasil Hapus !');
    
    }
}