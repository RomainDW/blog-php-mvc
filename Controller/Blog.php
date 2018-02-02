<?php

namespace BlogPhp\Controller;

class Blog
{
  const MAX_POSTS = 5;

  protected $oUtil, $oModel;
  private $_iId;

  public function __construct()
  {
    // Active la session
    if (empty($_SESSION))
        @session_start();

    $this->oUtil = new \BlogPhp\Engine\Util;

    /** Récupère la classe Model dans toute la class controller **/
    $this->oUtil->getModel('Blog');
    $this->oModel = new \BlogPhp\Model\Blog;

    /** Récupère l'identifiant de publication dans le constructeur afin d'éviter la duplication du même code **/
    $this->_iId = (int) (!empty($_GET['id']) ? $_GET['id'] : 0);
  }

  /***** Front end *****/
  // Page d'accueil
  public function index()
  {
      $this->oUtil->oPosts = $this->oModel->get(0, self::MAX_POSTS); // Obtient seulement les X derniers messages

      $this->oUtil->getView('index');
  }
}
