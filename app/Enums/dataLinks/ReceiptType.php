<?php

namespace App\Enums\dataLinks;

use BenSampo\Enum\Contracts\LocalizedEnum;
use BenSampo\Enum\Enum;

final class ReceiptType extends Enum implements LocalizedEnum
{
    const catchReceipt = 0;
    const catchReceiptCheck = 1;
    const receipt = 2;
    const ReceiptCheck = 3;
    const income = 10;
}
