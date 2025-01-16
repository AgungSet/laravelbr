<?php

if (!function_exists('generateCustomId')) {
    /**
     * Generate a custom unique ID with a prefix.
     *
     * @param string $prefix
     * @param string $model
     * @return string
     */
    function generateCustomId(string $prefix, string $model): string
    {
        $latestId = $model::max('id');
        $number = $latestId ? intval(substr($latestId, strlen($prefix))) + 1 : 1;
        return $prefix . str_pad($number, 7, '0', STR_PAD_LEFT); // ID dengan panjang 10 karakter
    }
}
