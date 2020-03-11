<?php

namespace App\Enums;

use BenSampo\Enum\Contracts\LocalizedEnum;
use BenSampo\Enum\Enum;

final class BranchType extends Enum implements LocalizedEnum
{
    const school = 0;
    const branche = 1;
}
