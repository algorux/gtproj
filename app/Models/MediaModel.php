<?php namespace App\Models;

use CodeIgniter\Model;

class MediaModel extends Model
{
	 protected $table      = 'media';
     protected $primaryKey = 'id';
     protected $returnType = 'array';
     protected $useSoftDeletes = false;

     protected $allowedFields = ['private', 'url', 'description'];
     protected $useTimestamps = false;
     protected $createdField  = 'created_at';
     protected $validationRules    = [];

     public function getMedia($limit = 10, $offset = 0) {
     	return  $this->where('private', 0)
     				->orderBy('id',"DESC")
                   ->findAll($limit, $offset);

     }
     
     public function save_first($data){
     	$db = \Config\Database::connect();     
     	$db->table('media')->insert($data);
          return $db->insertID();
          // var_dump($ids);
     }


}