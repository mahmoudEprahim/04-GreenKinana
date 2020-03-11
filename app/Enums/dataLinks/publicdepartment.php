<?php

namespace App\Enums\dataLinks;

use BenSampo\Enum\Contracts\LocalizedEnum;
use BenSampo\Enum\Enum;

final class publicdepartment extends Enum implements LocalizedEnum
{
    const allAccounts = 0;
    const onlyTrans = 1;

}
