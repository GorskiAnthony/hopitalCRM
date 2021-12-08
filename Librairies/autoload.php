<?php

spl_autoload_register(function ($class) {
    $class = str_replace('\\', '/', ucfirst($class));
    require_once "$class.php";
});
