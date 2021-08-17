<?php

namespace App\Enums;

use App\Helpers\SelectOption;

class UserType extends Enum
{
    const USER = 'user';
    const ADMIN = 'admin';

    public static function trans($value): string
    {
        return __('enums.user-types.' . $value);
    }

    public static function toSelect(): array
    {
        $constants = static::getConstants();

        return collect($constants)
            ->map(function ($constantValue) {
                return new SelectOption($constantValue, self::trans(($constantValue)));
            })
            ->values()
            ->toArray();
    }
}
