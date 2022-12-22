<!-- Admin Room list page -->

<x-Admin-layout>
    <style>
    .tablinks {
        padding: 10px 15px 5px 15px;
        border-radius: 10px;
        background-color: white;
        color: black;
        text-decoration: none;
        border-width: black;
    }

    .tablinks:hover {
        background-color: gray;
    }
    </style>


    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('ROOM LIST') }}
        </h2>
    </x-slot>

    <div class="card bg-light mt-4">
        <div class="row mx-4 my-4">
            <h1>ROOM LIST</h1>
            <ul class="nav nav-tabs mb-2">
                <li class="nav-item mt-2">
                    <a class="tablinks btn btn-outline-secondary btn-sm me-4" onclick="openCity1(event, 'ALL_ROOM')"
                        id="defaultOpen1" href="#">ALL
                        ROOM</a>
                </li>
                <li class="nav-item ml-2 mt-2 mb-2 ">
                    <a class="tablinks btn btn-outline-secondary btn-sm me-4" onclick="openCity1(event, 'AVAILABLE')"
                        href="#">AVAILABLE</a>
                </li>
                <li class="nav-item ml-2 mt-2 mb-2">
                    <a class="tablinks btn btn-outline-secondary btn-sm me-4" onclick="openCity1(event, 'BOOKED')"
                        href="#">BOOKED</a>
                </li>
            </ul>
            <div id="ALL_ROOM" class="tabcontent">
                <div class="card">
                    <div class="card-content">
                        <table
                            class="table card-table display mb-4 dataTablesCard booking-table room-list-tbl dataTable no-footer">
                            <thead>
                                <tr role="row">
                                    <th>House Name</th>
                                    <th>Mobile number</th>
                                    <th>Facility</th>
                                    <th>Room Floor</th>
                                    <th>Bed</th>
                                    <th>Rate</th>
                                    <th>stay</th>
                                    <th>STATUS</th>

                                    <th>ACTION</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($list as $list)
                                <tr>
                                    <td>{{$list->owner}}</td>
                                    <td>{{$list->telephone}}</td>
                                    <td>{{$list->facility}}</td>
                                    <td>{{$list->floor}}</td>
                                    <td>{{$list->bed}}</td>
                                    <td>{{$list->rent}}</td>
                                    <td>{{$list->min.' '.'day'.'-'.$list->max.' '. 'day' }}</td>
                                    <td>
                                        @if($list->status == 'AVAILABLE')
                                        <span class="badge bg-danger">{{$list->status}}</span>
                                        @elseif($list->status == 'PENDING')
                                        <span class="badge bg-danger">{{$list->status}}</span>
                                        @else
                                        <span class="badge bg-success">{{$list->status}}</span>

                                        @endif
                                    </td>
                                    <td>
                                       
                                        <div class="hidden sm:flex sm:items-center sm:ml-6">
                                            <x-dropdown align="right" width="48">
                                                <x-slot name="trigger">
                                                    <button
                                                        class="flex items-center text-sm font-medium text-gray-500 hover:text-gray-700 hover:border-gray-300 focus:outline-none focus:text-gray-700 focus:border-gray-300 transition duration-150 ease-in-out">
                                                        <div>ACTION</div>

                                                        <div class="ml-1">
                                                            <svg class="fill-current h-4 w-4"
                                                                xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20">
                                                                <path fill-rule="evenodd"
                                                                    d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z"
                                                                    clip-rule="evenodd" />
                                                            </svg>
                                                        </div>
                                                    </button>
                                                </x-slot>

                                                <x-slot name="content">
                                                    <x-dropdown-link>
                                                        <a href="./view_room/{{$list->id}}" class="text-dark ms-4">
                                                            {{ __('VIEW') }}
                                                    </x-dropdown-link>
                                                    <x-dropdown-link>
                                                        <a href="./edit_room/{{$list->id}}" class="text-dark ms-4">
                                                            {{ __('EDIT') }}</a>
                                                    </x-dropdown-link>

                                                    <form method="POST" action="{{ url('admin/delete_room') }}">
                                                        @csrf
                                                        <input type="text" name="id" value="{{$list->id}}" hidden>
                                                        <x-dropdown-link onclick="event.preventDefault();
                                                this.closest('form').submit();">
                                                            <button
                                                                onclick="return confirm('{{ __('Are you sure you want to delete?') }}')">
                                                                {{ __('DELETE') }}</button>
                                                        </x-dropdown-link>
                                                    </form>


                                                </x-slot>
                                            </x-dropdown>
                                        </div>
                                    </td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
            <div id="AVAILABLE" class="tabcontent">
                <div class="card">
                    <div class="card-content">
                        <table
                            class="table card-table display mb-4 dataTablesCard booking-table room-list-tbl dataTable no-footer">
                            <thead>
                                <tr role="row">
                                    <th>Owner Name</th>
                                    <th>Mobile number</th>
                                    <th>Bed Type</th>
                                    <th>Room Floor</th>
                                    <th>Facility</th>
                                    <th>Rate</th>
                                    <th>stay</th>
                                    <th>STATUS</th>

                                </tr>
                            </thead>
                            <tbody>
                                @foreach($available as $ava)
                                <tr>
                                    <td>{{$ava->owner}}</td>
                                    <td>{{$ava->telephone}}</td>
                                    <td>{{$ava->facility}}</td>
                                    <td>{{$ava->floor}}</td>
                                    <td>{{$ava->bed}}</td>
                                    <td>{{$ava->rent}}</td>
                                    <td>{{$ava->min.' '.'day'.'-'.$ava->max.' '. 'day' }}</td>
                                    <td>

                                        <span class='badge bg-danger'>{{$ava->status}}</span>

                                    </td>

                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
            <div id="BOOKED" class="tabcontent">
                <div class="card">
                    <div class="card-content">
                        <table
                            class="table card-table display mb-4 dataTablesCard booking-table room-list-tbl dataTable no-footer">
                            <thead>
                                <tr role="row">
                                    <th>Owner Name</th>
                                    <th>Mobile number</th>
                                    <th>Bed Type</th>
                                    <th>Room Floor</th>
                                    <th>Facility</th>
                                    <th>Rate</th>
                                    <th>stay</th>
                                    <th>STATUS</th>


                                </tr>
                            </thead>
                            <tbody>
                                @foreach($booked as $book)
                                <tr>
                                    <td>{{$book->owner}}</td>
                                    <td>{{$book->telephone}}</td>
                                    <td>{{$book->facility}}</td>
                                    <td>{{$book->floor}}</td>
                                    <td>{{$book->bed}}</td>
                                    <td>{{$book->rent}}</td>
                                    <td>{{$book->min.' '.'day'.'-'.$book->max.' '. 'day' }}</td>
                                    <td>
                                        <span class='badge bg-success'>{{$book->status}}</span>

                                    </td>

                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>

    </div>
    <script>
    function openCity1(evt, cityName) {
        var i, tabcontent, tablinks;
        tabcontent = document.getElementsByClassName("tabcontent");
        for (i = 0; i < tabcontent.length; i++) {
            tabcontent[i].style.display = "none";
        }
        tablinks = document.getElementsByClassName("tablinks");
        for (i = 0; i < tablinks.length; i++) {
            tablinks[i].className = tablinks[i].className.replace(" active", "");
        }
        document.getElementById(cityName).style.display = "block";
        evt.currentTarget.className += " active";
    }
    // Get the element with id="defaultOpen" and click on it
    document.getElementById("defaultOpen1").click();
    </script>
</x-Admin-layout>