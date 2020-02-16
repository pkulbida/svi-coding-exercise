Description:
---------------
The application provides a solution for a calculator based 
on the reverse Polish notation (RPN). 
The calculator supports base arithmetic operators (+, -, *, /) 
and works as PHP CLI app. 
It can be extended with other operators: implement ArithmeticOperatorInterface 
and extend ALLOWED_OPERATORS_MAP respectively. 
The RPN algorithm itself is allocated in a separate class - RPNHandler.

App Setup
---------------
```
$ composer install
```

Running the cli php
---------------
bin/cli-calc.php

Running the Tests
-----------------
```
$ vendor/bin/phpunit -v -c tests/phpunit.xml
```

Link 
-----------------
```
https://github.com/pkulbida/svi-coding-exercise
```
