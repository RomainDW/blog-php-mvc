
<?php
$status = $_SERVER['REDIRECT_STATUS'];
$codes = array(
       403 => array('403 Forbidden', "Le serveur a refusé de répondre à votre demande."),
       404 => array('404 Not Found', "Le document / fichier demandé n'a pas été trouvé sur ce serveur"),
       405 => array('405 Method Not Allowed', "La méthode spécifiée dans la ligne de demande n'est pas autorisée pour la ressource spécifiée."),
       408 => array('408 Request Timeout', "Votre navigateur n'a pas réussi à envoyer une demande dans le délai imparti par le serveur."),
       500 => array('500 Internal Server Error', "La demande a échoué en raison d'une condition inattendue rencontrée par le serveur."),
       502 => array('502 Bad Gateway', "Le serveur a reçu une réponse non valide du serveur en amont tout en essayant de répondre à la demande."),
       504 => array('504 Gateway Timeout', "Le serveur en amont n'a pas pu envoyer une requête dans le délai autorisé par le serveur."),
);

$title = $codes[$status][0];
$message = $codes[$status][1];
if ($title == false || strlen($status) != 3) {
       $message = "Veuillez fournir un code d'état valide.";
}
?>


<!DOCTYPE html>
<html lang="en">
<head>
  <!--Import Google Icon Font-->
  <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
  <!--Import materialize.css-->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/materialize/0.100.2/css/materialize.min.css">
  <!--Let browser know website is optimized for mobile-->
  <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
  <meta charset="utf-8" />
  <title><?= $title ?></title>
  <style type="text/css">
    div.vert-align {
      position:absolute;
      left: 50%;
      top: 50%;
      width: 600px;
      height: 200px;
      margin-left: -300px;
      margin-top: -100px;
  }
  </style>
  <meta name="author" content="Romain Ollier" />
</head>
<body>
  <div class="center-align vert-align">
    <h1><?= $title ?></h1>

    <p><?= $message ?></p>

    <a href="https://www.romain-ollier.com/projet4/" class="btn blue waves-effect waves-light">Retourner à l'accueil</a>
  </div>
</body
