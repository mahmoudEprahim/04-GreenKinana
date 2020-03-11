<?php

namespace App\Enums;

use BenSampo\Enum\Contracts\LocalizedEnum;
use BenSampo\Enum\Enum;

final class EnglishSections extends Enum implements LocalizedEnum
{
    const Study = 1;
    const Exercies = 2;
}
