<?php

namespace App\Livewire\Resources\Components;

use App\Models\Resource;
use App\Util;
use Livewire\Component;
use Livewire\WithPagination;

class Resources extends Component
{
    use WithPagination, Util;
    protected $paginationTheme = 'bootstrap';

    public $category = null;
    public $perPage = 12;
    protected $listeners = ['categorySelected' => 'filterByCategory'];

    public function filterByCategory($category)
    {
        $this->category = $category;
        $this->resetPage();
    }

    public function loadMore()
    {
        $this->perPage += 12;
    }

    public function render()
    {
        $resources = Resource::when($this->category, function ($query) {
            return $query
                ->where('type', $this->category)
                ->latest()
                ->paginate($this->perPage);
        },
            function ($query) {
                return $query
                    ->latest()
                    ->paginate($this->perPage);
            });

        return view('livewire.resources.components.resources', compact('resources'));
    }
}
