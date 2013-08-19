# Console.PHP

_A project by Devin Clark_

## Installation
Using Composer: 

    {
        "require": {
          "devin-clark/console-php": "dev-master"
        }
    }

Otherwise, just download the class and drop it in somewhere and require it. Pretty simple.

## Example

A super minimal example to get started: 

    require("Console-PHP.php");  
    $errors = new Console_PHP;
    $errors->log("This message won't output")->print_errors();

As you can see, you can also chain methods to your hearts content.  
You probably are familiar with Chrome DevTools but if not, you can read up on it here. [Console API Reference](https://developers.google.com/chrome-developer-tools/docs/console-api) 

## Available Methods
* `->log($message)` - Logs a message to the console.
* `->clear()` - Clears the console.
* `->dir($obj)` - Displays an object in a pretty way.
* `->group("Name")` - Creates a group.
* `->groupCollapsed("Name")` - Creates a collapsed group.
* `->groupEnd()` - Ends the group.
* `->warn($message)` - Logs a warning to the console.
* `->count("Message");` - Shows how many times count is invoked for a specific label.
* `->assert($condition, "Description")` - The first parameter is a condition and if that condition evaluates to false, the assertion fails and a message will be outputted to the console.

### Output Errors  
    echo $test->print_errors();
Alternatively, you can do `echo (string)$test;` and get the same result. It's up to you.
