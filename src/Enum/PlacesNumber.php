<?php

namespace App\Enum;

enum PlacesNumber: int
{
    case One = 1;
    case Two = 2;
    case Three = 3;
    case Four = 4;
    case Five = 5;
    case Six = 6;
    case Seven = 7;
    case Height = 8;
    case Nine = 9;

    
    public function getLabel(): string
    {
        return match ($this) {
            self::One => '1',
            self::Two => '2',
            self::Three => '3',
            self::Four => '4',
            self::Five => '5',
            self::Six => '6',
            self::Seven => '7',
            self::Height => '8',
            self::Nine => '9',        
        };
    }
}