<?php

namespace BlogPhp\Model;

class Admin extends Blog
{
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
    public function deleteVotes($iId){
      $oStmt = $this->oDb->prepare('DELETE FROM Votes WHERE post_id = :postId');
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

    public function deleteComment($iId)
    {
      $oStmt = $this->oDb->prepare('DELETE FROM comments WHERE id = :id');
      $oStmt->bindParam(':id', $iId, \PDO::PARAM_INT);
      return $oStmt->execute();
    }

    public function deleteVote($iId)
    {
      $oStmt = $this->oDb->prepare('DELETE FROM Votes WHERE comment_id = :comment_id');
      $oStmt->bindParam(':comment_id', $iId, \PDO::PARAM_INT);
      return $oStmt->execute();
    }

    public function inTable($sTable)
    {
      $oStmt = $this->oDb->query("SELECT COUNT(id) FROM $sTable");
      return $oStmt->fetch();
    }

    public function getCommentsUnseen()
    {
      $oStmt = $this->oDb->query("
        SELECT  comments.id,
                comments.user_id,
                comments.comment,
                comments.post_id,
                comments.date,
                comments.signals,
                Posts.title,
                Users.pseudo
        FROM comments
        JOIN Posts
        ON comments.post_id = Posts.id
        JOIN Users
        ON comments.user_id = Users.id
        WHERE comments.seen = '0'
        AND comments.signals = '0'
        ORDER BY comments.date ASC
      ");

      $results = [];

      while($rows = $oStmt->fetchObject())
      {
        $results[] = $rows;
      }
      return $results;
    }

    public function see_comment()
    {
      $oStmt = $this->oDb->exec("UPDATE comments SET seen = '1' WHERE id='{$_POST['id']}'");
      $oStmt = $this->oDb->exec("DELETE FROM Votes WHERE comment_id = {$_POST['id']}");
      $oStmt = $this->oDb->exec("UPDATE comments SET signals = '0' WHERE id='{$_POST['id']}'");
    }

    public function delete_comment()
    {
      $oStmt = $this->oDb->exec("DELETE FROM comments WHERE id = {$_POST['id']}");
      $oStmt = $this->oDb->exec("DELETE FROM Votes WHERE comment_id = {$_POST['id']}");
    }

    public function getSignaledComments()
    {
      $oStmt = $this->oDb->query("
        SELECT  comments.id,
                comments.user_id,
                comments.comment,
                comments.post_id,
                comments.date,
                comments.signals,
                Posts.title,
                Users.pseudo
        FROM comments
        JOIN Posts
        ON comments.post_id = Posts.id
        JOIN Users
        ON comments.user_id = Users.id
        WHERE comments.seen = '0'
        AND comments.signals > '0'
        ORDER BY comments.signals
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

}
