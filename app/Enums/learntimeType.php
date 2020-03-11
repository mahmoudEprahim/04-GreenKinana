<?php

namespace App\Enums;

use BenSampo\Enum\Contracts\LocalizedEnum;
use BenSampo\Enum\Enum;

final class learntimeType extends Enum implements LocalizedEnum
{
    const fullyear = 0;
    const fullsemester = 1;
    const Partofthefirstchapter = 2;
    const Partofthesecondchapter = 3;
}
