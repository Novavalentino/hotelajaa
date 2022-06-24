
                    @extends('layouts.master')
     
@section('content')
    <div class="row">
        <div class="col-lg-12 margin-tb">
            <div class="pull-left">
                <h2>Room Type</h2>
            </div>
            <div class="pull-right">
                <a class="btn btn-primary" href="{{ route('dashboard') }}"> Back</a>
                <a class="btn btn-success" href="{{ route('roomtype.create') }}"> Create</a>
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
            <th>Room Type</th>
            <th>available room</th>
            <th>Facility</th>
            <th width="280px">Action</th>
        </tr>
        @foreach ($roomtype as $roomtype)
        <tr>
            <td>{{ ++$i }}</td>
            <td>{{ $roomtype->roomtype }}</td>
            <td>{{ $roomtype->availableroom }}</td>
            <td>{{ $roomtype->facility }}</td>
            <td>
                <form action="{{ route('roomtype.destroy',$roomtype->id) }}" method="POST">
           
                    <a class="btn btn-primary" href="{{ route('roomtype.edit',$roomtype->id) }}">Edit</a>
     
                    @csrf
                    @method('DELETE')
        
                    <button type="submit" class="btn btn-danger">Delete</button>
                </form>
            </td>
        </tr>
        @endforeach
    </table>
    
    {{-- {!! $roomtype->links() !!} --}}
        
@endsection

