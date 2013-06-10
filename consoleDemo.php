<?php

require("Console-PHP.php");

// You probably are familiar with Chrome DevTools but if not, you can read up on it here. (Console API Reference)[https://developers.google.com/chrome-developer-tools/docs/console-api]
$test = new Console_PHP;
$test->log("This message won't output");

// Clears the console.
$test->clear();

// Most of the methods can accept an array.
$test->log(array("Chris", "Jack", "Skylar"));

// Displays an object in a pretty way.
$test->dir($test);

// Groups are nice.  
$test->group("A group");

// LOOK! You can even chain methods together.  
$test->log("A string")->error("An error");
$test->groupEnd();

$test->warn("A warning");

$test->groupCollapsed("Counts");

// .count() is a pretty neat method. It shows how many times count is invoked for a specific label.  
$test->count("A warning");
$test->count("A warning");
$test->count("A message");
$test->count("A warning");
$test->groupEnd();

// The first parameter is a condition and if that condition evaluates to false, the assertion fails and a message will be outputted to the console.
$test->assert(false, "this should be true");
// This message will not output. 
$test->assert(true, "this should be true");

// Output Errors  
// Alternatively, you can do `echo (string)$test;` and get the same result. It's up to you.
echo $test->print_errors();