<?php

namespace BlogPhp\Model;

class Admin extends Blog
{
    public function login($sEmail)
    {
        $oStmt = $this->oDb->prepare('SELECT email, password FROM Admins WHERE email = :email LIMIT 1');
        $oStmt->bindValue(':email', $sEmail, \PDO::PARAM_STR);
        $oStmt->execute();
        $oRow = $oStmt->fetch(\PDO::FETCH_OBJ);

        return @$oRow->password;
    }

    public function update(array $aData)
    {
      $oStmt = $this->oDb->prepare('UPDATE Posts SET title = :title, body = :body WHERE id = :postId LIMIT 1');
      $oStmt->bindValue(':postId', $aData['post_id'], \PDO::PARAM_INT);
      $oStmt->bindValue(':title', $aData['title']);
      $oStmt->bindValue(':body', $aData['body']);
      return $oStmt->execute();
    }

    public function updateImg($name, $id, $tmp_name)
    {
      $i = [
        'id'     => $id,
        'image'  => $name
      ];

      $oStmt = $this->oDb->prepare('UPDATE Posts SET image = :image WHERE id = :id');
      move_uploaded_file($tmp_name,"static/img/posts/".$i['image']);
      return $oStmt->execute($i);
    }

    public function delete($iId)
    {
      $oStmt = $this->oDb->prepare('DELETE FROM Posts WHERE id = :postId LIMIT 1');
      $oStmt->bindParam(':postId', $iId, \PDO::PARAM_INT);
      return $oStmt->execute();
    }
    public function deleteComments($iId){
      $oStmt = $this->oDb->prepare('DELETE FROM comments WHERE post_id = :postId');
      $oStmt->bindParam(':postId', $iId, \PDO::PARAM_INT);
      return $oStmt->execute();
    }

    public function add(array $aData)
    {
      $oStmt = $this->oDb->prepare('INSERT INTO Posts (title, body, createdDate) VALUES(:title, :body, :created_date)');
      return $oStmt->execute($aData);
    }

    public function postImg($tmp_name, $extension)
    {
      $i = [
        'id'     => $this->oDb->lastInsertId(),
        'image'  => $this->oDb->lastInsertId().$extension
      ];

      $oStmt = $this->oDb->prepare('UPDATE Posts SET image = :image WHERE id = :id');
      move_uploaded_file($tmp_name,"static/img/posts/".$i['image']);
      return $oStmt->execute($i);
    }
}
