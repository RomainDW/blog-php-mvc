<?php

namespace BlogPhp\Model;

class Admin extends Blog
{

  /* ========== SELECT ========== */


  public function inTable($sTable)
  {
    $oStmt = $this->oDb->query("SELECT COUNT(id) FROM $sTable");
    return $oStmt->fetch();
  }


  public function getCommentsUnseen()
  {
    $oStmt = $this->oDb->query("
      SELECT  Comments.id,
              Comments.user_id,
              Comments.comment,
              Comments.post_id,
              Comments.date,
              Comments.signals,
              Posts.title,
              Users.pseudo
      FROM Comments
      JOIN Posts
      ON Comments.post_id = Posts.id
      JOIN Users
      ON Comments.user_id = Users.id
      WHERE Comments.seen = '0'
      AND Comments.signals = '0'
      ORDER BY Comments.date ASC
    ");

    $results = [];

    while($rows = $oStmt->fetchObject())
    {
      $results[] = $rows;
    }
    return $results;
  }


  public function getSignaledComments()
  {
    $oStmt = $this->oDb->query("
      SELECT  Comments.id,
              Comments.user_id,
              Comments.comment,
              Comments.post_id,
              Comments.date,
              Comments.signals,
              Posts.title,
              Users.pseudo
      FROM Comments
      JOIN Posts
      ON Comments.post_id = Posts.id
      JOIN Users
      ON Comments.user_id = Users.id
      WHERE Comments.seen = '0'
      AND Comments.signals > '0'
      ORDER BY Comments.signals
    ");

    $results = [];

    while($rows = $oStmt->fetchObject())
    {
      $results[] = $rows;
    }
    return $results;
  }


  public function getNbrSignals()
  {
    $oStmt = $this->oDb->query("SELECT COUNT(id) FROM Votes");
    return $oStmt->fetch();
  }


  /* ========== UPDATE ========== */


    public function update(array $aData)
    {
      $oStmt = $this->oDb->prepare('UPDATE Posts SET title = :title, body = :body WHERE id = :postId LIMIT 1');
      $oStmt->bindValue(':postId', $aData['post_id'], \PDO::PARAM_INT);
      $oStmt->bindValue(':title', $aData['title'], \PDO::PARAM_STR);
      $oStmt->bindValue(':body', $aData['body'], \PDO::PARAM_LOB);
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


    public function see_comment()
    {
      $oStmt = $this->oDb->exec("UPDATE Comments SET seen = '1' WHERE id='{$_POST['id']}'");
      $oStmt = $this->oDb->exec("DELETE FROM Votes WHERE comment_id = {$_POST['id']}");
      $oStmt = $this->oDb->exec("UPDATE Comments SET signals = '0' WHERE id='{$_POST['id']}'");
    }


    /* ========== DELETE ========== */


    public function delete($iId)
    {
      $oStmt = $this->oDb->prepare('DELETE FROM Posts WHERE id = :postId LIMIT 1');
      $oStmt->bindParam(':postId', $iId, \PDO::PARAM_INT);
      return $oStmt->execute();
    }


    public function deleteComments($iId){
      $oStmt = $this->oDb->prepare('DELETE FROM Comments WHERE post_id = :postId');
      $oStmt->bindParam(':postId', $iId, \PDO::PARAM_INT);
      return $oStmt->execute();
    }


    public function deleteVotes($iId){
      $oStmt = $this->oDb->prepare('DELETE FROM Votes WHERE post_id = :postId');
      $oStmt->bindParam(':postId', $iId, \PDO::PARAM_INT);
      return $oStmt->execute();
    }


    public function deleteComment($iId)
    {
      $oStmt = $this->oDb->prepare('DELETE FROM Comments WHERE id = :id');
      $oStmt->bindParam(':id', $iId, \PDO::PARAM_INT);
      return $oStmt->execute();
    }


    public function deleteVote($iId)
    {
      $oStmt = $this->oDb->prepare('DELETE FROM Votes WHERE comment_id = :comment_id');
      $oStmt->bindParam(':comment_id', $iId, \PDO::PARAM_INT);
      return $oStmt->execute();
    }


    public function delete_comment()
    {
      $oStmt = $this->oDb->exec("DELETE FROM Comments WHERE id = {$_POST['id']}");
      $oStmt = $this->oDb->exec("DELETE FROM Votes WHERE comment_id = {$_POST['id']}");
    }


    /* ========== INSERT ========== */


    public function add(array $aData)
    {
      $oStmt = $this->oDb->prepare('INSERT INTO Posts (title, body, createdDate) VALUES(:title, :body, :created_date)');
      $oStmt->bindValue(':title', $aData['title'], \PDO::PARAM_STR);
      $oStmt->bindValue(':body', $aData['body'], \PDO::PARAM_LOB);
      $oStmt->bindValue(':createdDate', $aData['created_date'], \PDO::PARAM_STR);
      return $oStmt->execute();
    }

}
