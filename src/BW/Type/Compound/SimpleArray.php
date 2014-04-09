<?php

namespace BW\Type\Compound;

use BW\Type\Abstracts\Compound;

/**
 * Simple PHP array type mapping by object
 * 
 * @link https://github.com/bocharsky-bw/MappingByObjects/blob/master/Type/Compound/README.md Documentation of String class.
 * @author Bocharsky Victor.
 * @version 1.3.0
 */
class SimpleArray extends Compound {
    
    /**
     * The default array value
     * @var array
     */
    protected static $_DEFAULT = array();
    
    /**
     * The simple array elements
     * @var array
     */
    protected $_elements;
    
    /**
     * The array length
     * @var integer
     */
    protected $_length;

    
    /**
     * The default array value getter
     * @return array The empty array
     */
    public static function getDefault() {
        
        return self::$_DEFAULT;
    }
    
    /**
     * The new object initialization of array type
     * @param array $elements The initial array
     * @return SimpleArray The current SimpleArray object
     */
    public static function init(array $elements = NULL) {   
        return new self($elements);
    }
    
    /**
     * The SimpleArray object constructor
     * @param array $elements The initial array
     */
    public function __construct(array $elements = NULL) {
        if ($elements === NULL) {
            $elements = self::$_DEFAULT;
        }
        $this->_elements = $elements;
        $this->_length = count($elements);
    }
    
    
    public function offsetSet($offset, $value) {
        return $this->set($offset, $value);
    }
    
    public function offsetGet($offset) {
        return $this->get($offset);
    }
    
    public function offsetExists($offset) {
        return $this->exists($offset);
    }
    
    public function offsetUnset($offset) {
        return $this->remove($offset);
    }
    
    /**
     * Callable the object as a function for get array or array element
     * @param mixed $key The element key of array
     * @return mixed The element of array by key
     * or NULL if key is not set
     * or SimpleArray when key is NULL
     */
    public function __invoke($key = NULL) {
        if ($key === NULL) {
            return $this->_elements;
        } 
        
        return $this->get($offset);
    }
    
    /**
     * Clone current objects
     */
    public function __clone() {}
    
    /**
     * Converting the current object to string
     * @return string The current SimpleArray converted to a string
     */
    public function __toString() {
        return $this->toString();
    }
    
    
    /**
     * The array
     * @return array The current SimpleArray converted to an array
     */
    public function toArray() {
        return $this->_elements;
    }
    
    /**
     * Clone the current SimpleArray object
     * @return SimpleArray The cloned current array object
     */
    public function toClone() {
        return new self($this->_elements);
    }
    
    /**
     * Converting object to string
     * @return string The printed array
     */
    public function toString() {
        return print_r($this->_elements, TRUE);
    }
    
    /**
     * Printing the current SimpleArray object
     * @return SimpleArray The current array object
     */
    public function printing($formatted = TRUE) {
        print PHP_EOL;
        print $formatted ? "<pre>". PHP_EOL : "";
        print_r($this->_elements);
        print $formatted ? "</pre>". PHP_EOL : "";
        
        return $this;
    }
    
    /**
     * Dumping the current SimpleArray object
     * @return SimpleArray The current array object
     */
    public function dumping($formatted = TRUE) {
        print PHP_EOL;
        print $formatted ? "<pre>". PHP_EOL : "";
        var_dump($this->_elements);
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
    
    /**
     * Recalculate and get the length of current array
     * @return integer The length of current array
     */
    public function recount() {
        $this->_length = count($this->_elements);
        
        return $this;
    }
    
    /**
     * Searches the array for a given value and returns the corresponding key if successful
     * @param mixed $element
     * @param boolean $strict = FALSE
     * @return mixed The index of current element
     */
    public function indexOf($element, $strict = FALSE) {
        return array_search($element, $this->_elements, $strict);
    }
    
    /**
     * Add value to array
     * @param mixed $value
     * @return \SimpleArray The current array object
     */
    public function add($value) {
        $this->_elements[] = $value;
        $this->_length++;
        
        return $this;
    }
    
    /**
     * Set/Add value to array with key
     * @param mixed $key
     * @param mixed $value
     * @return \SimpleArray The current array object
     */
    public function set($key, $value) {
        if ( ! array_key_exists($key, $this->_elements)) {
            $this->_length++;
        }
        $this->_elements[$key] = $value;
        
        return $this;
    }
    
    /**
     * Get array eleent value by key
     * @param mixed $key Key of array element value
     * @return mixed Array element value by key or NULL if it not exists
     */
    public function get($key) {
        if (isset($this->_elements[$key])) {
            return $this->_elements[$key];
        }
        
        return NULL;
    }
    
    public function exists($key) {
        return isset($this->_elements[$key]);
    }
    
    /**
     * Remove the element from array by key
     * @param mixed $key
     * @return \SimpleArray The current array object
     */
    public function remove($key) {
        if (array_key_exists($key, $this->_elements)) {
            unset($this->_elements[$key]);
            $this->_length--;
        }
        
        return $this;
    }
    
    /**
     * The SimpleArray object with elements in reverse order
     * @param boolean $preserve_keys Preserve keys values
     * @return SimpleArray The current array object
     */
    public function reverse($preserve_keys = FALSE) {
        $this->_elements = array_reverse($this->_elements, $preserve_keys);
        
        return $this;
    }
    
    /**
     * Checks whether the array is empty
     * @return boolean An empty array or not
     */
    public function isEmpty() {
        return $this->_elements ? FALSE : TRUE;
    }
    
    /**
     * Clear array and init empty array by default value
     * @return SimpleArray The current array object
     */
    public function clear() {
        $this->_elements = self::$_DEFAULT;
        $this->_length = count($this->_elements);
        
        return $this;
    }
    
}
// Set shortcut alias of class
class_alias(__NAMESPACE__ .'\SimpleArray', __NAMESPACE__ .'\Arr');
