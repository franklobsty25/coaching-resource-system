<?php

namespace App\Livewire\Resources\Components;

use App\Models\Resource;
use App\ResourceTypeEnum;
use App\Util;
use Livewire\Attributes\Layout;
use Livewire\Component;

class Details extends Component
{
    use Util;

    public Resource $resource;
    public $urls;
    public $currentUrl;
    public $isVideo = false;

    public function mount(string $resourceId)
    {
        $this->resource = Resource::firstWhere('id', $this->decrypt($resourceId));
        $this->urls = explode('|', $this->resource->paths);
        $this->currentUrl = $this->urls[0];
        $this->isVideo = $this->resource->type === ResourceTypeEnum::Video->value;
    }

    public function setCurrentUrl(string $url)
    {
        $this->currentUrl = $url;
    }

    #[Layout('layouts.app-secondary')]
    public function render()
    {
        return view('livewire.resources.components.details');
    }
}
