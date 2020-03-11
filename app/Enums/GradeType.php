<?php

namespace App\Enums;

use BenSampo\Enum\Contracts\LocalizedEnum;
use BenSampo\Enum\Enum;

final class GradeType extends Enum implements LocalizedEnum
{
    const acceptable = 0;
    const good = 1;
    const verygood = 2;
    const excellent = 3;
}
