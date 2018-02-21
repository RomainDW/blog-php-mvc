<?php

namespace BlogPhp\Engine;

// On crée la class Router pour gérer l'éxécution d'un certain code suivant l'URL qui est tapée par l'utilisateur.
class Router
{
    public static function run (array $aParams)
    {
        $sNamespace = 'BlogPhp\Controller\\';
        $sDefCtrl = $sNamespace . 'Blog';
        $sCtrlPath = ROOT_PATH . 'Controller/';
        $sCtrl = ucfirst($aParams['ctrl']); // ucfirst — Met le premier caractère en majuscule

        if (is_file($sCtrlPath . $sCtrl . '.php'))
        {
            $sCtrl = $sNamespace . $sCtrl;
            $oCtrl = new $sCtrl;

            // La classe ReflectionClass rapporte des informations sur une classe.
            // La classe ReflectionMethod rapporte des informations sur une méthode.
            // call_user_func : Appelle une fonction de rappel callback fournie par le paramètre callback où les autres arguments seront passés en paramètre.
            if ((new \ReflectionClass($oCtrl))->hasMethod($aParams['act']) && (new \ReflectionMethod($oCtrl, $aParams['act']))->isPublic())// vérifie si la méthode de act est définit et public
                call_user_func(array($oCtrl, $aParams['act'])); // lance la fonction _loadClasses du Loader qui était enregistré dans spl_autoload_register
            else // si le controller n'est pas reconnu alors renvoie a la page not found
                call_user_func(array($oCtrl, 'notFound'));
        }
        else // si le controller n'existe pas alors renvoie a la page not found
        {
            call_user_func(array(new $sDefCtrl, 'notFound'));
        }
    }
}
