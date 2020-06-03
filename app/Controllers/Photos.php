<?php namespace App\Controllers;

use CodeIgniter\RESTful\ResourceController;



class Photos extends ResourceController
{
    protected $modelName = 'App\Models\MediaModel';
    protected $format    = 'json';
    protected $session;
    protected $request;

    public function index()
    {
        return ;
    }
    public function show($id = null)
    {
    	if ($id == null) {
    		return $this->respond("Bad request", 400, "error");
    	}
    	return $this->respond($this->model->getShowMedia($id), 200, "todo bien");
    }
    public function postComment($id = null)
    {
		
		$session = \Config\Services::session();
		
		$user = $session->get('user');
		$data['user_id'] = $user['id'];
		if (empty($user) || $id == null)
			return $this->respond("No autorizado", 401, "error");
		
		$request = \Config\Services::request();
		$data = $request->getPost(null, FILTER_SANITIZE_SPECIAL_CHARS);
		if ($data['comment'] == "") {
			return $this->respond("Comentario vacío", 400, "error");
		}
		$comments =  new \App\Models\CommentsModel();
		$data['media_id'] = $id;
		$data['user_id'] = $user['id'];
		$id_comment = $comments->catchComment($data);
		if ($id_comment['id'] != 0) {
			return $this->respond($id_comment, 200, "ok");
		}
  //       if ($db->insertID() != 0) {
  //       	
  //       }
  //   	return $this->respond(['error' => true]);
		return $this->respond("Bad request", 400, "error");
    }

    public function comments ($id = null) {
    	if ($id == null) {
    		return $this->respond("Bad request", 400, "error");
    	}
    	$comments =  new \App\Models\CommentsModel();
    	$result = $comments->getComments($id);
    	
    	return $this->respond($result, 200, "ok");
    }

    // ...
}