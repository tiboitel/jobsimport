<?php

namespace App\Manager;

use App\JobModel;
use App\Utils\PDODataAccess;
use App\Manager\AbstractManager;
use PDO;

class JobsManager extends AbstractManager
{
	public function	__construct()
	{
		parent::__construct();
	}

	public function	getAll()
	{
		$jobs =  $this->dao->db->query('SELECT id, reference, title, ' .
				'description, url, company_name, ' . 
				'publication FROM job')->fetchAll(PDO::FETCH_ASSOC);
		return $jobs;
	}

	public function insertMultiple($models)
	{
		// declare prepare request.
		try
		{
			$stmt = $this->dao->db->prepare('INSERT INTO job (reference, ' . 
						'title, description, url, company_name, ' . 
						'publication) VALUES (?, ?, ?, ?, ?, ?)');
			$this->dao->db->beginTransaction();
			// bind values for each jobs.
			foreach ($models as $model)
			{
				$stmt->bindValue(1, $model->getReference());
				$stmt->bindValue(2, $model->getTitle());
				$stmt->bindValue(3, $model->getDescription());
				$stmt->bindValue(4, $model->getLink());
				$stmt->bindValue(5, $model->getCompanyName());
				$stmt->bindValue(6, $model->getPublishedDate());
				$flag = $stmt->execute();
			}
			$this->dao->db->commit();
		} catch (Exception $e)
		{
			echo $e->getMessage();
		}
		return ($flag);
	}

	public function delete()
	{
		$this->dao->db->exec('DELETE FROM job');
	}

	public function	count()
	{
		$count = $this->dao->db->query("SELECT COUNT(*) FROM job");
		return $count->fetchColumn();
	}

	public function close()
	{
		// Release database connection.
		$this->db = null;
	}
}
