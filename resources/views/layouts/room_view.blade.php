<!-- Customer room list page  -->

<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('ROOMS') }}
        </h2>
    </x-slot>

    <div class="card bg-light mt-4">
        <div class="card-content">
            <div class="row mx-3 my-3">
                @foreach($view as $view)
                <?php $leads = json_decode($view->file, true); ?>
                <div class="col-md-4">
                    <div class="card mb-4 box-shadow">
                        <div class="card-header">
                            <h5 class="my-0 font-weight-normal">{{$view->owner}}</h5>
                        </div>
                        <a href="{{url('/rooms/interior'. '/' .$view->id)}}"> <img class="card-img-top" data-src=""
                                alt="Thumbnail [100%x225]" style="height: 225px; width: 100%; display: block; "
                                src="{{ asset('images/'.$leads[0])}}" data-holder-rendered="true"></a>

                        <div class="card-body">
                            <p class="card-text"> {{$view->address}}</p>
                            <small class=""> From</small>
                            <small class="font-weight-bold text-dark btn btn-outline-warning">{{$view->rent}} ₹ /
                                night</small>
                        </div>
                        <div class="text-center mb-4">
                            @if($view->status == 'AVAILABLE')
                            <small class="badge rounded-pill bg-success">AVAILABLE</small>
                            @else
                            <span class="badge badge rounded-pill bg-danger">NOT AVAILABLE</span>
                            @endif
                        </div>
                    </div>
                </div>
                @endforeach

            </div>
        </div>
    </div>
</x-app-layout>