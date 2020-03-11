<?php

namespace App\Enums;

use BenSampo\Enum\Contracts\LocalizedEnum;
use BenSampo\Enum\Enum;

final class PayType extends Enum implements LocalizedEnum
{
    const bank = 0;
    const check = 1;
    const cache = 2;
}
