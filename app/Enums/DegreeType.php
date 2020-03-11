<?php

namespace App\Enums;

use BenSampo\Enum\Contracts\LocalizedEnum;
use BenSampo\Enum\Enum;

final class DegreeType extends Enum implements LocalizedEnum
{
    const None = 0;
    const primary = 1;
    const preparatory = 2;
    const High_school = 3;
    const Diploma = 4;
    const Diploma_2 = 5;
    const Diploma_3 = 6;
    const Bachelor = 7;
    const Licentiate = 8;
    const Master = 9;
    const Doctorate = 10;
}
