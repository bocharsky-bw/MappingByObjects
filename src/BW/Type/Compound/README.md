SimpleArray
===========

The PHP array mapping by object
-------------------------------

### How to import?

Import class with the `use` operator:

    use BW\Type\Compound\SimpleArray;

### How to start?

To **create** a `SimpleArray` instance with `new` operator:

    $sa = new SimpleArray();

or use `init()` static method for immediately to use **chain of calls**:

    $sa = SimpleArray::init();

You can pass some **initial array** as the first argument to the object `constructor` or `init()` method:

    $a = array('first', 'second', 'third');
    $sa = new SimpleArray($a); // via object constructor
    $sa = SimpleArray::init($a); // or via init() method

### How to use?

To get **default value** of `SimpleArray` when initial empty object:

    SimpleArray::getDefault(); // return empty PHP array

To **check** is `SimpleArray` empty use `isEmpty()` method:

    $sa->isEmpty(); // return TRUE if $sa is empty or FALSE otherwise

To **add** new element to array:

    $sa->add('fourth');

To **remove** element by index:

    $sa->remove(0);

To **get** element by index:

    echo $sa->get(1); // get value by index "1"

To **set** element by index or add element if index not exists:

    $sa->set(5, 'five'); // add new value "five" by index "5" to array
    echo $sa->get(5); // output "five"
    $sa->set(5, 'fifth'); // replace the existing value "five" with "fifth"
    echo $sa->get(5); // output "fifth"

To check **exists** element by key:

    $sa->exists(6); // return TRUE if element by 6 key is exists in array or FALSE otherwise

To get **index of element**:

    echo $sa->indexOf('fifth'); // output "fifth"

### How to use shortly and more simply?

You can get **shortcut access** to the array elements of `SimpleArray` object like to the simple PHP array:

    $sa[6] = 'some value'; // add/set new value to the array by 6 key
    $value = $sa[6]; // get value by 6 key
    isset($sa[6]); // chech isset element in array by 6 key
    unset($sa[6]); // remove element from array by 6 key

#### How to get length?

To get **number of array elements** in `SimpleArray` object:

    $length = $sa->getLength();

or use shortcut aliases for it:

    $length = $sa->length();
    $length = $sa->count();

#### How to reverse?

To **reverse** an array elements:

    $sa->reverse(); // reverse the array elements
    $sa->reverse(TRUE); // reverse the array elements preserving the keys

#### How to convert object to array?

You can easy **convert** `SimpleArray` object back to a simple PHP array:

    $a = $sa->toArray(); // $a - is a simple PHP array

or do it shorter, called object as function:

    $a = $sa(); // $a - is a simple PHP array

**NOTE:**
You can also get an element value by key, you need to pass the key in first parameter:

    $two = $sa(2);

#### How to clean?

You can easy **clean out** `SimpleArray` to default value:

    $sa->clear(); // $sa is an empty array with default value now

#### How to debug?

You can easy **debug** `SimpleArray` object:

    // Store debug information to the variable
    $debug = $sa->toString(); // equal to: $debug = print_r($a->toArray(), TRUE); 
    // ... and then printing it later
    echo $debug;

or output debug information straight to the browser:

    $sa->printing(); // equal to: print_r($sa->toArray());
    $sa->dumping(); // equal to: var_dump($sa->toArray());

Output automatically will be **wrapped** with `<pre></pre>` tag. If you don't want to use output formatting with `<pre></pre>` tag, you can pass `FALSE` by first parameter to `printing` or `dumping` methods:

    $sa->printing(FALSE);
    $sa->dumping(FALSE);

#### How to clone?

You can easy to **clone** `SimpleArray` object:

    $sa = SimpleArray::init(array('first', 'second', 'third'));
    $sb = clone $sa;

or do it with built-in method `toClone()`:

    $sb = $sa->toClone();

Now `$sa` and `$sb` are two different objects with same data and you can use them independently.

**NOTE:**
If you just try to **assign** `$sa` to `$sb`:

    $sb = $sa;
    $sb->add('fourth');
    if ($sa === $sb) {
        echo 'equal'; // $sa equal to $sb, because $sb is a reference to $sa
    }

you only copied a reference to the same object, not a value of it, because in PHP objects assign by **reference**!

### How to work with built-in PHP functions?

You can use any **built-in PHP functions** when work with `SimpleArray`. But first you need to convert `SimpleArray` object back to PHP array:

    $a = array(0 => 'zero', 1 => 'first');
    $sa = new SimpleArray(array(1 => 'one', 2 => 'two'));
    $sa = SimpleArray::init(array_merge($a, $sa->toArray()));
    // or use magic invoke to get the PHP array, called object as function:
    $sa = SimpleArray::init(array_merge($a, $sa()));

### What's inside?

 - Project on [GitHub][1] 
 - Code of [SimpleArray][2] 
 
*It's simple, isn't it? :)*
 
  [1]: https://github.com/bocharsky-bw/MappingByObjects
  [2]: https://github.com/bocharsky-bw/MappingByObjects/blob/master/src/BW/Type/Compound/SimpleArray.php
