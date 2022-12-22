<!-- customer room booking list  -->

<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('My BOOKINS') }}
        </h2>
    </x-slot>
    @if (\Session::has('success'))
    <div class="alert alert-success">
        <ul>
            <li>{!! \Session::get('success') !!}</li>
        </ul>
    </div>
@endif

    <div class="container my-3" id="my-reservations-div">
        <h4 class="h3 font-weight-bold">MY BOOKINGS</h4>
        <div class="card">
        <div class="card-content">
        <table id="myReservationsTbl" class="table table-striped" cellspacing="0" width="100%">
            <thead>
                <tr>
                    <th>Owner Name</th>
                    <th>Contact</th>
                    <th scope="col">Start date</th>
                    <th scope="col">End date</th>
                    <th scope="col">Room type</th>
                    <th scope="col">Rent Per Day</th>
                    <th scope="col">Adults</th>
                    <th scope="col">Children</th>
                    <th scope="col">Status</th>
                </tr>
            </thead>
            <tbody>
                @foreach($book as $book)

                <tr><td>{{$book->name}}</td>
                <td>{{$book->mobile}}</td>
                    <td>{{$book->start_date}}</td>
                    <td>{{$book->end_date}}</td>
                    <td>{{$book->type}}</td>
                    <td>{{$book->rent}}</td>
                    <td>{{$book->adults}}</td>
                    <td>{{$book->children}}</td>
                   
                    @if($book->books_status == 'PENDING')
                        <td> <span class="badge bg-danger">{{$book->books_status}}</span></td>
                        @else
                        <td> <span class="badge bg-success">{{$book->books_status}}</span></td>
                        @endif
                  
                   

                </tr>

                @endforeach

            </tbody>
        </table>
        </div>
        </div>
    </div>
   
</x-app-layout>