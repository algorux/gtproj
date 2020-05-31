<?php namespace App\Controllers;

class Upload extends BaseController
{
	protected $media;
	
	protected $request;
	protected $session;

	public function __construct()
    {
    	$this->media =  new \App\Models\MediaModel();
		
		$this->request = \Config\Services::request();
		$this->session = \Config\Services::session();
		$this->user = $this->session->get('user');

    }
	public function index()
	{	
		if (empty($this->user)) {
			$this->session->setFlashdata('message',["message"=>"Inicie sesión", 'type' => "error", "icon" => "fas fa-exclamation-triangle"]);
			return redirect()->to('/gtproj/user/login');
		}
		$data = [];
		
		//echo password_hash("ilovegiantess", PASSWORD_DEFAULT)."\n";
		$data['footer'] = ["js" => ["upload.js"]];
		$data['header'] = ["header_name" => "My Collection", "breadcrum" => ["Home" => "/gtproj/"],'user' => $this->user, 'collection' => 'active'];
		$this->render('upload',$data);	
	}

	public function insertMedia() {
		$nearest_file = $this->request->getFile("media.0");
		$i=1;
		$file[] = $nearest_file;
		while ( $nearest_file != NULL) {
			$nearest_file = $this->request->getFile("media.".$i);
			if ($nearest_file != NULL && $nearest_file->isValid()) {
				$file[] = $nearest_file;
			}
			$i++;
		}
		$ids = [];
		foreach ($file as $value) {
			$newName = $value->getRandomName();
			$value->move(FCPATH.'/assets/uploads/media', $newName);
			
			$data = [
					'user_id' 	=> $this->user['id'],
					'private' 	=> '0',
					'url'		=> "/gtproj/assets/uploads/media/".$newName,
					'mediatype'	=> $value->getClientMimeType(),
 			];
 			
			$ids[] = $this->media->save_first($data);
		}
		
		// $data['footer'] = ["js" => ["cuadricula.js"]];
		// $data['uploaded'] = ["media" => $this->media->find($ids)];
		// $data['header'] = ["header_name" => "Uploaded", "breadcrum" => ["Home" => "/gtproj/", "Upload" => "/gtproj/upload"]];
		// $this->render('uploaded',$data)
		$this->session->setFlashdata('uploaded_ids',$ids);
		return redirect()->to('/gtproj/collection/edit');
	}

	
	

	//--------------------------------------------------------------------

}
