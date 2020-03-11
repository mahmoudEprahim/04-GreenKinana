<?php

namespace App\Enums;

use BenSampo\Enum\Contracts\LocalizedEnum;
use BenSampo\Enum\Enum;

final class PersonalType extends Enum implements LocalizedEnum
{
    const id = 0;
    const passport = 1;
    const Residence = 2;
}
