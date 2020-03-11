<?php

namespace App\Enums;

use BenSampo\Enum\Enum;
use BenSampo\Enum\Contracts\LocalizedEnum;
final class GenderType extends Enum implements LocalizedEnum
{
    const male = 0;
    const female = 1;
}
