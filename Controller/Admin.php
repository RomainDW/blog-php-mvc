<?php

namespace BlogPhp\Controller;

class Admin extends Blog
{
    public function edit()
    {
      if (!$this->isLogged())
      header('Location: ?p=blog&a=index');

      $this->oUtil->oPosts = $this->oModel->getAll();
      $this->oUtil->getView('edit');
    }

    public function editPost()
    {
      if (!$this->isLogged())
      header('Location: ?p=blog&a=index');

      if (isset($_POST['edit_submit']))
      {
        if (empty($_POST['title']) || empty($_POST['body']))
        {
          $this->oUtil->sErrMsg = 'Tous les champs doivent être remplis.';
        }
        else
        {
          $this->oUtil->getModel('Admin');
          $this->oModel = new \BlogPhp\Model\Admin;

          $aData = array('post_id' => $_GET['id'], 'title' => $_POST['title'], 'body' => $_POST['body']);
          $this->oModel->update($aData);

          if (!empty($_FILES['image']['name']))
          {
            $file = $_FILES['image']['name'];
            $extensions = ['.png','.jpg','.jpeg','.gif','.PNG','.JPG','.JPEG','.GIF'];
            $extension = strrchr($file, '.');
            $id = $_GET['id'];
            if(!in_array($extension,$extensions)){
              $this->oUtil->sErrMsg = "Cette image n'est pas valable";
            }
            $this->oModel->updateImg($_FILES['image']['name'], $_GET['id'], $_FILES['image']['tmp_name']);
          }

          $this->oUtil->sSuccMsg = 'L\'article a bien été mis à jour !';

        }
      }

      /* Récupère les données du post */
      $this->oUtil->oPost = $this->oModel->getById($_GET['id']);

      $this->oUtil->getView('edit_post');
    }

    public function delete()
    {
      if (!$this->isLogged())
      header('Location: ?p=blog&a=index');

      $this->oUtil->getModel('Admin');
      $this->oModel = new \BlogPhp\Model\Admin;

      $this->oModel->deleteComments($_GET['id']); // supprime les commentaires du post
      $this->oModel->delete($_GET['id']); // supprime le post

      header('Location: ?p=admin&a=edit');
    }

    public function add()
    {
      if (!$this->isLogged())
      header('Location: ?p=blog&a=index');

      if (isset($_POST['add_submit']))
      {
          if (empty($_POST['title']) || empty($_POST['body']))
          {
            $this->oUtil->sErrMsg = 'Tous les champs doivent être remplis.';
          }
          else
          {
            $this->oUtil->getModel('Admin');
            $this->oModel = new \BlogPhp\Model\Admin;

            $aData = array('title' => $_POST['title'], 'body' => $_POST['body'], 'created_date' => date('Y-m-d H:i:s'));
            $this->oModel->add($aData);

            if (!empty($_FILES['image']['name']))
            {
              $file = $_FILES['image']['name'];
              $extensions = ['.png','.jpg','.jpeg','.gif','.PNG','.JPG','.JPEG','.GIF'];
              $extension = strrchr($file, '.');
              if(!in_array($extension,$extensions)){
        				  $this->oUtil->sErrMsg = "Cette image n'est pas valable";
        			}
              $this->oModel->postImg($_FILES['image']['tmp_name'], $extension);
            }

            $this->oUtil->sSuccMsg = 'L\'article a bien été ajouté !';
          }
      }

      $this->oUtil->getView('add_post');
    }

    public function deleteComment()
    {
      if (!$this->isLogged())
      header('Location: ?p=blog&a=index');

      $oPost = $this->oUtil->oPost = $this->oModel->getById($_GET['postid']); // Récupère les données du post
      $this->oUtil->getModel('Admin');
      $this->oModel = new \BlogPhp\Model\Admin;

      $iId = $_GET['id'];
      $this->oModel->deleteComment($iId); // supprime le commentaire

      header("Location: ?p=blog&a=post&id=$oPost->id");
    }
}
