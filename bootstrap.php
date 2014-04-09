<?php
/**
 * Если уже используется autoloader, к примеру composer или похожий, рекомендуется 
 * закомментировать подключение файлов напрямую с помощью require_once
 * или вовсе не использовать данный boostrap.php файл.
 */

// Interfaces
require_once dirname(__FILE__) .'/src/BW/Type/Interfaces/Initializable.php';
require_once dirname(__FILE__) .'/src/BW/Type/Interfaces/ICallable.php';
require_once dirname(__FILE__) .'/src/BW/Type/Interfaces/Cloneable.php';
require_once dirname(__FILE__) .'/src/BW/Type/Interfaces/Parseable.php';
require_once dirname(__FILE__) .'/src/BW/Type/Interfaces/Printable.php';
require_once dirname(__FILE__) .'/src/BW/Type/Interfaces/Scalarable.php';

// Abstract classes
require_once dirname(__FILE__) .'/src/BW/Type/Abstracts/Scalar.php';
require_once dirname(__FILE__) .'/src/BW/Type/Abstracts/Compound.php';

// Classes
require_once dirname(__FILE__) .'/src/BW/Type/Scalar/Boolean.php';
require_once dirname(__FILE__) .'/src/BW/Type/Scalar/Integer.php';
require_once dirname(__FILE__) .'/src/BW/Type/Scalar/Float.php';
require_once dirname(__FILE__) .'/src/BW/Type/Scalar/String.php';
require_once dirname(__FILE__) .'/src/BW/Type/Compound/SimpleArray.php';

use BW\Type\Scalar\Boolean;
use BW\Type\Scalar\Bool;
use BW\Type\Scalar\Integer;
use BW\Type\Scalar\Int;
use BW\Type\Scalar\Float;
use BW\Type\Scalar\Double;
use BW\Type\Scalar\String;
use BW\Type\Scalar\Char;
use BW\Type\Compound\SimpleArray;
use BW\Type\Compound\Arr;

// Code for testing hear...
