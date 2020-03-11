<?php

namespace App\Enums;

use BenSampo\Enum\Contracts\LocalizedEnum;
use BenSampo\Enum\Enum;

final class PerstatusType extends Enum implements LocalizedEnum
{
    const regularity = 0;
    const irregular = 1;
    const coming = 2;
    const waiting = 3;
}
