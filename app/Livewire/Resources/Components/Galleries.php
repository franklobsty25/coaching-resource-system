<?php

namespace App\Livewire\Resources\Components;

use App\Models\Resource;
use App\ResourceTypeEnum;
use App\Util;
use Livewire\Attributes\Layout;
use Livewire\Component;

class Galleries extends Component
{
    use Util;

    public Resource $resource;
    public $urls;
    public $isImage = false;

    public function mount(string $resourceId)
    {
        $this->resource = Resource::firstWhere('id', $this->decrypt($resourceId));
        $this->urls = explode('|', $this->resource->paths);
        $this->isImage = ResourceTypeEnum::Image->value === $this->resource->type;
    }

    #[Layout('layouts.app-tertiary')]
    public function render()
    {
        return view('livewire.resources.components.galleries');
    }
}
