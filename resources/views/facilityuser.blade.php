<link href="{{ asset('css/button.css') }}" rel="stylesheet" type="text/css" >
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

                    <table class="table table-hover">
                      <thead>
                        <tr>
                          <th scope="col">No</th>
                          <th scope="col">Facility</th>
                          <th scope="col">Description</th>
                        </tr>
                      </thead>
                      <tbody>
                        @foreach ($data as $item)
                        <tr>
                          <th scope="row">{{ $item->id }}</th>
                          <td>{{ $item->facilityname }}</td>
                          <td>{{ $item->description }}</td>
                          
                        </tr>
                        @endforeach
                      </tbody>
                    </table>

                    
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
