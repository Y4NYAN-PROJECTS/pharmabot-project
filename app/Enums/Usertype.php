<?php

namespace App\Enums;


enum Usertype: string
{
    case Admin = 'admin';
    case Student = 'student';

    public function label(): string
    {
        return match ($this) {
            self::Admin   => 'Administrator',
            self::Student => 'Student',
        };
    }

}

