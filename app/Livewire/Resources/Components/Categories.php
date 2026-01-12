<?php

namespace App\Livewire\Resources\Components;

use App\ResourceTypeEnum;
use Livewire\Component;

class Categories extends Component
{
    public $categories;

    public function mount()
    {
        $this->categories = [
            [
                'title' => ResourceTypeEnum::Video->value,
                'icon' => 'camera-video',
                'color' => 'orange',
            ],
            [
                'title' => ResourceTypeEnum::Audio->value,
                'icon' => 'music-note',
                'color' => 'purple',
            ],
            [
                'title' => ResourceTypeEnum::Pdf->value,
                'icon' => 'file-pdf',
                'color' => 'green',
            ],
            [
                'title' => ResourceTypeEnum::Image->value,
                'icon' => 'camera',
                'color' => 'pink',
            ],
        ];
    }

    public function selectCategory($category)
    {
        $this->dispatch('categorySelected', $category);
    }

    public function render()
    {
        return view('livewire.resources.components.categories');
    }
}
