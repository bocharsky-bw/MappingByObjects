<?php

namespace BW\Type\Scalar;

use BW\Type\Abstracts\Scalar;

/**
 * Float scalar type mapping by Boolean class
 *
 * @author Bocharsky Victor
 */
class Float extends Scalar {
    
    /**
     * Default scalar value of float type
     */
    const _DEFAULT = 0.0;
    
    /**
     * The float value
     * @var integer
     */
    protected $_value;

    
    /**
     * New object initialization of Float type
     * @param float $value
     * @return \Float
     */
    public static function init($value = self::_DEFAULT) {
        
        return new self($value);
    }
    

    /**
     * The Float object constructor
     * @param float $value
     * @throws \Exception
     */
    public function __construct($value = self::_DEFAULT) {
        try {
            if ( is_float($value) === FALSE ) {
                throw new \Exception('Value must be a float type');
            } else {
                $this->_value = $value;
            }
        } catch (\Exception $e) {
            $this->_value = self::_DEFAULT;
            print 'Exception detected! '. $e->getMessage();
        }
    }
    
    /**
     * Callable object as a function for get scalar float value
     * @return float
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
     * Parsing input value to float type
     * @param mixed $value
     * @return \Float
     */
    public function parse($value) {
        try {
            if ( is_scalar($value) === FALSE ) {
                throw new \Exception('Value must be a scalar type');
            } else {
                if ( is_string($value) ) {
                    // also for parsing float numbers with comma
                    $this->_value = (float)str_replace(',', '.', $value);
                } else {
                    $this->_value = (float)$value;
                }
            }
        } catch (\Exception $e) {
            $this->_value = self::_DEFAULT;
            print 'Exception detected! '. $e->getMessage();
        }

        return $this;
    }
    
    /**
     * Clone Float object
     * @return \Float The cloned Float object
     */
    public function toClone() {
        
        return new self($this->_value);
    }
    
    /**
     * Return scalar string value of integer
     * @return string The string value
     */
    public function toString() {
        
        return (string)$this->_value;
    }
    
    /**
     * The float value
     * @return integer The float value
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
class_alias(__NAMESPACE__ .'\Float', __NAMESPACE__ .'\Double');