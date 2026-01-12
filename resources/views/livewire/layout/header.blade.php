<?php

use Illuminate\Support\Facades\Session;
use Livewire\Volt\Component;

new class extends Component {
    public function logout()
    {
        \Illuminate\Support\Facades\Auth::guard('web')->logout();
        Session::invalidate();
        Session::regenerateToken();
        $this->redirectRoute('login', navigate: true);
    }
}
?>
    <!-- Header Section starts -->
<header class="header-main">
    <div class="container-fluid">
        <div class="row">
            <div class="p-0 col-6 col-sm-4 d-flex align-items-center header-left">
                <span class="header-toggle me-3">
                  <i class="ph ph-circles-four"></i>
                </span>
            </div>

            <div class="p-0 col-6 col-sm-8 d-flex align-items-center justify-content-end header-right">

                <ul class="d-flex align-items-center">

                    <li class="header-cloud">
                        <a href="#" class="head-icon" role="button" data-bs-toggle="offcanvas"
                           data-bs-target="#cloudoffcanvasTops" aria-controls="cloudoffcanvasTops">
                            <i class="ph-duotone ph-cloud-sun text-primary f-s-26 me-1"></i>
                            <span>26 <sup class="f-s-10">°C</sup></span>
                        </a>

                        <div class="offcanvas offcanvas-end header-cloud-canvas" tabindex="-1" id="cloudoffcanvasTops"
                             aria-labelledby="cloudoffcanvasTops">
                            <div class="p-0 offcanvas-body">
                                <div class="cloud-body">

                                    <div class="cloud-content-box">
                                        <div class="cloud-box bg-primary-900">
                                            <p class="mb-3">Mon</p>
                                            <h6 class="mt-4 f-s-13"> +29°C</h6>
                                            <span>
                                                <i class="text-white ph-duotone ph-cloud-fog f-s-25"></i>
                                            </span>
                                            <p class="mt-3 f-s-13"><i class="wi wi-raindrop"></i> 2%</p>
                                        </div>
                                        <div class="cloud-box bg-primary-800">
                                            <p class="mb-3">Tue</p>
                                            <h6 class="mt-4 f-s-13"> +29°C</h6>
                                            <span>
                                                <i class="text-white ph-duotone ph-cloud-sun f-s-25"></i>
                                            </span>
                                            <p class="mt-3 f-s-13"><i class="wi wi-raindrop"></i> 2%</p>
                                        </div>
                                        <div class="cloud-box bg-primary-700">
                                            <p class="mb-3 text-light">Wed</p>
                                            <h6 class="mt-4 f-s-13"> +20°C</h6>
                                            <span>
                                                <i class="text-white ph-duotone ph-sun-dim f-s-25"></i>
                                            </span>
                                            <p class="mt-3 f-s-13"><i class="wi wi-raindrop"></i> 1%</p>
                                        </div>
                                        <div class="cloud-box bg-primary-600">
                                            <p class="mb-3">Thu</p>
                                            <h6 class="mt-4 f-s-13"> +17°C</h6>
                                            <span>
                                                <i class="text-white ph-duotone ph-sun-dim f-s-25"></i>
                                            </span>
                                            <p class="mt-3 f-s-13"><i class="wi wi-raindrop"></i> 1%</p>
                                        </div>
                                        <div class="cloud-box bg-primary-500">
                                            <p class="mb-3">Fri</p>
                                            <h6 class="mt-4 f-s-13"> +18°C</h6>
                                            <span>
                                                <i class="text-white ph-duotone ph-sun-dim f-s-25"></i>
                                            </span>
                                            <p class="mt-3 f-s-13"><i class="wi wi-raindrop"></i> 1%</p>
                                        </div>
                                        <div class="cloud-box bg-primary-400">
                                            <p class="mb-3">Sat</p>
                                            <h6 class="mt-4 f-s-13"> +16°C</h6>
                                            <span>
                                                <i class="text-white ph-duotone ph-sun-dim f-s-25"></i>
                                            </span>
                                            <p class="mt-3 f-s-13"><i class="wi wi-raindrop"></i> 1%</p>
                                        </div>
                                        <div class="cloud-box bg-primary-300">
                                            <p class="mb-3">Sun</p>
                                            <h6 class="mt-4 f-s-13"> +29°C</h6>
                                            <span class="mb-3">
                                                <i class="text-white ph-duotone ph-sun-dim f-s-25"></i>
                                            </span>
                                            <p class="mt-3 f-s-13"><i class="wi wi-raindrop"></i> 1%</p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </li>
                    <li class="header-profile">
                        <a href="#" class="d-block head-icon" role="button" data-bs-toggle="offcanvas"
                           data-bs-target="#profilecanvasRight" aria-controls="profilecanvasRight">
                            <img src="{{asset('../assets/images/logo/favicon.png')}}" alt="avtar"
                                 class="b-r-10 h-35 w-35">
                        </a>

                        <div class="offcanvas offcanvas-end header-profile-canvas" tabindex="-1" id="profilecanvasRight"
                             aria-labelledby="profilecanvasRight">
                            <div class="offcanvas-body app-scroll">
                                <ul class="">
                                    <li>
                                        <div class="d-flex-center">
                                    <span class="h-45 w-45 d-flex-center b-r-10 position-relative">
                                        @if(isset($authUser->profile_photo_path))
                                            <img src="{{ asset('storage/' . $authUser->profile_photo_path) }}"
                                                 alt="Profile" class="img-fluid b-r-10">
                                        @else
                                            <img src="{{asset('../assets/images/logo/favicon.png')}}" alt=""
                                                 class="img-fluid b-r-10">
                                        @endif
                                    </span>
                                        </div>
                                        <div class="mt-2 text-center">
                                            <h6 class="mb-0">{{ auth()->user()->name ?? 'Guest' }}</h6>
                                            <p class="mb-0 f-s-12 text-secondary">{{ auth()->user()->email ?? 'admin@example.com' }}</p>
                                        </div>
                                    </li>
                                    <li class="py-1 app-divider-v dotted"></li>
                                    {{-- <li>
                                        <a class="f-w-500" href="{{route('profile')}}" target="_blank">
                                            <i class="ph-duotone ph-user-circle pe-1 f-s-20"></i> Profile Details
                                        </a>
                                    </li> --}}
                                    <li>
                                        <a class="mb-0 text-danger" href="#" wire:click="logout">
                                            <i class="ph-duotone ph-sign-out pe-1 f-s-20"></i> Log Out
                                        </a>
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </li>
                </ul>
            </div>
        </div>
    </div>
</header>
<!-- Header Section ends -->
