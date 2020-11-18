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
    public static function error($message, $filename = '')
    {
        return self::catalog($message, 'error_' . $filename);
    }
    
    
    /**
     * @param        $message
     * @param string $filename
     */
    public static function warning($message, $filename = '')
    {
        return self::catalog($message, 'warning_' . $filename);
    }
    
    
    /**
     * @param        $message
     * @param string $filename
     */
    public static function notice($message, $filename = '')
    {
        return self::catalog($message, 'notice_' . $filename);
    }
    
    
    /**
     * @param        $message
     * @param string $filename
     */
    public static function info($message, $filename = '')
    {
        return self::catalog($message, 'info_' . $filename);
    }
    
    
    /**
     * @param        $message
     * @param string $filename
     */
    public static function debug($message, $filename = '')
    {
        return self::catalog($message, 'debug_' . $filename);
    }
    
    
    /**
     * Used for testing and debuging tasks.
     *
     * @param        $message
     * @param string $filename
     */
    public static function test($message, $filename = 'test')
    {
        $handle = fopen(DIR_LOGS . $filename . '.log', 'a');
        fwrite($handle, date('Y-m-d G:i:s') . ' - ' . print_r($message, true) . "\n");
        fclose($handle);
    }
    
    
    /**
     * Logs the data with year/month/ folders and
     * day concat to file name.
     *
     * @param        $message
     * @param string $filename
     */
    public static function catalog($message, $filename = 'agmedia')
    {
        $year  = date('Y');
        $month = date('m');
        $day   = date('d');
        
        $path = DIR_LOGS . $year . '/';
        
        if ( ! is_dir($path . $month)) {
            mkdir($path . $month, 0755, true);
        }
        
        $handle = fopen($path . $month . '/' . $filename . '_' . $day . '.log', 'a');
        
        fwrite($handle, date('Y-m-d G:i:s') . ' - ' . print_r($message, true) . "\n");
        fclose($handle);
    }
    
    
    /**
     * Deprecated function.
     * Should not be used.
     *
     * @param        $message
     * @param string $filename
     *
     * @return mixed
     */
    public function write($message, $filename = 'write')
    {
        return $this->write($message, $filename);
    }
    
    
    /**
     * Deprecated function.
     * Should not be used.
     *
     * @param        $message
     * @param string $filename
     *
     * @return mixed
     */
    public function store($message, $filename = 'store')
    {
        return $this->write($message, $filename);
    }
}