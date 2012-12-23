<?php

namespace MyBookExample;

include "11.php";
include "12.php";

//unqualified name
sayHello();

//qualified name
Chapter8\sayHello();

//Fully qualified name
\MyBookExample\sayHello();
\MyBookExample\Chapter8\sayHello();

echo __NAMESPACE__;