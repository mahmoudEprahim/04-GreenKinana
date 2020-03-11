<?php

namespace App\Enums;

use BenSampo\Enum\Contracts\LocalizedEnum;
use BenSampo\Enum\Enum;

final class SpecialNeedsType extends Enum  implements LocalizedEnum
{
    const yes = 0;
    const no = 1;
}
