<?php

namespace BlogPhp\Model;

class Blog
{
  protected $oDb;

  public function __construct()
  {
    $this->oDb = new \BlogPhp\Engine\Db;
  }

  public function get($iOffset, $iLimit)
  {
    $oStmt = $this->oDb->prepare('SELECT * FROM Posts ORDER BY createdDate DESC LIMIT :offset, :limit');
    $oStmt->bindParam(':offset', $iOffset, \PDO::PARAM_INT);
    $oStmt->bindParam(':limit', $iLimit, \PDO::PARAM_INT);
    $oStmt->execute();
    return $oStmt->fetchAll(\PDO::FETCH_OBJ);
  }

  public function getById($iId)
  {
    $oStmt = $this->oDb->prepare('SELECT * FROM Posts WHERE id = :postId LIMIT 1');
    $oStmt->bindParam(':postId', $iId, \PDO::PARAM_INT);
    $oStmt->execute();
    return $oStmt->fetch(\PDO::FETCH_OBJ);
  }

	public function getComments()
	{
		$oStmt = $this->oDb->query("SELECT * FROM comments WHERE post_id = '{$_GET['id']}' ORDER BY date DESC");
    return $oStmt->fetchAll(\PDO::FETCH_OBJ);
	}

	public function addComment(array $aData)
	{
		$oStmt = $this->oDb->prepare('INSERT INTO comments (name, comment, post_id, date) VALUES(:name, :comment, :post_id, NOW())');
    return $oStmt->execute($aData);
	}

  public function getAll()
  {
    $oStmt = $this->oDb->query('SELECT * FROM Posts ORDER BY createdDate DESC');
    return $oStmt->fetchAll(\PDO::FETCH_OBJ);
  }

  public function delete($iId)
  {
    $oStmt = $this->oDb->prepare('DELETE FROM Posts WHERE id = :postId LIMIT 1');
    $oStmt->bindParam(':postId', $iId, \PDO::PARAM_INT);
    return $oStmt->execute();
  }

  public function update(array $aData)
  {
    $oStmt = $this->oDb->prepare('UPDATE Posts SET title = :title, body = :body WHERE id = :postId LIMIT 1');
    $oStmt->bindValue(':postId', $aData['post_id'], \PDO::PARAM_INT);
    $oStmt->bindValue(':title', $aData['title']);
    $oStmt->bindValue(':body', $aData['body']);
    return $oStmt->execute();
  }

  public function add(array $aData)
  {
    $oStmt = $this->oDb->prepare('INSERT INTO Posts (title, body, createdDate) VALUES(:title, :body, :created_date)');
    return $oStmt->execute($aData);
  }

  public function postImg($tmp_name, $extension){
    $i = [
      'id'     => $this->oDb->lastInsertId(),
      'image'  => $this->oDb->lastInsertId().$extension
    ];

    $oStmt = $this->oDb->prepare('UPDATE Posts SET image = :image WHERE id = :id');
    move_uploaded_file($tmp_name,"static/img/posts/".$i['image']);
    return $oStmt->execute($i);
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
}
