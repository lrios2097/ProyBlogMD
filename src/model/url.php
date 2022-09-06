<?php

namespace Proyphp\Blog\model;

class Url{

    public static function getRootPath(){
        return substr(__DIR__, 0, strpos(__DIR__, 'src') + 3); // intento recuperar la url, strpos () busca en funcion a un caracter
    }
}

