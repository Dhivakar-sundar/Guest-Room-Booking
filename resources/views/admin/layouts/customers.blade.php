<x-Admin-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Customer List') }}
        </h2>
    </x-slot>

    <div class="card bg-light mt-4">
                    <div class="card-header">
                        <header class="h3">Customer Details</header>
                    </div>
                    <div class="card-content">
                        <div class="row mx-3 my-3">
                        <table id="reservationDataTable list" class="table table-bordered" cellspacing="0" width="100%">
                    <thead>
                        <tr>
                            <th scope="col">#</th>
                            <th scope="col">Email</th>
                            <th scope="col">Mobile</th>
                            <th scope="col">Contact</th>
               
                        </tr>
                    </thead>
                    <tbody> <?php $i=1; ?>
                        @foreach($list as $list)

                        <tr>
                            <td>{{$i}}</td>
                            <td>{{$list->name}}</td>
                            <td>{{$list->email}}</td>
                            <td>{{$list->mobile}}</td>
                          
                        </tr>
                        <?php $i++ ?>

                        @endforeach
                    </tbody>
                </table>
                        </div>
                    </div>
    </div>


    </x-Admin-layout>