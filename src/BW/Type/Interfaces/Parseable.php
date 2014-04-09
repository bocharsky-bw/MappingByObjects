<?php

namespace BW\Type\Interfaces;

/**
 * Parseable interface for parsing scalar types
 * 
 * @author Bocharsky Victor
 */
interface Parseable {

    public function parse($value);
    
}