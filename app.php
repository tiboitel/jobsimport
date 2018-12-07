<?php

/**
    CREATE DATABASE cmc_test;
    USE cmc_test;
    CREATE TABLE job (
        id int NOT NULL auto_increment,
        reference varchar(255),
        title varchar(255),
        description TEXT,
        url varchar(255),
        company_name varchar(255),
        publication date,
        PRIMARY KEY(id)
    );
*/

require_once __DIR__ . '/JobsImporter.php';
require_once __DIR__ . '/JobsLister.php';

define('SQL_HOST', 'localhost');
define('SQL_USER', 'root');
define('SQL_PWD', 'root');
define('SQL_DB', 'cmc_test');



echo sprintf("Starting...\n");

/* import jobs from regionsjob.xml */
$jobsImporter = new JobsImporter(SQL_HOST, SQL_USER, SQL_PWD, SQL_DB, 'regionsjob.xml');
$count = $jobsImporter->importJobs();
echo sprintf("> %d jobs imported.\n", $count);

/* list jobs */
$jobsLister = new JobsLister(SQL_HOST, SQL_USER, SQL_PWD, SQL_DB);
$jobs = $jobsLister->listJobs();
echo sprintf("> all jobs (%d):\n", count($jobs));
foreach ($jobs as $job) {
    echo sprintf(" %d: %s - %s - %s\n", $job['id'], $job['reference'], $job['title'], $job['publication']);
}


echo sprintf("Done.\n");
