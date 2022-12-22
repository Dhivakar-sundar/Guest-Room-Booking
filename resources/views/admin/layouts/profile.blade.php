<x-Admin-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('My BOOKINS') }}
        </h2>
    </x-slot>




    <div class="row gutters-sm mx-4 my-4">
        <div class="col-md-4 mb-3">
            <div class="card">
                <div class="card-body">
                    <div class="d-flex flex-column align-items-center text-center">
                        @if(Auth::guard('admin')->user()->gender == 'Male')
                        <img src="{{ asset('images/avatar7.png')}}" class="rounded-circle" width="150"
                            alt="Thumbnail [100%x225]">
                        @else
                        <img src="{{ asset('images/avatar3.png')}}" class="rounded-circle" width="150"
                            alt="Thumbnail [100%x225]">

                        @endif
                      
                        <div class="mt-3">
                            <h4> {{Auth::guard('admin')->user()->name}}</h4>



                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-md-8">
            <div class="card mb-3">
                <div class="card-body">
                    <div class="row">
                        <div class="col-sm-3">
                            <h6 class="mb-0">Full Name</h6>
                        </div>
                        <div class="col-sm-9 text-secondary">
                            {{Auth::guard('admin')->user()->name}}
                        </div>
                    </div>
                    <hr>
                    <div class="row">
                        <div class="col-sm-3">
                            <h6 class="mb-0">Email</h6>
                        </div>
                        <div class="col-sm-9 text-secondary">
                            {{Auth::guard('admin')->user()->email}}
                        </div>
                    </div>
                    <hr>
                    <div class="row">
                        <div class="col-sm-3">
                            <h6 class="mb-0">Phone</h6>
                        </div>
                        <div class="col-sm-9 text-secondary">
                            {{Auth::guard('admin')->user()->mobile}}
                        </div>
                    </div>
                    <hr>
                    <div class="row">
                        <div class="col-sm-3">
                            <h6 class="mb-0">Address</h6>
                        </div>
                        <div class="col-sm-9 text-secondary">
                            {{Auth::guard('admin')->user()->address}}
                        </div>
                    </div>
                    <hr>
                    <div class="row">
                        <div class="col-sm-12">
                            <a class="btn btn-info " target="__blank" href="#">Edit</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>


</x-Admin-layout>