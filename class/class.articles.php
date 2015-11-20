<?php

class Articles {

	public $data;

	public function __construct() 
	{
		$this->data = new stdClass();
		$this->data->error['status'] = false;
		$this->data->error['message'] = "";
	}

	/*
	 * @function getData - fetch the data from JSON url provided
	 * @param $path = This is the path of your JSON data 
	 * @return JSON $data
	 */
	function getData($path) 
	{
		$obj = file_get_contents($path);

		if($obj) {
			$this->data->articles = json_decode($obj, TRUE);
		} else {
			$this->data->error['status'] = true;
			$this->data->error['message'] = 'Invalid path';
		}

		return json_encode($this->data);
	}

}


