<?php

namespace BW\Type\Interfaces;

/**
 * Cloneable interface for clone objects
 * 
 * @author Bocharsky Victor
 */
interface Cloneable {

    public function __clone();
    
    public function toClone();
    
}