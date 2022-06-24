<?php

namespace App\Http\Controllers;

use App\Models\Roomtype;
use Illuminate\Http\Request;

class RoomtypeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $roomtype = Roomtype::all();
  
        return view('roomtype.index',compact('roomtype'))
            ->with('i', (request()->input('page', 1) - 1) * 5);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('roomtype.create');
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
            
            'roomtype' => 'required',
            'availableroom' => 'required',
            'facility' => 'required',
        ]);
  
        Roomtype::create($request->all());
   
        return redirect()->route('roomtype.index')
                        ->with('success','Berhasil Menyimpan !');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Roomtype  $roomtype
     * @return \Illuminate\Http\Response
     */
    public function show(Roomtype $roomtype)
    {
        //    
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Roomtype  $roomtype
     * @return \Illuminate\Http\Response
     */
    public function edit(Roomtype $roomtype)
    {
        return view('roomtype.edit',compact('roomtype'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\roomtype  $roomtype
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, roomtype $roomtype)
    {
        $request->validate([
            'roomtype' => 'required',
            'availableroom' => 'required',
            'facility' => 'required',
        ]);
  
        $roomtype->update($request->all());
  
        return redirect()->route('roomtype.index')
                        ->with('success','Berhasil Update !');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\roomtype  $roomtype
     * @return \Illuminate\Http\Response
     */
    public function destroy(Roomtype $roomtype)
    {
        $roomtype->delete();
  
        return redirect()->route('roomtype.index')
                        ->with('success','Berhasil Hapus !');
    
    }
}