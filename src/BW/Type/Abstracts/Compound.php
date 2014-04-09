<?php

namespace BW\Type\Abstracts;

use BW\Type\Abstracts\Compound;
use BW\Type\Interfaces\Initializable;
use ArrayAccess;

/**
 * Mapping abstract compound type
 * 
 * @author Bocharsky Victor
 */
abstract class Compound implements Initializable, ArrayAccess {
    
    private static $_DEFAULT = NULL;
    
    protected $_elements;
    
    protected $_length;
    

    public static function init() {}
    
    abstract public function __construct();
    
    
    abstract public function offsetExists($offset);
    
    abstract public function offsetGet($offset);
    
    abstract public function offsetSet($offset, $value);
    
    abstract public function offsetUnset($offset);
    
}