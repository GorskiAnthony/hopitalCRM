<?php

namespace Librairies;

class Renderer
{
    public static function render($template, $data = [])
    {
        extract($data);
        // Doc : https://www.php.net/manual/fr/function.extract
        ob_start();
        require "templates/$template.html.php";
        $pageContent = ob_get_clean();
        require 'templates/base.html.php';
    }
}
