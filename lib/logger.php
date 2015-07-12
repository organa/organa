<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of logger
 *
 * @author Karstadt
 */
class OgLogger {
    public static function init(){
        
    }
    
    public static function write($message, $type='debug') {
        if(OgConfig::get('Log.'.$type.'FileLog') || !OgConfig::get('Log.'.$type)) {
            $filename = _LOG_.'/'.$type.'.log';
            $trace = debug_backtrace();
            $traceLines = [];
            foreach($trace as $key => $traceLine) {
                $class=!empty($traceLine['class'])?$traceLine['class']:'';
                $type=!empty($traceLine['type'])?$traceLine['type']:'';
                $function=$traceLine['function'];
                $file = $traceLine['file'];
                $line = $traceLine['line'];
                $traceLines[$key] = "{$class}{$type}{$function} (File: {$file}, Line: {$line})";
            }
            $message = '['.date("d.m.Y H:i:s").'][IP: '.$_SERVER['REMOTE_ADDR'].'] '.str_replace("\n", "", serialize($message)).' ['.  serialize($traceLines)."]\n";
            file_put_contents($filename, $message);
        }
    }
}
