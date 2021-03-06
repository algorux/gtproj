<?php namespace App\Controllers;

class Home extends BaseController
{
	protected $media;
	protected $message;
	protected $request;
	protected $mediaCategory;
	protected $tags;
	protected $session;
	protected $disclaimer;
	public function __construct()
    {
    	$this->media =  new \App\Models\MediaModel();
    	$this->mediaCategory =  new \App\Models\MediaCategory();
    	$this->tags =  new \App\Models\TagsModel();
		
		$this->request = \Config\Services::request();
		$this->session = \Config\Services::session();
		$this->message = $this->session->getFlashData('message');
		$this->user = $this->session->get('user');
		$this->disclaimer = $this->session->get('disclaimer');

    }
	public function index()
	{	
		$data = [];
		
		// $data['footer'] = ["footer1" => "copyrigth"];
		
		$request = \Config\Services::request();
		$media =  new \App\Models\MediaModel();
		$tags =  new \App\Models\TagsModel();
		
		$tag_list = $tags->get();
		$get_data = $request->getGet(null, FILTER_SANITIZE_SPECIAL_CHARS);
		$media_set = $media->getMedia($get_data);
		$contextual = [];
		foreach ($tag_list as $key => $value) {
			$contextual[] = ["url" => base_url()."?tags[]=".$value['name'], "nav" => $value['name']];
		}
		$data['header'] = ["header_name" => "Home", "contextual" => $contextual, "contextual_name" => "Tags", 'message' => $this->message, 'user' => $this->user, 'home' => 'active'];
		$data['footer'] = ["js" => ["cuadricula.js"]];
		//echo password_hash("ilovegiantess", PASSWORD_DEFAULT)."\n";
		$data['welcome_message'] = ["media" => $media_set['results'],'user' => $this->user,'total_count' => $media_set['total_count'], 'page' => $media_set['page'], 'uri' => $this->request->uri, 'disclaimer' => $this->disclaimer];
		// echo "<pre>";
		// var_dump($this->request->uri);
		// echo "</pre>";
		$this->render('welcome_message',$data);	
	}
	public function news() {
		$data['header'] = ['user' => $this->user]; 
		$this->render('news',$data);
	}
	public function acceptdisclaimer() {
		$this->session->set('disclaimer', '1');
		echo "Disclaimer";
	}

	

	
	

	//--------------------------------------------------------------------

}
