<?php

namespace App\Enums;

use BenSampo\Enum\Contracts\LocalizedEnum;
use BenSampo\Enum\Enum;

final class EducationLevelType extends Enum implements LocalizedEnum
{
    const High_school = 0;
    const Diploma = 1;
    const Bachelor = 2;
    const Licentiate = 3;
    const Master = 4;
    const Doctorate = 5;
}
