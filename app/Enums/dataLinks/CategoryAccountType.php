<?php

namespace App\Enums\dataLinks;

use BenSampo\Enum\Contracts\LocalizedEnum;
use BenSampo\Enum\Enum;

final class CategoryAccountType extends Enum implements LocalizedEnum
{
    const dept = 0;
    const crpt = 1;
}
