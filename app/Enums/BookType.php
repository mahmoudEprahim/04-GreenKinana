<?php

namespace App\Enums;

use BenSampo\Enum\Contracts\LocalizedEnum;
use BenSampo\Enum\Enum;

final class BookType extends Enum implements LocalizedEnum
{
    const Explain   = 0;
    const trainertext  = 1;
}
