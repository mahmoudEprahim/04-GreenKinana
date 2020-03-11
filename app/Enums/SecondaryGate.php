<?php

namespace App\Enums;

use BenSampo\Enum\Contracts\LocalizedEnum;
use BenSampo\Enum\Enum;

final class SecondaryGate extends Enum implements LocalizedEnum
{
    const FsrtGrade  = 0;
    const SecondGrade = 1;
    const ThirdGrade = 2;
}
