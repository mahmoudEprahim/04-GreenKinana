<?php

namespace App\Enums;

use BenSampo\Enum\Contracts\LocalizedEnum;
use BenSampo\Enum\Enum;

final class Fieldtype extends Enum implements LocalizedEnum
{
    const explain = 0;
    const training = 1;
    
}
