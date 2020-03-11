<?php

namespace App\Enums;

use BenSampo\Enum\Contracts\LocalizedEnum;
use BenSampo\Enum\Enum;

final class VideoType extends Enum implements LocalizedEnum
{
    const Recommended   = 0;
    const Lectures   = 1;
    const Commics = 2; 
}
