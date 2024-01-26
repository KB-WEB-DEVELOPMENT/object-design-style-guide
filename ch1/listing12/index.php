<?php

$object1 = new Mutable(10);

// increase $object1 $someNumber property value
$object1->increase();

$object2 = new Immutable(10);

// does not increase $object2 $someNumber property value, returns instead a new Immutable object with $someNumber equal to 11.
$object2 = $object2->increase(); 
