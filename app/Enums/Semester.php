<?php

namespace App\Enums;

use BenSampo\Enum\Contracts\LocalizedEnum;
use BenSampo\Enum\Enum;

final class Semester extends Enum implements LocalizedEnum
{
    const firstSemester = 0;
    const secondSemester = 1;
    
}
