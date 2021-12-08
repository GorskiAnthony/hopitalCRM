<?php

spl_autoload_register(function ($class) {
    $class = str_replace('\\', '/', $class);
    //echo "<pre>$class</pre>";
    require_once "$class.php";
});
