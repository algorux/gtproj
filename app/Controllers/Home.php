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
		
		$request = \Config\Services::request();
		$media =  new \App\Models\MediaModel();
		$tags =  new \App\Models\TagsModel();
		
		$tag_list = $tags->get();
		$get_data = $request->getGet();
		$media_set = $media->getMedia($get_data);
		$contextual = [];
		foreach ($tag_list as $key => $value) {
			$contextual[] = ["url" => "/gtproj?tags[]=".$value['name'], "nav" => $value['name']];
		}
		$data['header'] = ["header_name" => "Home", "contextual" => $contextual, "contextual_name" => "Tags"];
		$data['footer'] = ["js" => ["cuadricula.js"]];
		//echo password_hash("ilovegiantess", PASSWORD_DEFAULT)."\n";
		$data['welcome_message'] = ["media" => $media_set];
		// echo "<pre>";
		// var_dump($media_set);
		// echo "</pre>";
		$this->render('welcome_message',$data);	
	}

	

	
	

	//--------------------------------------------------------------------

}
