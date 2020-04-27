<?php namespace App\Controllers;

class Home extends BaseController
{
	// protected $request;
	// public function __construct(RequestInterface $request)
 //    {
 //            $this->request = $request;
 //    }
	public function index()
	{	
		$data = [];
		
		// $data['footer'] = ["footer1" => "copyrigth"];
		
		$media =  new \App\Models\MediaModel();
		$tags =  new \App\Models\TagsModel();
		$media_set = $media->getMedia();
		$tag_list = $tags->get();
		$contextual = [];
		foreach ($tag_list as $key => $value) {
			$contextual[] = ["url" => "#", "nav" => $value['name']];
		}
		$data['header'] = ["header_name" => "Home", "contextual" => $contextual, "contextual_name" => "Tags"];
		$data['footer'] = ["js" => ["cuadricula.js"]];
		//echo password_hash("ilovegiantess", PASSWORD_DEFAULT)."\n";
		$data['welcome_message'] = ["media" => $media_set];
		$this->render('welcome_message',$data);	
	}

	

	
	

	//--------------------------------------------------------------------

}
