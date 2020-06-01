<?php namespace App\Controllers;

use CodeIgniter\RESTful\ResourceController;

class Photos extends ResourceController
{
    protected $modelName = 'App\Models\MediaModel';
    protected $format    = 'json';

    public function index()
    {
        return ;
    }
    public function show($id = null)
    {
    	if ($id == null) {
    		return $this->respond(['error' => true]);
    	}
    	return $this->respond($this->model->getShowMedia($id), 200, "todo bien");
    }

    // ...
}