<!DOCTYPE html>
<html lang="en" dir="ltr" >

<head>
    <!-- All meta and title start-->
    @include('livewire.layout.head')
    <!-- meta and title end-->

    <!-- css start-->
    @include('livewire.layout.css')
    <!-- css end-->
    <title> {{ $title ?? 'Resource' }} | {{ config('app.name', 'Laravel') }}</title>
    @isset($css)
        {{ $css }}
    @endisset
</head>

<body class="ltr dark">
<!-- Loader start-->
<div class="app-wrapper default">
    {{-- <div class="loader-wrapper">
        <div class="loader_16"></div>
    </div> --}}
    <!-- Loader end-->

    <!-- Menu Navigation start -->
    <livewire:layout.sidebar />
    <!-- Menu Navigation end -->


    <div class="app-content">
        <!-- Header Section start -->
        <livewire:layout.header />
        <!-- Header Section end -->

        <!-- Main Section start -->
        <main>
            <!-- Breadcrumb start -->
            @isset($breadcrumb)
            <div class="row m-1">
                <div class="col-12 ">
                    @isset($header)
                        <h4 class="main-title">{{ $header }}</h4>
                    @endisset
                    <ul class="app-line-breadcrumbs mb-3">
                        @isset($icon_header)
                            <li class="">
                                <a href="#" class="f-s-14 f-w-500">
                                  <span>
                                      {{ $icon_header }}
                                  </span>
                                </a>
                            </li>
                        @endisset
                        @isset($sub_header)
                            <li class="active">
                                {{ $sub_header }}
                            </li>
                        @endisset
                    </ul>
                </div>
            </div>
            @endisset
            <!-- Breadcrumb end -->
            {{ $slot }}
        </main>
        <!-- Main Section end -->
    </div>

    <!-- tap on top -->
    <div class="go-top">
      <span class="progress-value">
        <i class="ti ti-arrow-up"></i>
      </span>
    </div>

    <!-- Footer Section start -->
    <livewire:layout.footer />
    <!-- Footer Section end -->
</div>
    <!-- scripts start-->
    @include('livewire.layout.script')
    <script src="https://unpkg.com/alpinejs" defer></script>
    <!-- scripts end-->
    @isset($script)
        {{ $script }}
    @endisset
</body>
</html>
