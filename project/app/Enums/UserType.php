<?php

namespace App\Enums;

class UserType extends Enum
{
    const USER = 'user';
    const ADMIN = 'admin';

    public static function trans($value): string
    {
        return __('enums.user-types.' . $value);
    }
}
