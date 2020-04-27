<?php namespace App\Controllers;

class Collection
 extends BaseController
{
	protected $media;
	protected $media_set;
	protected $request;

	public function __construct()
    {
    	$this->media =  new \App\Models\MediaModel();
		$this->media_set = $this->media->getMedia();
		$this->request = \Config\Services::request();
		$this->session = \Config\Services::session();

    }
	public function index()
	{	
		$data = [];
		
		//echo password_hash("ilovegiantess", PASSWORD_DEFAULT)."\n";
		$data['footer'] = ["js" => ["upload.js"]];
		$data['header'] = ["header_name" => "Upload", "breadcrum" => ["Home" => "/gtproj/"], 'css' => ["gtproj.css"]];
		$this->render('uploaded',$data);	
	}

	public function edit($id = 0) {
		$ids = $this->session->getFlashData('uploaded_ids');
		if (!empty($ids)) {
			$newbies = $this->media->find($ids);
			$data['footer'] = ["js" => ["edit_media.js"]];
			$data['header'] = ["header_name" => "Edit", "breadcrum" => ["Home" => "/gtproj/", "Collection" => "/gtproj/collection"]];
			$data['edit'] = ['newbies' => $newbies];
			// var_dump($newbies);
			$this->render('edit',$data);	
		}
		elseif ($id != 0) {
			//Aqui sabemos que tenemos un id específico
			$newbies = $this->media->find($id);
			$data['footer'] = ["js" => ["edit_media.js"]];
			$data['header'] = ["header_name" => "Edit", "breadcrum" => ["Home" => "/gtproj/", "Collection" => "/gtproj/collection"]];
			$data['edit'] = ['newbies' => $newbies];
			// var_dump($newbies);
			$this->render('edit',$data);

		}
		
		else
			return redirect()->to('/gtproj/');
	}

	

	
	

	//--------------------------------------------------------------------

}
