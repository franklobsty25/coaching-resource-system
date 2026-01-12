<x-slot:title>Create</x-slot>
<x-slot:breadcrumb>
    <x-slot:header>Create</x-slot>
    <x-slot:icon_header>
        <i class="ph-duotone  ph-plus f-s-16"></i> Create
    </x-slot>
    <x-slot:sub_header>
        <a href="{{ route('resources.index') }}" class="f-s-14 f-w-500" wire:navigate>Resources</a>
    </x-slot>
</x-slot>
<div>
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-body">
                    @session('success')
                    <div class="alert alert-success" role="alert">
                        <i class="ti ti-x float-end breadcrumb-start" data-bs-dismiss="alert"></i>
                        <p>{{ $value }}</p>
                    </div>
                    @endsession
                    @session('error')
                    <div class="alert alert-danger" role="alert">
                        <i class="ti ti-x float-end breadcrumb-start" data-bs-dismiss="alert"></i>
                        <p>{{ $value }}</p>
                    </div>
                    @endsession
                    <form wire:submit="save" class="row g-3 app-form">
                        <div class="col-md-12">
                            <label for="title" class="form-label">Title</label>
                            <input type="text" class="form-control @error('form.title') is-invalid @enderror" id="title" wire:model="form.title">
                            @error('form.title')
                            <div class="mt-1">
                                <span class="text-danger">{{ $message }}</span>
                            </div>
                            @enderror
                        </div>
                        <div class="col-md-12">
                            <label for="description" class="form-label">Description</label>
                            <textarea class="form-control @error('form.description') is-invalid @enderror" rows="10" id="description" wire:model="form.description"></textarea>
                            @error('form.description')
                            <div class="mt-1">
                                <span class="text-danger">{{ $message }}</span>
                            </div>
                            @enderror
                        </div>
                        <div class="col-md-12">
                            <label for="resource-type" class="form-label">Type</label>
                            <select class="form-select @error('form.type') is-invalid @enderror" id="resource-type" aria-label="select type" wire:model="form.type">
                                <option value="">Select type</option>
                                @foreach(\App\ResourceTypeEnum::cases() as $type)
                                    <option value="{{ $type->value }}">{{ $type->name }}</option>
                                @endforeach
                            </select>
                            @error('form.type')
                            <div class="mt-1">
                                <span class="text-danger">{{ $message }}</span>
                            </div>
                            @enderror
                        </div>
                        <div class="col-md-12">
                            <label for="thumbnail" class="form-label">Thumbnail</label>
                            <input type="file" class="form-control @error('form.thumbnail') is-invalid @enderror" id="thumbnail" accept="image/*" wire:model="form.thumbnail">
                            @error('form.thumbnail')
                            <div class="mt-1">
                                <span class="text-danger">{{ $message }}</span>
                            </div>
                            @enderror
                        </div>
                        <div class="col-md-12">
                            <label class="form-label">Files Upload</label>
                            <input type="file" class="form-control @error('form.files.*') is-invalid @enderror" id="file-upload" multiple wire:model="form.files">
                            @error('form.files.*')
                            <div class="mt-1">
                                <span class="text-danger">{{ $message }}</span>
                            </div>
                            @enderror
                        </div>
                            <button type="submit" class="btn btn-light-primary">Submit</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
