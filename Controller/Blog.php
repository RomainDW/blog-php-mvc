<?php

namespace BlogPhp\Controller;

if (empty($_GET['a'])) {
	$_GET['a'] = 'index';
}

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

  // Page 404
  public function notFound()
  {
      $this->oUtil->getView('not_found');
  }

  public function post()
  {
    $this->oUtil->oPost = $this->oModel->getById($this->_iId); // Récupère les données du post
	  $this->oUtil->oComments = $this->oModel->getComments();

  	if (isset($_POST['submit_comment']))
    {
        if (empty($_POST['name']) || empty($_POST['comment']))
        {
          $this->oUtil->sErrMsg = 'Tous les champs n\'ont pas été remplis';
        }
        else
        {
          $aData = array('name' => $_POST['name'], 'comment' => $_POST['comment'], 'post_id' => $_GET['id']);
          $this->oModel->addComment($aData);
          ?> <script>window.location.replace('?p=blog&a=post&id=<?= $_GET['id'] ?>');</script> <?php
          $this->oUtil->sSuccMsg = 'Le Commentaire a été posté !';
        }
    }
    $this->oUtil->getView('post');
  }

  public function chapters()
  {
    $this->oUtil->oChapters = $this->oModel->getAll();

    $this->oUtil->getView('chapters');
  }

}
