@extends('layouts.master')
  
@section('content')
    <div class="row">
        <div class="col-lg-12 margin-tb">
            <div class="pull-left">
                <h2>Add new</h2>
            </div>
            <div class="pull-right">
                <a class="btn btn-primary" href="{{ route('dashboard') }}"> Back</a>
            </div>
        </div>
    </div>
    <br>  
    @if ($errors->any())
        <div class="alert alert-danger">
            <strong>Whoops!</strong> There were some problems with your input.<br><br>
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif
        
    <form action="{{ route('booking.store') }}" method="POST" enctype="multipart/form-data">
        @csrf
        
        <div class="row">
            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                    <strong>Booking</strong>
                    <input type="hidden" name="bookername" class="form-control" value="{{ auth()->user()->name }}">
                    <input type="text" name="email" class="form-control" placeholder="email"><br>
                    <input type="text" name="phonenumber" class="form-control" placeholder="phone number"><br>
                    <input type="text" name="guestname" class="form-control" placeholder="guest name"><br>
                    <select class="form-control" name="roomtype">
                    @foreach($roomtypes as $roomtype)
                    <option value="{{$roomtype->roomtype}}">{{$roomtype->roomtype}}</option>
                    @endforeach
                </select>
                </div>
            </div>
            <div class="col-xs-12 col-sm-12 col-md-12 text-center">
                    <button type="submit" class="btn btn-primary">Submit</button>
            </div>
        </div>
        
    </form>
    
@endsection