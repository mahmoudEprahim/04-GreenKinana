<?php

namespace App\Enums;

use BenSampo\Enum\Contracts\LocalizedEnum;
use BenSampo\Enum\Enum;

final class MedicalConditionType extends Enum implements LocalizedEnum
{
    const good = 0;
    const bad = 1;
}
