<?php

namespace App\Livewire\Resources\Components;

use App\Models\Resource;
use App\ResourceTypeEnum;
use Illuminate\Support\Facades\DB;
use Livewire\Component;

class Chartjs extends Component
{
    public $totalAudios = 0;
    public $totalVideos = 0;
    public $totalPdfs = 0;
    public $totalImages = 0;

    public function mount()
    {
        $counts = Resource::select('type', DB::raw('COUNT(*) as total'))
            ->groupBy('type')
            ->pluck('total', 'type');

        $this->totalAudios = $counts[ResourceTypeEnum::Audio->value] ?? 0;
        $this->totalVideos = $counts[ResourceTypeEnum::Video->value] ?? 0;
        $this->totalPdfs   = $counts[ResourceTypeEnum::Pdf->value] ?? 0;
        $this->totalImages = $counts[ResourceTypeEnum::Image->value] ?? 0;
    }

    public function render()
    {
        return view('livewire.resources.components.chartjs');
    }
}
