@extends('layouts.master')
  
@section('content')
    <div class="row">
        <div class="col-lg-12 margin-tb">
            <div class="pull-left">
                <h2>Edit</h2>
            </div>
            <div class="pull-right">
                <a class="btn btn-primary" href="{{ route('facility.index') }}"> Back</a>
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
        
    <form action="{{ route('facility.update',$facility->id) }}" method="POST" enctype="multipart/form-data"> 
        @csrf

        @method('PUT')
        
        <div class="row">
            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                    <strong>Facility</strong>
                    <input type="text" name="facilityname" class="form-control" placeholder="facility" value="{{$facility->facility}}"><br>
                    <input type="text" name="description" class="form-control" placeholder="description" value="{{$facility->description}}">
                </div>
            </div>
            <div class="col-xs-12 col-sm-12 col-md-12 text-center">
                    <button type="submit" class="btn btn-primary">Submit</button>
            </div>
        </div>
        
    </form>
@endsection