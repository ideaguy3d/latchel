<?php

$class= 'SplFixedArray';
$reflectedClass = new ReflectionClass($class);
$reflectedClassMethod = new ReflectionMethod($class, 'count');

//Reflection::export($reflectedClass);

$debug = 1;