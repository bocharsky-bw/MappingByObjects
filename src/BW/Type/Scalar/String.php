<?php

namespace BW\Type\Scalar;

use BW\Type\Abstracts\Scalar;

/**
 * String scalar type mapping by object
 *
 * @link https://github.com/bocharsky-bw/MappingByObjects/blob/master/Type/String/README.md Documentation of SimpleArray class.
 * @author Bocharsky Victor.
 * @version 1.2.0
 */
class String extends Scalar {
    
    /**
     * Br html tag
     */
    const BR = "<br>";
    
    /**
     * End of line
     */
    const EOL = "\n";
    
    /**
     * Br html tag with end of line
     */
    const BREOL = "<br>\n";
    
    /**
     * Default scalar value of string type
     */
    const _DEFAULT = "";

    /**
     * The string value
     * @var string
     */
    protected $_value;

    /**
     * The string length
     * @var integer
     */
    protected $_length;
    
    
    /**
     * New object initialization of string type
     * @param string $value
     * @return \String
     */
    public static function init($value = self::_DEFAULT) {
        
        return new self($value);
    }
    
    /**
     * The String object constructor
     * @param string $value
     * @throws \Exception
     */
    public function __construct($value = self::_DEFAULT) {
        try {
            if ( is_string($value) === FALSE ) {
                throw new \Exception('Value must be a string type');
            } else {
                $this->_value = $value;
            }
        } catch (\Exception $e) {
            $this->_value = self::_DEFAULT;
            print $e->getMessage();
        }

        $this->countLength();
    }

    /**
     * Parsing input value to string type
     * @param mixed $value
     * @return \String
     */
    public function parse($value) {
        // try {
        //     if ( is_scalar($value) === FALSE ) {
        //         throw new \Exception('Value must be a scalar type');
        //     } else {
        //         $this->_value = (string)$value;
        //     }
        // } catch (\Exception $e) {
        //     $this->_value = self::_DEFAULT;
        //     print $e->getMessage();
        // }

        // return $this;
    }
    
    /**
     * Callable object as a function for get scalar string value
     * @return string
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
     * Counting the length of current String value
     * @return integer The length of string
     */
    private function countLength() {

        $this->_length = strlen($this->_value);
    }
    
    /**
     * Clone String object
     * @return \String The cloned String object
     */
    public function toClone() {
        
        return new self($this->_value);
    }
    
    /**
     * The string value
     * @return string The string value
     */
    public function toScalar() {
        
        return $this->_value;
    }
    
    /**
     * Return scalar string value
     * @return string The string value
     */
    public function toString() {
        
        return $this->toScalar();
    }
    
    /**
     * Shortcut alias of toScalar() method
     * @return string The string value
     */
    public function getValue() {
        
        return $this->toScalar();
    }

    /**
     * Printing the current object value
     * @return \String The current object
     */
    public function printing($formatted = TRUE) {
        print PHP_EOL;
        print $formatted ? "<pre>". PHP_EOL : "";
        print_r($this->_value);
        print $formatted ? "</pre>". PHP_EOL : "";

        return $this;
    }

    /**
     * Dumping the current object value
     * @return \String The current array object
     */
    public function dumping($formatted = TRUE) {
        print PHP_EOL;
        print $formatted ? "<pre>". PHP_EOL : "";
        var_dump($this->_value);
        print $formatted ? "</pre>". PHP_EOL : "";
        
        return $this;
    }

    /**
     * Get the length of current array
     * @return integer The length of current array
     */
    public function getLength() {
        
        return $this->_length;
    }
        
    /**
     * Shortcut alias of getLength() method
     * @return integer The length of current array
     */
    public function length() {
        
        return $this->getLength();
    }
    
    /**
     * Shortcut alias of getLength() method
     * @return integer The length of current array
     */
    public function count() {
        
        return $this->getLength();
    }

    /*** Object return ***/
    /**
     * Trimmed string on both sides
     * @return \String
     */
    public function trim() {
        $this->_value = trim($this->_value);
        $this->countLength();
        
        return $this;
    }
    
    /**
     * Trimmed string on left side
     * @return \String
     */
    public function trimLeft() {
        $this->_value = ltrim($this->_value);
        $this->countLength();
        
        return $this;
    }
    
    /**
     * Trimmed string on right side
     * @return \String
     */
    public function trimRight() {
        $this->_value = rtrim($this->_value);
        $this->countLength();
        
        return $this;
    }
    
    /**
     * Replace all occurrences of the search string with the replacement string 
     * @param mixed $search
     * @param mixed $replace
     * @return \String
     */
    public function replace($search, $replace) {
        $this->_value = str_replace($search, $replace, $this->_value);
        $this->countLength();
        
        return $this;
    }
    
