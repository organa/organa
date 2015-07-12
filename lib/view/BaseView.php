<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

namespace Organa;


class BaseView {
    private $layout = 'default';
    private $defaultLayout = 'default';
    
    public function render() {
        ob_start();
        if(!file_exists(_LIB_.'/www/'.$this->layout.'.ogt')) {
            $this->layout = $this->defaultLayout;
        }
        include _LIB_.'/www/'.$this->layout.'.ogt';
        $result = ob_get_clean();
        return $result;
    }
}
