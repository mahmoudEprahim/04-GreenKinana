<?php

namespace App\Enums;

use BenSampo\Enum\Contracts\LocalizedEnum;
use BenSampo\Enum\Enum;

final class EnglishGate extends Enum implements LocalizedEnum
{
    const Grammer   = 0;
    const Reading   = 1;
    const Listening = 2;
    const Words     = 3;
}
