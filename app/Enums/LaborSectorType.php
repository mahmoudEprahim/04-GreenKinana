<?php

namespace App\Enums;

use BenSampo\Enum\Contracts\LocalizedEnum;
use BenSampo\Enum\Enum;

final class LaborSectorType extends Enum implements LocalizedEnum
{
    const governmental = 0;
    const private = 1;
}
