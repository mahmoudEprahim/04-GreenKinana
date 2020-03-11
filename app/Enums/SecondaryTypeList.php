<?php

namespace App\Enums;

use BenSampo\Enum\Contracts\LocalizedEnum;
use BenSampo\Enum\Enum;

final class SecondaryTypeList extends Enum implements LocalizedEnum
{
    const Vocabulary = 1;
    const structure = 2;
    const essay = 3;
    const translation = 4;
    const exercies = 5;

}
