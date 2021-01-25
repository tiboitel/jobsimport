<?php

namespace App\Manager;

use App\Utils\PDODataAccess;

abstract class AbstractManager
{
	protected $dao;

	public function __construct()
	{
		$this->dao = PDODataAccess::getInstance();
	}
}
?>
