<?php

namespace BW\Type\Interfaces;

/**
 * Initializable interface for init objects via constructor or static method
 * 
 * @author Bocharsky Victor
 */
interface Initializable {
    
    public function __construct();
    
    public static function init();
    
}