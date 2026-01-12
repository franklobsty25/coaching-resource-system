<?php

namespace App;

enum ResourceTypeEnum: string
{
    case Audio = 'audio';
    case Video = 'video';
    case Image = 'image';
    case Pdf = 'pdf';

    public static function values(): array
    {
        return array_column(self::cases(), 'value');
    }
}
