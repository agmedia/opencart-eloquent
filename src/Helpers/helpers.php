<?php

/**
 * function agconf()
 * Expects 'OC_ENV' constant exist in config.php file.
 * $key argument should be dot(.) separated keys as string.
 *
 * @param string      $key
 * @param null|string $default
 *
 * @return string
 *
 */
if ( ! function_exists('agconf')) {
    function agconf($key, $default = null)
    {
        $response = 'Env key not found!';
        $target   = null;
        
        // Check if OC_ENV constant exist.
        if (OC_ENV && ! empty(OC_ENV)) {
            $target = OC_ENV;
        }
        
        // OC_ENV exist.
        // Check it and return if found.
        if ($target) {
            if (strpos($key, '.', 1) !== false) {
                $arr = explode('.', $key);
                
                if (count($arr) == 2 && isset($target[$arr[0]][$arr[1]])) {
                    $response = $target[$arr[0]][$arr[1]];
                }
                if (count($arr) == 3 && isset($target[$arr[0]][$arr[1]][$arr[2]])) {
                    $response = $target[$arr[0]][$arr[1]][$arr[2]];
                }
            }
            
            if (is_string($key) && isset($target[$key])) {
                $response = $target[$key];
            }
        }
        
        // If target key is not found return default if exist.
        if ($default) {
            $response = $default;
        }
        
        return $response;
    }
}