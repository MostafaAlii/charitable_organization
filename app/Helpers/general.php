<?php

if (!function_exists('get_user_data')) {
    function get_user_data() {
        $guards = ['admin', 'web'];
        foreach ($guards as $guard) {
            if (auth($guard)->check())
                return auth($guard)->user();
        }
        return null;
    }
}