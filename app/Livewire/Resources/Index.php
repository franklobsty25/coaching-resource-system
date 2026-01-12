<?php

namespace App\Livewire\Resources;

use App\Models\Resource;
use App\Util;
use Livewire\Attributes\Layout;
use Livewire\Component;

class Index extends Component
{
    use Util;

    public $resources = [];

    public function mount()
    {
        $this->resources = Resource::latest()->get();
    }

    public function remove(int $resourceId)
    {
        Resource::firstWhere('id', $resourceId)->delete();

        session()->flash('success', 'Resource deleted successfully.');

        $this->redirectRoute('resources.index');
    }

    #[Layout('layouts.app')]
    public function render()
    {
        return view('livewire.resources.index');
    }
}
