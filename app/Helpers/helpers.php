<?php

use App\Models\Setting;

if (!function_exists('setting')) {
    /**
     * Get a setting value by key
     */
    function setting(string $key, mixed $default = null): mixed
    {
        return Setting::get($key, $default);
    }
}

if (!function_exists('set_setting')) {
    /**
     * Set a setting value
     */
    function set_setting(string $key, mixed $value, string $group = 'general', string $type = 'text'): void
    {
        Setting::set($key, $value, $group, $type);
    }
}
