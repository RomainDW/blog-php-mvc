<?php

namespace BlogPhp\Engine\Pattern;

trait Singleton
{
    use Base;

    protected static $_oInstance = null;

    // Obtient l'instance de class.
    public static function getInstance()
    {
        // Renvoie la classe d'instance ou crée la première instance de la classe.
        return (null === static::$_oInstance) ? static::$_oInstance = new static : static::$_oInstance;
    }
}
