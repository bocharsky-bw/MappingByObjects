<?php

namespace BW\Type\Scalar;

use BW\Type\Abstracts\Scalar;

/**
 * Boolean scalar type mapping by Bool class
 *
 * @author Bocharsky Victor
 */
class Boolean extends Scalar {
    
    /**
     * Default scalar value of boolean type
     */
    const _DEFAULT = FALSE;
    
    /**
     * False value
     */
    const FALSE = FALSE;
    
    /**
     * True value
     */
    const TRUE = TRUE;
    
    /**
     * The boolean value
     * @var boolean
     */
    protected $_value;
    
    
    /**
     * New object initialization of boolean type
     * @param boolean $value
     * @return \Boolean
     */
    public static function init($value = self::_DEFAULT) {
        
        return new self($value);
    }
    
    /**
     * Shortcut  alias of init(TRUE) method
     * @return \Boolean
     */
    public static function initTrue() {
        
        return new self(self::TRUE);
    }
    
    /**
     * Shortcut alias of init(FALSE) method
     * @return \Boolean
     */
    public static function initFalse() {
        
        return new self(self::FALSE);
    }
    

    /**
     * The Bool object constructor
     * @param boolean $value
     * @throws \Exception
     */
    public function __construct($value = self::_DEFAULT) {
        try {
            if (is_bool($value) === FALSE ) {
                throw new \Exception('Value must be a boolean type');
            } else {
                $this->_value = $value;
            }
        } catch (\Exception $e) {
            $this->_value = self::_DEFAULT;
            print 'Exception detected! '. $e->getMessage();
        }
    }
    
    /**
     * Callable object as a function for get scalar boolean value
     * @return boolean
     */
    public function __invoke() {
        
        return $this->_value;
    }
    
    /**
     * Clone objects
     */
    public function __clone() {}
    
    /**
     * Converting object to string
     * @return string
     */
    public function __toString() {
        
        return $this->toString();
    }
    
    
    /**
     * Parsing input value to boolean type
     * @param mixed $value
     * @return \Boolean
     */
    public function parse($value) {
        try {
            if ( is_scalar($value) === FALSE ) {
                throw new \Exception('Value must be a scalar type');
            } else {
                $this->_value = (bool)$value;
            }
        } catch (\Exception $e) {
            $this->_value = self::_DEFAULT;
            print 'Exception detected! '. $e->getMessage();
        }

        return $this;
    }
    
    /**
     * Clone Bool object
     * @return \String The cloned Bool object
     */
    public function toClone() {
        
        return new self($this->_value);
    }
    
    /**
     * Return scalar string value of integer
     * @return string The string value
     */
    public function toString() {
        
        return $this->_value ? 'TRUE' : 'FALSE';
    }
    
    /**
     * The boolean value
     * @return boolean The boolean value
     */
    public function toScalar() {
        
        return $this->_value;
    }
    
    /**
     * Alias of toScalar() method
     * @return boolean The boolean value
     */
    public function getValue() {
        
        return $this->toScalar();
    }
    
    /**
     * Inverting boolean value
     * @return \Boolean
     */
    public function invert() {
        $this->_value = ! $this->_value;
        
        return $this;
    }
    
    /**
     * Alias of invert() method
     * @return \Boolean
     */
    public function inverse() {
        
        return $this->invert();
    }
    
}
// Set shortcut alias of class
class_alias(__NAMESPACE__ .'\Boolean', __NAMESPACE__ .'\Bool');