<?php

class Foo
{
 
}

$object1 = new Foo();
$object2 = new Foo();

var_dump($object1 === $object2); // bool(false)
