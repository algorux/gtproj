<?php namespace App\Controllers;

class Collection
 extends BaseController
{
	protected $media;
	protected $message;
	protected $request;

	public function __construct()
    {
    		
    	$this->media =  new \App\Models\MediaModel();
    	$this->mediaCategory =  new \App\Models\MediaCategory();
    	$this->tags =  new \App\Models\TagsModel();
		
		$this->request = \Config\Services::request();
		$this->session = \Config\Services::session();
		$this->message = $this->session->getFlashData('message');
		$this->user = $this->session->get('user');


    }
	public function index()
	{	
		
		// $data = [];
		// $tag_list = $this->tags->get();
		// $gets = $this->request->getGet();
		// $media_set = $this->media->getMedia($gets);
		// $contextual = [];
		// foreach ($tag_list as $key => $value) {
		// 	$contextual[] = ["url" => "/gtproj?tags[]=".$value['name'], "nav" => $value['name']];
		// }
		// $data['header'] = ["header_name" => "Home", "contextual" => $contextual, "contextual_name" => "Tags", 'message' => $this->message, 'user' => $this->user];
		// $data['footer'] = ["js" => ["cuadricula.js"]];
		
		// $data['welcome_message'] = ["media" => $media_set['results'], 'total_count' => $media_set['total_count']];
		
		// $this->render('welcome_message',$data);	
		return redirect()->to('/gtproj/');
	}

	public function edit($id = 0) {
		$ids = $this->session->getFlashData('uploaded_ids');
		if (!empty($ids)) {
			$newbies = $this->media->find($ids);
			$data['footer'] = ["js" => ["edit_media.js"]];
			$data['header'] = ["header_name" => "Edit", "breadcrum" => ["Home" => "/gtproj/", "Collection" => "/gtproj/collection"],'user' => $this->user];
			$data['edit'] = ['newbies' => $newbies];
			// var_dump($newbies);
			$this->render('edit',$data);	
		}
		elseif ($id != 0) {
			//Aqui sabemos que tenemos un id específico
			$newbies = $this->media->find($id);
			$data['footer'] = ["js" => ["edit_media.js"]];
			$data['header'] = ["header_name" => "Edit", "breadcrum" => ["Home" => "/gtproj/", "Collection" => "/gtproj/collection"],'user' => $this->user];
			$data['edit'] = ['newbies' => $newbies];
			// var_dump($newbies);
			$this->render('edit',$data);

		}
		
		else
			return redirect()->to('/gtproj/');
	}

	public function myCollection(){
		$data = [];
		$tag_list = $this->tags->get();
		
		$media_set = $this->media->getMyCollection($this->user['id'], $this->request->getGet());
		$contextual = [];
		foreach ($tag_list as $key => $value) {
			$contextual[] = ["url" => "/gtproj/collection/mycollection?tags[]=".$value['name'], "nav" => $value['name']];
		}
		$data['header'] = ["header_name" => "Mi colección",  'message' => $this->message,'user' => $this->user, 'collection' => 'active'];
		$data['footer'] = ["js" => ["cuadricula.js"]];
		
		$data['welcome_message'] = ["media" => $media_set['results'],'total_count' => $media_set['total_count'], 'page' => $media_set['page'], 'uri' => $this->request->uri];
		// echo "<pre>";
		// var_dump($this->request->uri->getQuery());
		// echo "</pre>";
		// var_dump($data['welcome_message']['uri']->getQuery());
		$this->render('welcome_message',$data);	
	}

	public function update() {
		$data = $this->request->getPost();
		if (!empty($data['tags'])) {

			foreach ($data['tags'] as $key => $value) {
				$this->mediaCategory->where('media_id',$key)->delete();
				foreach ($value as $k => $v) {
					
					$this->mediaCategory->save_first(['media_id' => $key, 'cat_categories_id' => $v]);
				}
			}
			# code...
		}
		
		foreach ($data['description'] as $key => $value) {
			if (empty($data['tags'])) {
				$this->mediaCategory->where('media_id',$key)->delete();
			}
			$hashtags = [];
			$parts = explode(" ", $value);

			foreach ($parts as $val) {

				if (strpos( $val,"#") !== false) {
					
					$hashtags[] = strtolower( substr($val, 1) );
				}
			}
			foreach ($hashtags as $value) {
				$cat_id = $this->tags->exists($value);
				if (!$cat_id) {
					$tags = ['name' => $value];
					$cat_id = $this->tags->save_category($tags);
				}
				if ($this->mediaCategory->where('media_id',$key)->where('cat_categories_id', $cat_id)->first() == null ) {
					$tags = ['media_id' => $key, 'cat_categories_id' => $cat_id ];
					$this->mediaCategory->save_first($tags);
				}
				
			}
		}
		$this->session->setFlashdata('message',["message"=>"Actualización correcta", 'type' => "success", "icon" => "fas fa-check"]);
		return redirect()->to('/gtproj/collection');
	}

	

	
	

	//--------------------------------------------------------------------

}
