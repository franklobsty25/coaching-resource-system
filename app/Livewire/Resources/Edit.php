<?php

namespace App\Livewire\Resources;

use App\Livewire\Forms\ResourceForm;
use App\Models\Resource;
use App\Util;
use Livewire\Attributes\Layout;
use Livewire\Component;
use Livewire\WithFileUploads;

class Edit extends Component
{
    use Util, WithFileUploads;

    public ResourceForm $form;
    public ?Resource $resource;

    public function mount(string $resourceId)
    {
        $this->resource = Resource::firstWhere('id', Edit::decrypt($resourceId));
        $this->form->setResource($this->resource);
    }

    public function update()
    {
        $this->form->update();

        session()->flash('success', 'Resource updated successfully.');
    }

    #[Layout('layouts.app')]
    public function render()
    {
        return view('livewire.resources.edit');
    }
}
