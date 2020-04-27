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
		echo json_encode($this->tags->get());
	}
	
	public function edit($id = 0) {
		
	}

	public function add($tag) {
		
		
	}

	

	
	

	//--------------------------------------------------------------------

}
