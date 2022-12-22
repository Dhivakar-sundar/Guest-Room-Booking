<style>
.dropdown-toggle {
    outline: 0;
}

.btn-toggle {
    padding: .25rem .5rem;
    font-weight: 600;
    color: rgba(0, 0, 0, .65);
    background-color: transparent;
}

.btn-toggle:hover,
.btn-toggle:focus {
    color: rgba(0, 0, 0, .85);
    background-color: #d2f4ea;
}

.btn-toggle::before {
    width: 1.25em;
    line-height: 0;
    content: url("data:image/svg+xml,%3csvg xmlns='http://www.w3.org/2000/svg' width='16' height='16' viewBox='0 0 16 16'%3e%3cpath fill='none' stroke='rgba%280,0,0,.5%29' stroke-linecap='round' stroke-linejoin='round' stroke-width='2' d='M5 14l6-6-6-6'/%3e%3c/svg%3e");
    transition: transform .35s ease;
    transform-origin: .5em 50%;
}

.btn-toggle[aria-expanded="true"] {
    color: rgba(0, 0, 0, .85);
}

.btn-toggle[aria-expanded="true"]::before {
    transform: rotate(90deg);
}

.btn-toggle-nav a {
    padding: .1875rem .5rem;
    margin-top: .125rem;
    margin-left: 1.25rem;
}

.btn-toggle-nav a:hover,
.btn-toggle-nav a:focus {
    background-color: #d2f4ea;
}

.scrollarea {
    overflow-y: auto;
}
</style>

<!-- <div class="flex-shrink-0 p-3 bg-white" style="width: 280px;"> -->
<a href="{{route('admin_profile')}}"
    class="d-flex align-items-center pb-3 link-dark text-decoration-none border-bottom">
    @if(Auth::guard('admin')->user()->gender == 'Male')
    <img src="{{ asset('images/avatar7.png')}}" style="border-radius: 50%;width:50px" class="mt-2" alt="Avatar">
    @else
    <img src="{{ asset('images/avatar3.png')}}" style="border-radius: 50%;width:50px" class="mt-2" alt="avatar">

    @endif
    <span class="s-5 fw-semibold mt-4 ms-2 ">PROFILE</span>
</a>
<ul class="list-unstyled ps-0 nav navbar-nav">
    <li class="mb-5">
        <a class="btn btn-toggle d-inline-flex align-items-center rounded   " href="{{route('admin_dashboard')}}">
            DASHBOARD
        </a>

    </li>
    <li class="border-top mb-5">
        <a class="btn btn-toggle d-inline-flex align-items-center rounded   " href="{{route('admin_room')}}">
            ROOM LIST
        </a>
    </li>
    <li class="border-top mb-5">
        <a class="btn btn-toggle d-inline-flex align-items-center rounded   " href="{{route('admin_addroom')}}">
            ADD ROOMS
        </a>

    </li>
    <li class="border-top"></li>
    <li class="mb-1">
        <a class="btn btn-toggle d-inline-flex align-items-center rounded   " href="{{route('admin_customer')}}">
            CUSTOMERS
        </a>
    </li>
</ul>