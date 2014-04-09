<?php

namespace BW\Type\Scalar;

use BW\Type\Abstracts\Scalar;

/**
 * Integer scalar type mapping by Int class
 *
 * @author Bocharsky Victor
 */
class Integer extends Scalar {
    
    /**
     * Default scalar value of integer type
     */
    const _DEFAULT = 0;
    
    /**
     * The integer value
     * @var integer
     */
    protected $_value;


    /**
     * New object initialization of integer type
     * @param integer $value
     * @return \Integer
     */
    public static function init($value = self::_DEFAULT) {
        
        return new self($value);
    }
    
    
    /**
     * The Int object constructor
     * @param integer $value
     * @throws \Exception
     */
    public function __construct($value = self::_DEFAULT) {
        try {
            if ( is_integer($value) === FALSE ) {
                throw new \Exception('Value must be an integer type');
            } else {
                $this->_value = $value;
            }
        } catch (\Exception $e) {
            $this->_value = self::_DEFAULT;
            print 'Exception detected! '. $e->getMessage();
        }
    }
    
    /**
     * Callable object as a function for get scalar integer value
     * @return integer
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
     * Parsing input value to integer type
     * @param mixed $value
     * @return \Integer
     */
    public function parse($value) {
        try {
            if ( is_scalar($value) === FALSE ) {
                throw new \Exception('Value must be a scalar type');
            } else {
                $this->_value = (int)$value;
            }
        } catch (\Exception $e) {
            $this->_value = self::_DEFAULT;
            print 'Exception detected! '. $e->getMessage();
        }

        return $this;
    }
    
    /**
     * Clone Int object
     * @return \String The cloned Int object
     */
    public function toClone() {
        
        return new self($this->_value);
    }
    
    /**
     * Return scalar string value of integer
     * @return string The string value
     */
    public function toString() {
        
        return (string)$this->value;
    }
    
    /**
     * The integer value
     * @return integer The integer value
     */
    public function toScalar() {
        
        return $this->_value;
    }
    
    /**
     * Alias of toScalar() method
     * @return integer The integer value
     */
    public function getValue() {
        
        return $this->toScalar();
    }
    
}
// Set shortcut alias of class
class_alias(__NAMESPACE__ .'\Integer', __NAMESPACE__ .'\Int');