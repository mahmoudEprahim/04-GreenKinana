<?php

namespace App\Enums;

use BenSampo\Enum\Contracts\LocalizedEnum;
use BenSampo\Enum\Enum;

final class Terms extends Enum implements LocalizedEnum
{
    const FirstTerm   = 0;
    const SecondTerm   = 1;
}
