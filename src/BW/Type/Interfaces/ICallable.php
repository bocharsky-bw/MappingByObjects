<?php

namespace BW\Type\Interfaces;

/**
 * Callable interface for call objects as a functions
 * 
 * @author Bocharsky Victor
 */
interface ICallable {

    public function __invoke();
    
}