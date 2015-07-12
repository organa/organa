<?php

class OgConfig {

    private static $config;

    public static function init() {
        $userConfig = [];
        $defaultConfig = parse_ini_file(_WWW_.'/lib/config/config.ini', TRUE);
        if(file_exists(_CONFIG_.'/config.ini')) {
            $userConfig = parse_ini_file(_CONFIG_.'/config.ini', TRUE);
        }
        self::$config = array_merge($defaultConfig,$userConfig);
    }

    public static function get($key) {
        $config = self::$config;
        if (strpos($key, '.')) {
            list($category, $key) = explode('.', $key);
        }
        if (!empty($category)) {
            $config = $config[$category];
        }
        if (isset($config[$key])) {
            return $config[$key];
        }
        return false;
    }

}
