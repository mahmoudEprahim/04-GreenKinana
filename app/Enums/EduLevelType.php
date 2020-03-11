<?php

namespace App\Enums;

use BenSampo\Enum\Contracts\LocalizedEnum;
use BenSampo\Enum\Enum;

final class EduLevelType extends Enum implements LocalizedEnum
{
    const primary = 0;
    const middle = 1;
    const secondary = 2;
    const secondarynight = 3;
}
