<?php

namespace App\Enums;

use BenSampo\Enum\Contracts\LocalizedEnum;
use BenSampo\Enum\Enum;

final class HallsType extends Enum implements LocalizedEnum
{
    const Hall_1 = 0;
    const Hall_2 = 1;
    const Hall_3 = 2;
    const Hall_4 = 3;
    const Hall_5 = 4;
}
