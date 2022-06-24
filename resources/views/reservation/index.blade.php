<link href="css/button.css" rel="stylesheet" />
<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Dashboard User') }}
        </h2>
    </x-slot>
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">
                    @extends('layout.master')
     
@section('content')
    <div class="row">
        <div class="col-lg-12 margin-tb">
            <div class="pull-left">
                <h2>Reservation</h2>
            </div>
            <div class="pull-right">
                <a class="btn btn-success" href="{{ route('reservation.create') }}"> Create</a>
            </div>
        </div>
    </div>
    <br>
    @if ($message = Session::get('success'))
        <div class="alert alert-success">
            <p>{{ $message }}</p>
        </div>
    @endif
     
    <table class="table table-bordered">
        <tr>
            <th>No</th>
            <th>Guest Name</th>
            <th>Check In Date</th>
            <th>Check Out Date</th>
            <th width="280px">Action</th>
        </tr>
        @foreach ($reservation as $reservation)
        <tr>
            <td>{{ ++$i }}</td>
            <td>{{ $reservation->reservation }}</td>
            <td>
                <form action="{{ route('reservation.destroy',$reservation->id) }}" method="POST">
           
                    <a class="btn btn-primary" href="{{ route('reservation.edit',$reservation->id) }}">Edit</a>
     
                    @csrf
                    @method('DELETE')
        
                    <button type="submit" class="btn btn-danger">Delete</button>
                </form>
            </td>
        </tr>
        @endforeach
    </table>
    
    {!! $reservation->links() !!}
        
@endsection
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
