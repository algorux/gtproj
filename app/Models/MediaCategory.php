<?php namespace App\Models;

use CodeIgniter\Model;

class MediaCategory extends Model
{
	 protected $table      = 'media_category';
     protected $primaryKey = 'id';
     protected $returnType = 'array';
     protected $useSoftDeletes = false;

     protected $allowedFields = ['media_id', 'cat_categories_id'];
     protected $useTimestamps = false;
     
     protected $validationRules    = [];

     
     public function save_first($data){
     	$db = \Config\Database::connect();     
     	$db->table('media_category')->insert($data);
          return $db->insertID();
          // var_dump($ids);
     }
     public function getMediaCat($media_id){
          return $this->where('media_id', $media_id)->findAll();
     }


}