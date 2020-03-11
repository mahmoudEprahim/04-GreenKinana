<?php

namespace App\Enums;

use BenSampo\Enum\Contracts\LocalizedEnum;
use BenSampo\Enum\Enum;

final class CurrencyType extends Enum implements LocalizedEnum
{
    const EGP = 0;
    const USD = 1;
}
