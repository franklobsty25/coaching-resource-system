<x-slot:css>
    <!--font-awesome-css-->
    <link rel="stylesheet" href="{{asset('assets/vendor/fontawesome/css/all.css')}}">
    <!-- Data Table css-->
    <link rel="stylesheet" type="text/css" href="{{asset('assets/vendor/datatable/jquery.dataTables.min.css')}}">
</x-slot>
<x-slot:title>List</x-slot>
<x-slot:breadcrumb>
    <x-slot:header>Resources</x-slot>
    <x-slot:icon_header>
        <i class="ph-duotone  ph-table f-s-16"></i> List
    </x-slot>
    <x-slot:sub_header>
        <a href="{{ route('resources.index') }}" class="f-s-14 f-w-500" wire:navigate>Resources</a>
    </x-slot>
</x-slot>
<div>
    <div class="row">
        <div class="col-12">
            <div class="card ">
                <div class="card-header">
                    <a href="{{ route('resources.create') }}" role="button" class="btn btn-primary btn-md float-end">Add</a>
                </div>
                <div class="card-body p-3">
                    @session('success')
                    <div class="alert alert-success" role="alert">
                        <i class="ti ti-x float-end breadcrumb-start" data-bs-dismiss="alert"></i>
                        <p>{{ $value }}</p>
                    </div>
                    @endsession
                    <div class="app-datatable-default overflow-auto">
                        <table id="example" class="display app-data-table default-data-table">
                            <thead>
                            <tr>
                                <th>Name</th>
                                <th>Description</th>
                                <th>Type</th>
                                <th>Thumbnail URL</th>
                                <th>Action</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($resources as $resource)
                                <tr>
                                    <td>{{ $resource->title }}</td>
                                    <td>{{ $resource->description }}</td>
                                    <td><span class="badge text-light-primary">{{ ucfirst($resource->type) }}</span></td>
                                    <td>
                                        <a href="{{ asset($resource->thumbnail) }}" class="text-primary">
                                            <img src="{{ asset($resource->thumbnail) }}" class="img-fluid w-50 rounded" alt="thumbnail">
                                        </a>
                                    </td>
                                    <td>
                                        <a href="{{ route('resources.edit', \App\Livewire\Resources\Index::encrypt($resource->id)) }}" type="button" class="btn btn-light-success icon-btn b-r-4">
                                            <i class="ti ti-edit text-success"></i>
                                        </a>
                                        <button type="button" class="btn btn-light-danger icon-btn b-r-4 delete-btn" wire:click="remove({{ $resource->id }})">
                                            <i class="ti ti-trash"></i>
                                        </button>
                                    </td>
                                </tr>
                            @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<x-slot:script>
    <!-- data table js -->
    <script src="{{asset('assets/vendor/datatable/jquery.dataTables.min.js')}}"></script>
    <!-- js-->
    <script src="{{asset('assets/js/data_table.js')}}"></script>
</x-slot>
