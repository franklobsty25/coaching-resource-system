<div class="container py-4">
    <ul class="nav nav-tabs mb-4">
        @if ($isImage)
        <li class="nav-item">
            <button class="nav-link active" data-bs-toggle="tab" data-bs-target="#imagesTab">Images</button>
        </li>
        @else
        <li class="nav-item">
            <button class="nav-link" data-bs-toggle="tab" data-bs-target="#pdfsTab">PDFs</button>
        </li>
        @endif
    </ul>

    <div class="tab-content">
        @if ($isImage)
        <!-- IMAGES TAB -->
        <div class="tab-pane fade show active" id="imagesTab">
            <div class="row g-4">
                @foreach($urls as $url)
                    <div class="col-md-3">
                         <div class="card h-100">
                             <a href="{{ asset($url) }}"><img src="{{ asset($url) }}" class="card-img-top"></a>
                            <div class="card-body">
                                <h6 class="fw-bold">{{ $resource->title }}</h6>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
        @else
        <!-- PDF TAB -->
        <div class="tab-pane fade show active" id="pdfsTab">
            <div class="row g-4">
                @foreach($urls as $url)
                    <div class="col-md-3">
                        <div class="card h-100 text-center p-4">
                            <i class="bi bi-file-earmark-pdf fs-1 text-danger"></i>
                            <div class="card-body">
                                <h6 class="fw-bold">{{ $resource->title }}</h6>
                                <a href="{{ asset($url) }}" class="btn btn-outline-primary btn-sm">Open</a>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
        @endif
    </div>
</div>
