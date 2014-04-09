<?php

namespace BW\Type\Interfaces;

/**
 * Scalarable interface for converting Scalar object to scalar types
 * 
 * @author Bocharsky Victor
 */
interface Scalarable {

    public function toScalar();
    
    public function getValue();
    
}