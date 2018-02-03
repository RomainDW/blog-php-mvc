<?php

namespace BlogPhp\Controller;

class Admin extends Blog
{
    public function login()
    {
        if ($this->isLogged())
            header('Location: ' . ROOT_URL . '?p=blog&a=index');

        if (isset($_POST['email'], $_POST['password']))
        {
            $this->oUtil->getModel('Admin');
            $this->oModel = new \BlogPhp\Model\Admin;

            $sHashPassword =  $this->oModel->login($_POST['email']);
            if (password_verify($_POST['password'], $sHashPassword))
            {
                $_SESSION['is_logged'] = 1; // Admin est connecté maintenant
                header('Location: ' . ROOT_URL . '?p=blog&a=index');
                exit;
            }
            else
            {
                $this->oUtil->sErrMsg = 'Identifiant ou mot de passe incorrect!';
            }
        }

        $this->oUtil->getView('login');
    }

    public function logout()
    {
        if (!$this->isLogged())
            exit;

        // Si il y a une session, la détruit pour déconnecter l'admin
        if (!empty($_SESSION))
        {
            $_SESSION = array();
            session_unset();
            session_destroy();
        }

        // Redirection à la page d'accueil
        header('Location: ' . ROOT_URL);
        exit;
    }

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
          $aData = array('post_id' => $_GET['id'], 'title' => $_POST['title'], 'body' => $_POST['body']);
          $this->oModel->update($aData);
          $this->oUtil->sSuccMsg = 'L\'article a bien été mis à jour !';

        }
      }

      /* Récupère les données du post */
      $this->oUtil->oPost = $this->oModel->getById($_GET['id']);

      $this->oUtil->getView('edit_post');
    }

    public function delete()
    {
      if (!$this->isLogged()) exit;

      $this->oModel->delete($_GET['id']);
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
}
