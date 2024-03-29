<?php

use Illuminate\Support\Str;

function currencyToFloat(string $value): float
{
    $float_val = Str::replace('.', '', $value);
    return (float)Str::replace(',', '.', $float_val);
}
