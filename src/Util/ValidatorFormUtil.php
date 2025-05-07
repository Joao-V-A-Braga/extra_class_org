<?php

namespace App\Util;

use Symfony\Component\Validator\Constraints\GreaterThan;

class ValidatorFormUtil
{
    public static function greaterThanZero(): GreaterThan
    {
        return new GreaterThan([
            'value' => 0,
            'message' => 'O número deve ser maior que 0.',
        ]);
    }
}