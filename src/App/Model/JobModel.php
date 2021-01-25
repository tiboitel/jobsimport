<?php

namespace App\Model;

class JobModel
{
	private	$link;
	private	$title;
	private	$description;
	private	$reference;
	private	$published_date;
	private	$company_name;
	
	public function __construct($link, $title, $description, $reference,
		$published_date, $company_name)
	{
		$this->link = $link;
		$this->title = $title;
		$this->description = $description;
		$this->reference = $reference;
		$this->published_date = $published_date;
		$this->company_name = $company_name;
	}

	public function getLink() : string
	{
		return $this->link;
	}

	public function getTitle() : string
	{
		return $this->title;
	}

	public function getDescription() : string
	{
		return $this->description;
	}

	public function getReference() : string
	{
		return $this->reference;
	}

	public function getPublishedDate() : string
	{
		return date("Y/m/d", strtotime($this->published_date));
	}

	public function getCompanyName() : string
	{
		return $this->company_name;
	}
}
