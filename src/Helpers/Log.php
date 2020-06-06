<?php
/**
 * User: fj.agmedia.hr
 * Date: 16/06/2017
 * Time: 14:36
 */

namespace Agmedia\Helpers;


class Log
{
    
    /**
     * @param        $message
     * @param string $filename
     */
    public static function error($message, $filename = 'error_')
    {
        return self::store($message, $filename);
    }
    
    
    /**
     * @param        $message
     * @param string $filename
     */
    public static function warning($message, $filename = 'warning_')
    {
        return self::store($message, $filename);
    }
    
    
    /**
     * @param        $message
     * @param string $filename
     */
    public static function notice($message, $filename = 'notice_')
    {
        return self::store($message, $filename);
    }
    
    
    /**
     * @param        $message
     * @param string $filename
     */
    public static function info($message, $filename = 'info_')
    {
        return self::store($message, $filename);
    }
    
    
    /**
     * @param        $message
     * @param string $filename
     */
    public static function debug($message, $filename = 'debug_')
    {
        return self::store($message, $filename);
    }
    
    
    /**
     * Log messages.
     *
     * @param        $message
     * @param string $filename
     */
    public static function store($message, $filename)
    {
        $year  = date('Y');
        $month = date('m');
        $day   = date('d');
        
        $path = DIR_LOGS/* . 'store/'*/;
        
        if ( ! is_dir($path . $year)) {
            mkdir($path . $year, 0755, true);
            
            if ( ! is_dir($path . $year . '/' . $month)) {
                mkdir($path . $year . '/' . $month, 0755, true);
                
                if ( ! is_dir($path . $year . '/' . $month . '/' . $day)) {
                    mkdir($path . $year . '/' . $month . '/' . $day, 0755, true);
                }
            }
        }
        
        $handle = fopen($path . $year . '/' . $month . '/' . $day . '/' . $filename . '.log', 'a');
        
        fwrite($handle, date('Y-m-d G:i:s') . ' - ' . print_r($message, true) . "\n");
        fclose($handle);
    }
}