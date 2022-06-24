<link href="{{ asset('css/button.css') }}" rel="stylesheet" type="text/css" >
<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Dashboard Receptionist') }}
        </h2>
    </x-slot>
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">

                    <table class="table table-hover">
                      <thead>
                        <tr>
                          <th scope="col">No</th>
                          <th scope="col">Booker Name</th>
                          <th scope="col">Email</th>
                          <th scope="col">Phone Number</th>
                          <th scope="col">Guest Name</th>
                          <th scope="col">Room Type</th>
                          <th scope="col">Check In Date</th>
                        </tr>
                      </thead>
                      <tbody>
                        @foreach ($booking as $item)
                        <tr>
                          <th scope="row">{{ $item->id }}</th>
                          <td>{{ $item->bookername}}</td>
                          <td>{{ $item->email}}</td>
                          <td>{{ $item->phonenumber }}</td>
                          <td>{{ $item->guestname }}</td>
                          <td>{{ $item->roomtype }}</td>
                          <td>{{ $item->created_at }}</td>
                          
                        </tr>
                        @endforeach
                      </tbody>
                    </table>

                    
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
