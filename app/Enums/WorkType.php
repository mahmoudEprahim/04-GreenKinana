<?php

namespace App\Enums;

use BenSampo\Enum\Contracts\LocalizedEnum;
use BenSampo\Enum\Enum;

final class WorkType extends Enum implements LocalizedEnum
{
    const Basic = 0;
    const Temporary = 1;
}
