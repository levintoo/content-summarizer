<?php

namespace App\Enums;

enum RoleEnum: Int
{
    case USER = 0;
    case ADMIN = 1;
    case SUPERADMIN = 2;

    public function toLowerCase(): string
    {
        return strtolower($this->name);
    }

    public static function fromValue($value): ?string
    {
        foreach (self::cases() as $case) {
            if ($case->name === $value) {
                return strtolower($case->name);
            }
        }
        return null;
    }
}
