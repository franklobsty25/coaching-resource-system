<x-slot:title>
    {{ $resource->title }}
</x-slot>
<div class="row">
    <!-- VIDEO AREA -->
    <div class="col-lg-8 p-0 video-section">

        {{--            <div class="video-wrapper d-flex justify-content-center align-items-center">--}}
        {{--                <i class="bi bi-play-circle-fill display-1 text-white"></i>--}}
        {{--            </div>--}}

        {{--            <div class="video-controls d-flex align-items-center px-3">--}}
        {{--                <span class="small me-2">0:15 / 5:57</span>--}}
        {{--                <input type="range" class="form-range flex-fill mx-3">--}}
        {{--                <button class="btn btn-sm btn-outline-primary">1x</button>--}}
        {{--            </div>--}}
        @if ($isVideo)
        <video
            wire:key="player-{{ md5($currentUrl) }}"
            controls
            class="video-wrapper  d-flex justify-content-center align-items-center"
            width="100%">
            <source src="{{ asset($currentUrl) }}"/>
        </video>
        @else
        <div  class="video-wrapper  d-flex justify-content-center align-items-center" width="100%">
            <audio
                wire:key="player-{{ md5($currentUrl) }}"
                controls
                src="{{ asset($currentUrl) }}">
                Your browser does not support the audio file.
            </audio>
        </div>
        @endif
        <ul class="nav nav-tabs px-3 mt-2" id="courseTabs" role="tablist">

            <li class="nav-item" role="presentation">
                <button class="nav-link active" id="overview-tab"
                        data-bs-toggle="tab" data-bs-target="#overview"
                        type="button" role="tab">Overview</button>
            </li>

{{--            <li class="nav-item" role="presentation">--}}
{{--                <button class="nav-link" id="qa-tab"--}}
{{--                        data-bs-toggle="tab" data-bs-target="#qa"--}}
{{--                        type="button" role="tab">Q&amp;A</button>--}}
{{--            </li>--}}

{{--            <li class="nav-item" role="presentation">--}}
{{--                <button class="nav-link" id="notes-tab"--}}
{{--                        data-bs-toggle="tab" data-bs-target="#notes"--}}
{{--                        type="button" role="tab">Notes</button>--}}
{{--            </li>--}}

{{--            <li class="nav-item" role="presentation">--}}
{{--                <button class="nav-link" id="announcements-tab"--}}
{{--                        data-bs-toggle="tab" data-bs-target="#announcements"--}}
{{--                        type="button" role="tab">Announcements</button>--}}
{{--            </li>--}}

{{--            <li class="nav-item" role="presentation">--}}
{{--                <button class="nav-link" id="reviews-tab"--}}
{{--                        data-bs-toggle="tab" data-bs-target="#reviews"--}}
{{--                        type="button" role="tab">Reviews</button>--}}
{{--            </li>--}}

{{--            <li class="nav-item" role="presentation">--}}
{{--                <button class="nav-link" id="tools-tab"--}}
{{--                        data-bs-toggle="tab" data-bs-target="#tools"--}}
{{--                        type="button" role="tab">Learning tools</button>--}}
{{--            </li>--}}
        </ul>

        <div class="tab-content p-4" id="courseTabContent">

            <!-- OVERVIEW -->
            <div class="tab-pane fade show active" id="overview" role="tabpanel">

                <h5>{{ $resource->title }}</h5>

{{--                <div class="d-flex gap-3 small text-muted my-2">--}}
{{--                    <span>⭐ 4.3 (12,965)</span>--}}
{{--                    <span>58,272 Students</span>--}}
{{--                    <span>43 Hours</span>--}}
{{--                </div>--}}

                <div class="border rounded p-3 my-3">
                    <strong>Description</strong>
                    <p class="small text-muted mb-2">{{ $resource->description }}</p>
{{--                    <button class="btn btn-primary btn-sm">Get started</button>--}}
                </div>

                <div class="row small">
                    <div class="col">Skill level: All Levels</div>
                    <div class="col">Creator: {{ $resource->user->name }}</div>
                    <div class="col">Language: English</div>
                </div>

            </div>

            <!-- Q&A -->
{{--            <div class="tab-pane fade" id="qa" role="tabpanel">--}}
{{--                <p class="text-muted">No questions yet. Be the first to ask.</p>--}}
{{--            </div>--}}

{{--            <!-- NOTES -->--}}
{{--            <div class="tab-pane fade" id="notes" role="tabpanel">--}}
{{--                <p class="text-muted">You haven’t added any notes yet.</p>--}}
{{--            </div>--}}

{{--            <!-- ANNOUNCEMENTS -->--}}
{{--            <div class="tab-pane fade" id="announcements" role="tabpanel">--}}
{{--                <p class="text-muted">No announcements at this time.</p>--}}
{{--            </div>--}}

{{--            <!-- REVIEWS -->--}}
{{--            <div class="tab-pane fade" id="reviews" role="tabpanel">--}}
{{--                <p class="text-muted">Student reviews will appear here.</p>--}}
{{--            </div>--}}

{{--            <!-- LEARNING TOOLS -->--}}
{{--            <div class="tab-pane fade" id="tools" role="tabpanel">--}}
{{--                <p class="text-muted">Learning tools and resources coming soon.</p>--}}
{{--            </div>--}}

        </div>

    </div>

    <!-- SIDEBAR -->
    <div class="col-lg-4 p-0 border-start course-sidebar">

        <div class="p-3 border-bottom d-flex justify-content-between align-items-center">
            <strong>Resource content</strong>
            <button class="btn btn-sm btn-outline-primary" data-bs-toggle="collapse" data-bs-target="#courseList">
                <i class="bi bi-chevron-down"></i>
            </button>
        </div>

        <div id="courseList" class="collapse show list-group list-group-flush">
            @foreach($urls as $index => $url)
                <div class="list-group-item {{ $currentUrl === $url ? 'active' : '' }}">
                    <a href="#"
                       wire:click.prevent="setCurrentUrl('{{ $url }}')"
                       class="text-decoration-none content">
                        Resource – {{ $index + 1 }}
                    </a>
{{--                    <span class="float-end small">6min</span>--}}
                </div>
            @endforeach

{{--            <div class="list-group-item">--}}
{{--                <input type="checkbox" checked> Installing MySQL on Mac OS X--}}
{{--                <span class="float-end small">10min</span>--}}
{{--            </div>--}}

{{--            <div class="list-group-item fw-bold">Section 4: Laravel Fundamentals – Routes</div>--}}
{{--            <div class="list-group-item small">7 lectures • 39min</div>--}}
        </div>
    </div>

</div>
