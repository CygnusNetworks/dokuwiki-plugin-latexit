<?php

/**
 * Label handler is responsible for keeping all header labels unique.
 *
 * @license GPL 2 http://www.gnu.org/licenses/gpl-2.0.html
 * @author  Adam Kučera <adam.kucera@wrent.cz>
 */

class LabelHandler {

    private static $instance;
    private $labels;
    private $count;
    
    public static function getInstance() {
        if(!isset(LabelHandler::$instance)) {
            LabelHandler::$instance = new LabelHandler();
        }
        return LabelHandler::$instance;
    }
    
    private function __construct() {
        $this->labels = array();
        $this->count = array();
    }
    
    public function newLabel($label) {
        $search = array_search($label, $this->labels);
        if($search === FALSE) {
            $this->labels[] = $label;
            $this->count[] = 1;
        } else {
            $this->count[$search]++;
            $label .= $this->count[$search];
        }
        return $label;
    }
}