<?php

use Illuminate\Support\Stringable;
use Illuminate\Support\Str;

if (!function_exists('rupiah')) {
    function rupiah(int $num, int $decimals = 0): string {
        return 'Rp'. number_format($num, $decimals, ',', '.');
    }
}

if (!function_exists('str')) {
    function str($string): Stringable {
        if (is_null($string)) return '';

        return Str::of($string);
    }
}
