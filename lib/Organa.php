<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of Organa
 *
 * @author Michael Dauer
 */
class Organa {

    public static function initialisiere() {
        $oh = opendir('lib/exceptions');
        while (($datei = readdir($oh)) !== false) {
            if (substr($datei, -13) === 'Exception.php') {
                require_once 'lib/exceptions/' . $datei;
            }
        }
        closedir($oh);
    }

    public static function ladeKonstanten() {
        if (!file_exists('lib/config/konstanten.php')) {
            throw new Organa\Exception\NotFoundException('Kann die Konstanten nicht finden!');
        }
        require_once 'lib/config/constants.php';

        if (empty($konstanten)) {
            throw new Organa\Exception\NotFoundException('Kann die Konstanten nicht finden!');
        }
        foreach ($konstanten as $kostante => $wert) {
            define('_' . $konstante . '_', $wert);
        }
    }

}
