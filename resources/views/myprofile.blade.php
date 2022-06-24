<link href="{{ asset('css/button.css') }}" rel="stylesheet" type="text/css" >
<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Dashboard for user') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">
                    You're logged in as a User! <br>
                    your name is: {{Auth::user()->name}} <br>
                    yur email addrress: {{Auth::user()->email}} 
                    <br>
                    <div class="alert alert-dark" role="alert">
                      Pesanan mu:
                    </div>                    
                    <table class="table table-hover">
                        <thead>
                          <tr>
                            <th scope="col">Booker Name</th>
                            <th scope="col">Email</th>
                            <th scope="col">Phone Number</th>
                            <th scope="col">Guest Name</th>
                            <th scope="col">Room Type</th>
                          </tr>
                        </thead>
                        <tbody>
                          @foreach ($bookings as $booking)
                          <tr>
                            <td>{{ $booking->bookername }}</a></td>
                            <td>{{ $booking->email}}</td>
                            <td>{{ $booking->phonenumber }}</td>
                            <td>{{ $booking->guestname }}</td>
                            <td>{{ $booking->roomtype }}</td>
                            
                          </tr>
                          @endforeach
                        </tbody>
                      </table>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
