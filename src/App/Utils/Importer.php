<?php 

namespace App\Utils;

use App\Model\JobModel;

class Importer
{
	// import for jobteaser.xml
	function importFromJobteaserXML($filename) : array
	{
		$count = 0;
		$models = array();
		if (!file_exists($filename))
			throw new \Exception($filename . " is an invalid file.");
		$xml = simplexml_load_file($filename);
		foreach ($xml->offer as $item)
		{
			$models[] = new JobModel(
					addslashes($item->link), 
					addslashes($item->title),
					addslashes($item->description),
					addslashes($item->reference),
					addslashes($item->publisheddate),
					addslashes($item->companyname)
					);
		}
		return ($models);
	}

	// import for regionsjob.xml
	function importFromRegionsjobXML($filename) : array
	{
		$count = 0;
		$models = array();
		if (!file_exists($filename))
			throw new \Exception($filename . " is an invalid file.");
		$xml = simplexml_load_file($filename);
		foreach ($xml->item as $item)
		{
			$models[] = new JobModel(
					addslashes($item->url), 
					addslashes($item->title),
					addslashes($item->description),
					addslashes($item->ref),
					addslashes($item->pubDate),
					addslashes($item->company)
					);

		}
		return ($models);
	}
}
?>
