<?php
namespace App\Controller;

use App\Model\JobModel;
use App\Manager\JobsManager;
use App\Utils\Importer;

class JobsController
{
	private $managers;

	public function __construct()
	{
		$this->managers["jobs"] = new JobsManager();
		$this->importer = new Importer();
	}

	public function import($directory) : int
	{
		$models = array();

		// Check if path is a valid directory.
		if (!is_dir($directory))
			throw new \Exception($directory . " is not a valid directory.");

		// Get all files in directory.
		$chdir = scandir($directory);
		foreach ($chdir as $key => $file)
		{
			$method_name = "importFrom";
			$format = "XML";
			if ($file != "." && $file != "..")
			{
				// Forge method name for importer from filename.
				$values = explode(".", $file);
				$filename = ucfirst($values[0]);
				$format = strtoupper($values[1]);
				$method_name = $method_name . $filename . $format;
				// Call the method if she exists, if not, throw an exception.
				if (method_exists($this->importer, $method_name))
					$models = array_merge($this->importer->$method_name($directory . "/" . $file), $models);
				else
					throw new \Exception("Unknown method in Importer class: " . $method_name . ".");
			}
		}

		// Count jobs and add them on SQL database.
		$count = count($models);
		if ($count > 0)
		{
			$this->managers["jobs"]->delete();
			$this->managers["jobs"]->insertMultiple($models);
		}
		return ($this->managers["jobs"]->count());
	}

	public function fetch()
	{
		// Fetch all jobs from database.
		$jobs = $this->managers["jobs"]->getAll();
		return ($jobs);
	}
}
?>
