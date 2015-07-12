<?php
function pr($output) {
    if(OgConfig::get('Log.debug')) {
        echo '<pre>'.print_r($output,true).'</pre>';
    }
    OgLogger::write($output);
}
