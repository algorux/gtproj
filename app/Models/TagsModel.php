<?php namespace App\Models;

use CodeIgniter\Model;

class TagsModel extends Model
{
	protected $table      = 'cat_categories';
     protected $primaryKey = 'id';
     protected $returnType = 'array';
     protected $useSoftDeletes = false;

     protected $allowedFields = ['name'];
     protected $useTimestamps = false;
     //protected $createdField  = 'created_at';
     protected $validationRules    = [];

     public function get($limit = 10, $offset = 0) {
          $offset = $limit * $offset;
     	return  $this
                         // ->where('languages_id', $languages_id)
     				->orderBy('name',"ASC")
                         ->findAll($limit, $offset);

     }
     
     public function save_category($data){
     	$db = \Config\Database::connect();     
     	$db->table('cat_categories')->insert($data);
          return $db->insertID();
          // var_dump($ids);
     }

     public function exists($name) {
          $return = $this
                         ->where('name', $name)
                         ->first();
          if ($return == null) {
               return false;
          }
          else
               return $return['id'];
     }


}