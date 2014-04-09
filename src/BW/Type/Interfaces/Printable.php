<?php

namespace BW\Type\Interfaces;

/**
 * Printable interface for printing objects
 * 
 * @author Bocharsky Victor
 */
interface Printable {
    
    public function __toString();
    
    public function toString();
    
}