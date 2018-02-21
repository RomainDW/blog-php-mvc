<?php

namespace BlogPhp\Engine;

use BlogPhp\Engine\Pattern\Singleton;

// include des paternes de class nécessaires
require_once __DIR__ . '/Pattern/Base.trait.php';
require_once __DIR__ . '/Pattern/Singleton.trait.php';

class Loader
{
    use Singleton; // Grace au trait, on ne duplique pas le code

    public function init()
    {
        // On enregistre la méthode du loader
        spl_autoload_register(array(__CLASS__, '_loadClasses'));
        // spl_autoload_register() enregistre une fonction dans la pile __autoload() fournie. Si la pile n'est pas encore active, elle est activée.
    }

    private function _loadClasses($sClass)
    {
        // Remplacement du  namespace et du backslash
        $sClass = str_replace(array(__NAMESPACE__, 'BlogPhp', '\\'), '/', $sClass);

        if (is_file(__DIR__ . '/' . $sClass . '.php'))
            require_once __DIR__ . '/' . $sClass . '.php';

        if (is_file(ROOT_PATH . $sClass . '.php'))
            require_once ROOT_PATH . $sClass . '.php';
    }
}
