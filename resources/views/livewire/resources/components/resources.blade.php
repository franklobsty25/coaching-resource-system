<div class="row g-4">

    @foreach($resources as $resource)
        @php
        $defaultThumbnail = null;
        if ($resource->type === \App\ResourceTypeEnum::Video->value) {
            $defaultThumbnail = '../assets/images/thumbnails/resource.png';
        } elseif ($resource->type === \App\ResourceTypeEnum::Audio->value) {
            $defaultThumbnail = '../assets/images/thumbnails/sound-audio.webp';
        } elseif ($resource->type === \App\ResourceTypeEnum::Pdf->value) {
            $defaultThumbnail = '../assets/images/thumbnails/pdf-1280.png';
        } else {
            $defaultThumbnail = '../assets/images/thumbnails/image-placeholder.svg';
        }

        $descriptionLength = strlen($resource->description);
        $imagesAndPdfs = [\App\ResourceTypeEnum::Image->value, \App\ResourceTypeEnum::Pdf->value];
        @endphp
        <!-- Card -->
        <div class="col-md-3">
            <a href="{{ in_array($resource->type, $imagesAndPdfs)
            ? route('resources.galleries', \App\Livewire\Resources\Components\Resources::encrypt($resource->id)) :
            route('resources.details', \App\Livewire\Resources\Components\Resources::encrypt($resource->id)) }}"
               class="text-decoration-none">
                <div class="card h-100">
                    <img src="{{ asset($resource->thumbnail ?? $defaultThumbnail) }}" class="card-img-top">
                    <div class="card-body">
                        <h6 class="fw-bold">{{ $resource->title }}</h6>
                        <small class="text-muted">{{ substr($resource->description, 0, 50) }}@if($descriptionLength > 50)...@endif</small>
{{--                        <div class="text-warning">★★★★★ <span class="text-muted">(394,812)</span></div>--}}
                        <p class="fw-bold mt-2">Free</p>
                    </div>
                </div>
            </a>
        </div>
    @endforeach

        <!-- Infinite Scroll Trigger -->
        @if($resources->hasMorePages())
            <div
                class="text-center py-4"
                wire:loading.remove
                x-data="{
            observe(){
                const observer = new IntersectionObserver(entries => {
                    entries.forEach(entry => {
                        if(entry.isIntersecting){
                            @this.call('loadMore');
                        }
                    });
                });
                observer.observe(this.$el);
            }
        }"
                x-init="observe()">
                <div wire:loading class="spinner-border text-primary"></div>
            </div>
        @endif

</div>

<x-slot:script>

</x-slot>
