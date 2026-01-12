<x-app-layout xmlns:livewire="http://www.w3.org/1999/xlink">
    <x-slot:title>Dashboard</x-slot>
    <x-slot:css>
        <!-- apexcharts css-->
        <link rel="stylesheet" type="text/css" href="{{ asset('assets/vendor/apexcharts/apexcharts.css') }}">

        <!-- glight css -->
        <link rel="stylesheet" href="{{asset('assets/vendor/glightbox/glightbox.min.css')}}">

        <!-- slick css -->
        <link rel="stylesheet" href="{{asset('assets/vendor/slick/slick.css')}}">
        <link rel="stylesheet" href="{{asset('assets/vendor/slick/slick-theme.css')}}">
    </x-slot>
    <main>
        <div class="container-fluid">
            <livewire:resources.components.statistics />
            <div class="row">
                <livewire:resources.components.chartjs />

                <!-- order-2-lg -->
{{--                <div class="col-md-6 col-lg-6 col-xxl-6">--}}
{{--                    <div class="card lecture-schedule-card" style="height: 380px;">--}}
{{--                        <div class="card-body">--}}
{{--                            <h5 class="header-title-text">Top Rated Players</h5>--}}
{{--                            <ul class="mt-3 activity-list" style="max-height: 280px; overflow-y: auto;">--}}
{{--                                @forelse($topLeaguePlayers as $player)--}}
{{--                                    <li class="activity-list-item">--}}
{{--                                        <div--}}
{{--                                            class="overflow-hidden h-35 w-35 d-flex-center b-r-10 text-bg-secondary activity-list-avtar">--}}
{{--                                            <img src="{{ asset('storage/' . $player->image) }}" alt="" class="img-fluid">--}}
{{--                                        </div>--}}
{{--                                        <div class="activity-list-content">--}}
{{--                                            <h6 class="mb-0 d-flex align-items-center">--}}
{{--                                                {{ $player->first_name }} {{ $player->last_name }} {{ $player->other_names }}--}}
{{--                                                <span class="ms-2">--}}
{{--                                                                            @php--}}
{{--                                                                                $starRating = min(5, round($player->overall_rating / 20));--}}
{{--                                                                            @endphp--}}
{{--                                                    @for ($i = 1; $i <= 5; $i++)--}}
{{--                                                        <i--}}
{{--                                                            class="ti ti-star-filled f-s-20 {{ $i <= $starRating ? 'text-warning' : 'star-filled' }}"></i>--}}
{{--                                                    @endfor--}}
{{--                                                                        </span>--}}
{{--                                            </h6>--}}
{{--                                            <p class="mb-0 text-secondary">--}}
{{--                                                Rating ({{ $player->overall_rating }}/100)--}}
{{--                                            </p>--}}
{{--                                        </div>--}}
{{--                                    </li>--}}
{{--                                @empty--}}
{{--                                    <li class="activity-list-item h-100 d-flex align-items-center justify-content-center">--}}
{{--                                        <div class="text-center activity-list-content">--}}
{{--                                            <p class="mb-0 text-secondary">No players rated yet</p>--}}
{{--                                        </div>--}}
{{--                                    </li>--}}
{{--                                @endforelse--}}
{{--                            </ul>--}}
{{--                        </div>--}}
{{--                    </div>--}}
{{--                </div>--}}

{{--                <div class="col-md-6 col-lg-6 col-xxl-6">--}}
{{--                    <div class="row lecture-video-slider">--}}
{{--                        @forelse($clubs as $club)--}}
{{--                            <div class="col-6">--}}
{{--                                <div class="card draggable-card">--}}
{{--                                    <div class="card-body">--}}
{{--                                        <div class="draggable-card-img">--}}
{{--                                            <a href="#" class="glightbox">--}}
{{--                                                <img src="{{ $club->logo_url }}" class="m-auto img-fluid h-225"--}}
{{--                                                     alt="{{ $club->name }}">--}}
{{--                                            </a>--}}
{{--                                        </div>--}}
{{--                                        <div class="pt-3 draggable-card-content">--}}
{{--                                            <h6 class="mb-0 text-dark f-s-16 mf-w-500">--}}
{{--                                                <span class="f-s-20 me-2">•</span>{{ $club->name }}--}}
{{--                                            </h6>--}}
{{--                                            <p class="mb-0 f-s-14 text-secondary">--}}
{{--                                                ({{ $club->description ?? 'No description available' }})</p>--}}
{{--                                            <p class="mt-2 mb-0 text-secondary f-s-13">--}}
{{--                                                - Founded <span--}}
{{--                                                    class="text-dark text-d-underline">{{ $club->founded_year ?? 'Unknown' }}</span>--}}
{{--                                            </p>--}}
{{--                                            <span class="mt-2 badge text-light-primary">--}}
{{--                                                <i class="ph-duotone ph-clock"></i> {{ $club->created_at }}--}}
{{--                                            </span>--}}
{{--                                        </div>--}}
{{--                                    </div>--}}
{{--                                </div>--}}
{{--                            </div>--}}
{{--                        @empty--}}
{{--                            <div class="col-12">--}}
{{--                                <div class="card draggable-card">--}}
{{--                                    <div class="text-center card-body">--}}
{{--                                        <p class="mb-0 text-secondary f-s-14">No clubs available yet.</p>--}}
{{--                                    </div>--}}
{{--                                </div>--}}
{{--                            </div>--}}
{{--                        @endforelse--}}
{{--                    </div>--}}
{{--                </div>--}}
            </div>
        </div>
    </main>
</x-app-layout>
