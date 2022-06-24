<?php

namespace App\Http\Controllers;

use App\Models\facility;
use App\Models\roomtype;
use App\Models\booking;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class DashboardController extends Controller
{
    public function index(){
        if(Auth::user()->hasRole('user')){
            return view('userdash');
        }elseif(Auth::user()->hasRole('resepsionis')){
            return view('resepsionisdash');
        }elseif(Auth::user()->hasRole('admin')){
            return view('dashboard');
        }
    }


    public function myprofile(){
        $bookings = booking::where('bookername', Auth::user()->name)->latest()->paginate(5);
        return view('myprofile', compact('bookings'));
    }
    

    public function facility(){
        return view('Facility');
    }

    public function roomtype(){
        return view('roomtype');
    }
    public function reservation(){
        $booking = booking::all();
        return view('reservation', compact('booking'));
    }
    
    public function roomuser(){
        $data = roomtype::all();
        return view('roomuser', compact('data'));
    }

    public function facilityuser(){
        $data = facility::all();
        return view('facilityuser', compact('data'));
    }

    public function booking(){
        return view('booking');
    }
}
