<?php

namespace App\Enums;

use BenSampo\Enum\Contracts\LocalizedEnum;
use BenSampo\Enum\Enum;

final class LibraryType extends Enum implements LocalizedEnum
{
    const Images   = 0;
    const Videos   = 1;
    const Resources = 2; 
    const Books     = 3;
}
