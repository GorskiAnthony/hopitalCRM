<?php

spl_autoload_register(function ($class) {
    $class = str_replace('\\', '/', ucfirst($class));
    var_dump($class);
    require_once "$class.php";
});
