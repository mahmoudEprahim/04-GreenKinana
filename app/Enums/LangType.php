<?php

namespace App\Enums;

use BenSampo\Enum\Contracts\LocalizedEnum;
use BenSampo\Enum\Enum;

final class LangType extends Enum implements LocalizedEnum
{
    const arabic = 0;
    const english = 1;
    const french = 2;
    const russian = 3;
    const japanese = 4;
    const chinese = 5;
    const spanish = 6;
    const italian = 7;
}
