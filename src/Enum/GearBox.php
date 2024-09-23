<?php

namespace App\Enum;

enum GearBox: string
{
    case Manual = 'manual';
    case Automatic = 'automatic';

    
    public function getLabel(): string
    {
        return match ($this) {
            self::Manual => 'Boite de vitesse manuelle',
            self::Automatic => 'Boite de vitesse automatique',      
        };
    }
}