<?php

/************************************
  Entry point of the project.
  To be run from the command line.
 ************************************/

namespace App;

define('SQL_HOST', 'mariadb');
define('SQL_USER', 'root');
define('SQL_PWD', 'root');
define('SQL_DB', 'cmc_db');
define('RESSOURCES_DIR', __DIR__ . '/../resources/');


function __autoload(string $classname) {
	include_once(__DIR__ . '/' . $classname . '.php');
}


class App
{
	function start()
	{
		echo sprintf("Starting...\n");


		/* import jobs from regionsjob.xml */

		// echo sprintf("> %d jobs imported.\n", $count);


		/* list jobs */

		/*echo sprintf("> all jobs (%d):\n", count($jobs));
		  foreach ($jobs as $job) {
		  echo sprintf(" %d: %s - %s - %s\n", $job['id'], $job['reference'], $job['title'], $job['publication']);
		  }*/


		  echo sprintf("Done.\n");
	}
}

$app = new App();
$app->start();
