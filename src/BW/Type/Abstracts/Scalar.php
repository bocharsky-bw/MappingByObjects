<?php

namespace BW\Type\Abstracts;

use BW\Type\Interfaces\Initializable;
use BW\Type\Interfaces\ICallable;
use BW\Type\Interfaces\Cloneable;
use BW\Type\Interfaces\Parseable;
use BW\Type\Interfaces\Printable;
use BW\Type\Interfaces\Scalarable;

/**
 * Mapping abstract scalar type
 * 
 * @author Bocharsky Victor
 */
abstract class Scalar implements Initializable, ICallable, Cloneable, Parseable, Printable, Scalarable {
    
    const _DEFAULT = NULL;
    
    protected $_value;
    

    public static function init() {}
    
    
    abstract public function __construct();
    
    abstract public function __invoke();

    abstract public function __clone();

    abstract public function __toString();
    
    
    abstract public function parse($value);
    
    abstract public function toClone();
    
    abstract public function toString();

    abstract public function toScalar();
    
    abstract public function getValue();
    
}