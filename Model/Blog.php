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
}
