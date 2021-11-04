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


if (!function_exists('humanize_sum')) {
    function humanize_sum(int $total) {
        if ($total >= 1000) {
            return $total / 1000 . "rb";
        }

        if ($total >= 1000000) {
            return $total / 1000000 . "jt";
        }

        return $total;
    }
}
