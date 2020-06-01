<?php namespace App\Controllers;

class Tags
 extends BaseController
{
	protected $media;
	protected $media_set;
	protected $request;

	public function __construct()
    {
    	$this->tags =  new \App\Models\TagsModel();
		$this->request = \Config\Services::request();
		$this->session = \Config\Services::session();

    }
	public function index()
	{	
		$limit = 10;
		$offset = 1;
		$parameters = $this->request->getGet();
		if (array_key_exists("limit", $parameters)) {
			$limit = (int)$parameters['limit'];
		}
		if (array_key_exists("offset", $parameters)) {
			$offset = (int)$parameters['offset'];
		}
		// var_dump($parameters);
		echo json_encode($this->tags->get($limit,$offset));
	}
	
	public function edit($id = 0) {
		
	}

	public function add($tag) {
		
		
	}


	

	
	

	//--------------------------------------------------------------------

}
