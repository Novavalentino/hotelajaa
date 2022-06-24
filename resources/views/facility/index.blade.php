                    @extends('layouts.master')
     
@section('content')
    <div class="row">
        <div class="col-lg-12 margin-tb">
            <div class="pull-left">
                <h2>Facility</h2>
            </div>
            <div class="pull-right">
                <a class="btn btn-primary" href="{{ route('dashboard') }}"> Back</a>
                <a class="btn btn-success" href="{{ route('facility.create') }}"> Create</a>
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
            <th>Facility Name</th>
            <th>Description</th>
            <th width="280px">Action</th>
        </tr>
        @foreach ($facility as $facility)
        <tr>
            <td>{{ ++$i }}</td>
            <td>{{ $facility->facilityname }}</td>
            <td>{{ $facility->description }}</td>
            <td>
                <form action="{{ route('facility.destroy',$facility->id) }}" method="POST">
           
                    <a class="btn btn-primary" href="{{ route('facility.edit',$facility->id) }}">Edit</a>
     
                    @csrf
                    @method('DELETE')
        
                    <button type="submit" class="btn btn-danger">Delete</button>
                </form>
            </td>
        </tr>
        @endforeach
    </table>
    
    {{-- {!! $facility->links() !!} --}}
        
@endsection

