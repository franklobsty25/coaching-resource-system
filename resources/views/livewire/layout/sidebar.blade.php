
<!-- Menu Navigation starts -->
<nav class="dark-sidebar">
    <div class="app-logo">
        <a class="logo d-inline-block" href="{{ url('/') }}">
            <img src="{{asset('../assets/images/logo/site_logo.png')}}" alt="logo">
        </a>

        <span class="bg-light-primary toggle-semi-nav">
          <i class="ti ti-chevrons-right f-s-20"></i>
        </span>
    </div>
    <div class="app-nav" id="app-simple-bar">
        <ul class="p-0 mt-2 main-nav">
            <li class="menu-title">
                <span>Menu</span>
            </li>
            <li class="no-sub">
                <a class="" href="{{ route('dashboard') }}" wire:navigate>
                    <i class="ph-duotone ph-house-line"></i> Dashboard
                </a>
            </li>
            <li class="no-sub">
                <a class="" href="{{ route('resources.index') }}">
                    <i class="ph-duotone ph-books"></i> Resources
                </a>
            </li>
{{--            <li class="menu-title"> <span>Player Managements </span></li>--}}
{{--            <li>--}}
{{--                <a class="" data-bs-toggle="collapse" href="#players" aria-expanded="false">--}}
{{--                    <i class="ph-duotone ph-books"></i> Resource <span class="ms-auto"></span>--}}
{{--                </a>--}}
{{--                <ul class="collapse" id="players">--}}
{{--                    <li><a href="#">Add</a></li>--}}
{{--                    <li><a href="#">Edit</a></li>--}}
{{--                </ul>--}}
{{--            </li>--}}

{{--            <li class="menu-title"> <span>User Managements </span></li>--}}
{{--            <li>--}}
{{--                <a class="" data-bs-toggle="collapse" href="#users" aria-expanded="false">--}}
{{--                    <i class="ph-duotone ph-user-gear"></i> Users & Scouts <span class="ms-auto"></span>--}}
{{--                </a>--}}
{{--                <ul class="collapse" id="users">--}}
{{--                        <li><a href="#">Roles</a></li>--}}
{{--                        <li><a href="#">Users</a></li>--}}
{{--                        <li><a href="#">Scouts</a></li>--}}
{{--                        <li><a href="#">Scout Managers</a></li>--}}
{{--                        <li>--}}
{{--                            <a href="#">--}}
{{--                                <i class="ph-duotone ph-user-crown"></i> Scout Assignments--}}
{{--                            </a>--}}
{{--                        </li>--}}
{{--                    <li><a href="#">Scout Reports</a></li>--}}
{{--                </ul>--}}
{{--            </li>--}}
{{--            <li class="menu-title"> <span>Settings </span></li>--}}

{{--            <li class="no-sub">--}}
{{--                <a class="" href="#">--}}
{{--                    <i class="ph-duotone ph-gear"></i> System Settings--}}
{{--                </a>--}}
{{--            </li>--}}
{{--            <li class="menu-title"><span>Player Development</span></li>--}}
{{--            <li class="no-sub">--}}
{{--                <a class="" href="#">--}}
{{--                    <i class="ph-duotone ph-house-simple"></i> Camps--}}
{{--                </a>--}}
{{--            </li>--}}
        </ul>

    </div>

    <div class="menu-navs">
        <span class="menu-previous"><i class="ti ti-chevron-left"></i></span>
        <span class="menu-next"><i class="ti ti-chevron-right"></i></span>
    </div>

</nav>
<!-- Menu Navigation ends -->
