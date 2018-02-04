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
}
