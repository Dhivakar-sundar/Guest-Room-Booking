<!-- Admin Dashboard page -->


<x-Admin-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Admin Dashboard') }}
        </h2>
    </x-slot>
    <!-- 
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200"> -->
    <div class="card mt-4">
        <div class="card-content">
            <div class="row mx-3 my-3">
                <div class="col-xl-3 col-sm-6 mb-3">
                    <div class="card text-white bg-primary o-hidden h-100">
                        <div class="card-body">
                            <div class="card-body-icon">
                                <i class="bi bi-journal-check"></i>
                            </div>
                            <div class="text-center h3">{{count($list)}} </div>
                            <div class="h5 text-center">Booking</div>
                        </div>

                    </div>
                </div>
                <div class="col-xl-3 col-sm-6 mb-3">
                    <div class="card text-white bg-warning o-hidden h-100">
                        <div class="card-body">
                            <div class="card-body-icon">
                                <i class="bi bi-person-fill-check ml-2"></i>
                            </div>
                            <div class="h3 text-center"> {{count($customer)}}</div>
                            <div class="h5 text-center"> Customers</div>
                        </div>
                        <a class="card-footer text-white clearfix small z-1" href="{{route('admin_customer')}}">
                            <span class="float-left">View Details</span>
                            <span class="float-right"><i class="fa fa-angle-right"></i></span>
                        </a>
                    </div>
                </div>
                <div class="col-xl-3 col-sm-6 mb-3">
                    <div class="card text-white bg-success o-hidden h-100">
                        <div class="card-body">
                            <div class="card-body-icon">
                                <i class="bi bi-check-circle"></i>
                            </div>
                            <div class="text-center h3">{{count($confirm)}}</div>
                            <div class="h5 text-center"> Confirmed Booking</div>
                        </div>
                        <div class="card-footer text-white clearfix small z-1"></div>
                    </div>
                </div>
                <div class="col-xl-3 col-sm-6 mb-3">
                    <div class="card text-white bg-danger o-hidden h-100">
                        <div class="card-body">
                            <div class="card-body-icon">
                                <i class="bi bi-exclamation-triangle-fill"></i>
                            </div>

                            <div class="text-center h3">{{count($pending)}}</div>
                            <div class="text-center h5"> Pending Booking</div>

                        </div>
                        <div class="card-footer text-white clearfix small z-1"></div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- </div>
            </div>
        </div>
    </div> -->


    <div class="container mt-4">

        <div class="card">
            <div class="card-content">
                <table id="reservationDataTable list" class="table table-bordered" cellspacing="0" width="100%">
                    <thead>
                        <tr>
                            <th scope="col">#</th>
                            <th scope="col">Email</th>
                            <th scope="col">Check In</th>
                            <th scope="col">Check Out</th>
                            <th scope="col">Rent / Day</th>
                            <th scope="col">Booking Time</th>
                            <th scope="col">Status</th>
                            <th scope="col">Notes</th>
                            <th>Status Update</th>
                        </tr>
                    </thead>
                    <tbody> <?php $i=1; ?>
                        @foreach($list as $list)

                        <tr>
                            <td>{{$i}}</td>
                            <td>{{$list->email}}</td>
                            <td>{{$list->start_date}}</td>
                            <td>{{$list->end_date}}</td>
                            <td>{{$list->rent. '/' .'₹'.' '.$list->payment}}</td>
                            <td>{{$list->created_at}}</td>
                            @if($list->books_status == 'PENDING')
                            <td> <span class="badge bg-danger">{{$list->books_status}}</span></td>
                            @else
                            <td> <span class="badge bg-success">{{$list->books_status}}</span></td>
                            @endif
                            <td>{{$list->requirement}}</td>
                            <td>

                                <div class="btn-group">
                                    <button type="button" class="btn btn-danger dropdown-toggle"
                                        data-bs-toggle="dropdown" aria-expanded="false">
                                        Action
                                    </button>
                                    <ul class="dropdown-menu">
                                        <li> <a class="dropdown-item " data-id=""
                                                onclick='getMessage("{{$list->book_id}}","{{$list->room_id}}")'>CONFIRM</a>
                                        </li>
                                        <li>
                                            <hr class="dropdown-divider">
                                        </li>
                                        <li> <a class="dropdown-item " data-id="<?php  ?>"
                                                onclick='pendingMessage("{{$list->book_id}}","{{$list->room_id}}")'>PENDING</a></li>
                                        <li>
                                        <hr class="dropdown-divider">
                                        </li>
                                        <li> <a class="dropdown-item " data-id="<?php  ?>"
                                                onclick='checkoutMessage("{{$list->book_id}}","{{$list->room_id}}")'>CHECK-OUT</a></li>
                                    </ul>
                                </div>
                            </td>
                        </tr>
                        <?php $i++ ?>

                        @endforeach
                    </tbody>
                </table>
            </div>

        </div>

    </div>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.1/jquery.min.js"></script>
    <script>
    function getMessage($book_id, $room_id) {
        // start_load()
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });
        $.ajax({
            url: '{{route("mybooking_confirm")}}',
            method: 'POST',
            data: {
                book_id: $book_id,
                room_id: $room_id
            },
            success: function(resp) {
                if (resp == 1) {

                    location.reload()

                }
            }
        })

    }
    </script>
    <script>
    function pendingMessage($book_id, $room_id) {
        // start_load()
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });
        $.ajax({
            url: '{{route("mybooking_pending")}}',
            method: 'POST',
            data: {
                book_id: $book_id,
                room_id: $room_id
            },
            success: function(resp) {
                if (resp == 1) {

                    location.reload()


                }
            }
        })

    }
    </script>
    <script>
    function checkoutMessage($book_id, $room_id) {
        // start_load()
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });
        $.ajax({
            url: '{{route("mybooking_check-out")}}',
            method: 'POST',
            data: {
                book_id: $book_id,
                room_id: $room_id
            },
            success: function(resp) {
                if (resp == 1) {

                    location.reload()


                }
            }
        })

    }
    </script>
</x-Admin-layout>