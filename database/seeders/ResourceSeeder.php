<?php

namespace Database\Seeders;

use App\Models\Resource;
use App\Models\User;
use App\ResourceTypeEnum;

use Illuminate\Database\Seeder;

class ResourceSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $types = collect(ResourceTypeEnum::cases())->pluck('value')->toArray();

        for ($i = 1; $i <= 50; $i++) {
            $type = $types[array_rand($types)];

            $pathUrl = $this->getTypeUrl($type);

            Resource::create([
                'title' => ucfirst($type) . ' Resource ' . $i,
                'description' => "This is a sample description for {$type} resource number {$i}.",
                'type' => $type,
                'paths' => $pathUrl,
                'user_id' => User::first()->id,
            ]);
        }
    }

    private function getTypeUrl(string $type): string
    {
        $videoUrl = 'https://developer.mozilla.org/shared-assets/videos/flower.webm|https://upload.wikimedia.org/wikipedia/commons/2/2e/Badger_collecting_bedding_material.webm';
        $audioUrl = 'https://upload.wikimedia.org/wikipedia/commons/4/41/1-Shabe_Mahtab.flac|https://ca.wikipedia.org/wiki/Fitxer:Tico_Tico_no_Fub%C3%A1-Orquestra_Colbaz-Zequinha_de_Abreu-1931.ogg';
        $pdfUrl = 'https://jeffe.cs.illinois.edu/teaching/algorithms/book/Algorithms-JeffE.pdf';
        $imageUrl = 'https://upload.wikimedia.org/wikipedia/commons/4/4f/2021_storming_of_the_United_States_Capitol_DSC09254-2_%2850820534063%29_%28retouched%29.jpg';

        return match ($type) {
            ResourceTypeEnum::Video->value => $videoUrl,
            ResourceTypeEnum::Audio->value => $audioUrl,
            ResourceTypeEnum::Pdf->value => $pdfUrl,
            ResourceTypeEnum::Image->value => $imageUrl,
            default => '',
        };
    }
}