    /**
     * Perform a regular expression search and replace
     * @param mixed $pattern
     * @param mixed $replacement
     * @return \String
     */
    public function replaceRegEx($pattern, $replacement) {
        $this->_value = preg_replace($pattern, $replacement, $this->_value);
        $this->countLength();
        
        return $this;
    }
    
    /**
     * String to lower case
     * @return \String
     */
    public function toLower() {
        $this->_value = strtolower($this->_value);
        
        return $this;
    }
    
    /**
     * String to upper case
     * @return \String
     */
    public function toUpper() {
        $this->_value = strtoupper($this->_value);
        
        return $this;
    }
    
    /**
     * Make a string's first character uppercase
     * @return \String
     */
    public function toCapitalizeFirst() {
        $this->_value = ucfirst($this->_value);
        
        return $this;
    }
    
    /**
     * Shortcut alias of toCapitalizeFirst() method
     * @return \String
     */
    public function toCapitalize() {
        
        return $this->toCapitalizeFirst();
    }
    
    /**
     * Uppercase the first character of each word in a string
     * @return \String
     */
    public function toCapitalizeWords() {
        $this->_value = ucwords($this->_value);
        
        return $this;
    }
    
    /**
     * Shortcut alias of toCapitalizeWords() method
     * @return \String
     */
    public function toCapitalizeFully() {
        
        return $this->toCapitalizeWords();
    }
    
    /**
     * Return part of the string
     * @param integer $start
     * @param integer $length
     * @return \String
     */
    public function subString($start, $length) {
        $this->_value = substr($this->_value, $start, $length);
        $this->countLength();
        
        return $this;
    }
    
    /**
     * Shortcut for return part of the string of certain length from the beginning of string
     * @param integer $length
     * @return \String
     */
    public function subStringTo($length) {
        $this->_value = substr($this->_value, 0, $length);
        $this->countLength();
        
        return $this;
    }
    
    /**
     * Shortcut for return part of the string from the index to the end od string
     * @param integer $start
     * @return \String
     */
    public function subStringFrom($start) {
        $this->_value = substr($this->_value, $start);
        $this->countLength();
        
        return $this;
    }
    
    /**
     * Append new string with concatenation to String object
     * @param string $value
     * @return \String
     */
    public function append($value) {
        $this->_value = $this->_value . $value;
        $this->countLength();
        
        return $this;
    }
    
    /**
     * Prepend new string with concatenation to String object
     * @param string $value
     * @return \String
     */
    public function prepend($value) {
        $this->_value = $value . $this->_value;
        $this->countLength();
        
        return $this;
    }
    
    /**
     * Shortcut alias of prepend() method
     * @return \String
     */
    public function appendTo($value) {
        
        return $this->prepend($value);
    }
    
    /**
     * Shortcut alias of append() method
     * @return \String
     */
    public function prependTo($value) {
        
        return $this->append($value);
    }
    
    /**
     * Shortcut alias of append() method
     * @return \String
     */
    public function concat($value) {
        
        return $this->append($value);
    }
    
    /**
     * Calculate the md5 hash of a string
     * @return \String
     */
    public function md5($count = 1) {
        $count = (int) $count;
        if ($count < 0) {
            $count = 0;
        }
        for ($i = 0; $i < $count; $i++) {
            $this->_value = md5($this->_value);
        }
        
        return $this;
    }
    
    /**
     * Calculate the sha1 hash of a string
     * @return \String
     */
    public function sha1($count = 1) {
        $count = (int) $count;
        if ($count < 0) {
            $count = 0;
        }
        for ($i = 0; $i < $count; $i++) {
            $this->_value = sha1($this->_value);
        }
        
        return $this;
    }
    
    /**
     * One-way string hashing
     * @param string $salt
     * @return \String
     */
    public function crypt($salt = '') {
        $this->_value = crypt($this->_value, $salt);
        
        return $this;
    }

    /**
     * Generate a hash value (message digest)
     * @param string $algorithm
     * @return \String
     * @throws \Exception
     */
    public function hash($algorithm) {
        try {
            if ( in_array($algorithm, hash_algos()) ) {
                $this->_value = hash($algorithm, $this->_value);
                
                return $this;
            }
            throw new \Exception("Algorithm \"$algorithm\" not found!");
        } catch (\Exception $e) {
            print 'Exception detected! '. $e->getMessage();
        }
        
        return $this;
    }

    /*** Boolean return ***/
    /**
     * Check is equal string
     * @return boolean
     */
    public function isEqualTo($string, $sensitive = TRUE) {

        if ($sensitive == TRUE) {
            return strcmp($this->_value, $string) === 0;
        }

        return strcasecmp($this->_value, $string) === 0;
    }
    
    /**
     * Check is string empty
     * @return boolean
     */
    public function isEmpty() {
        
        return $this->_value ? FALSE : TRUE;
    }
}
// Set shortcut alias of class
class_alias(__NAMESPACE__ .'\String', __NAMESPACE__ .'\Char');