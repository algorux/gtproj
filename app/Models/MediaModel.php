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

     protected $db;

     public function getMedia($url_data = [], $limit = 10, $offset = 0) {
          $this->db      = \Config\Database::connect();
          if (empty($url_data)) {
               return  $this->where('private', 0)
                         ->orderBy('id',"DESC")
                   ->findAll($limit, $offset);
          }
     	else
          {    
               
               if (!empty($url_data["tags"])) {

                    $text_query = "SELECT * FROM `media` RIGHT JOIN `media_category` ON `media_category`.`media_id` = `media`.`id` RIGHT JOIN `cat_categories` ON `media_category`.`cat_categories_id` = `cat_categories`.`id`";
                    $text_query .= 'WHERE private = 0 AND (cat_categories.name ="' .  $url_data["tags"][0].'"';
                    if (count($url_data['tags']) > 1) {
                        for ($i=1;$i<count($url_data['tags']); $i++) {
                              $text_query .= ' OR  cat_categories.name ="' . $url_data["tags"][$i] . '"';
                         }
                    }
                    $text_query .= ") LIMIT " . $offset . "," . $limit;
                    // echo $text_query;
                    $query = $this->db->query($text_query);
                    $results = [];
                    foreach ($query->getResult() as $row) {
                         $results[$row->media_id] = ['tag' => $row->name, 'url'=> $row->url, 'description' =>  $row->description, 'media_id' => $row->media_id];
                         // var_dump($row);
                         // echo $row->url . "<- url ";
                         // echo $row->description . "<- description ";
                    }
                    // $query = $this->db->table('cat_categories');
                    // $query->select('*');
                    // $query->join('media_category','media_category.cat_categories_id = cat_categories.id');
                    // $query->join('media', 'media.id = media_category.media_id');
                    // $query->where('cat_categories.name', $url_data["tags"][0]);
                    // if (count($url_data['tags']) > 1) {
                    //     for ($i=1;$i<count($url_data['tags']); $i++) {
                    //           $query->orWhere('cat_categories.name', $url_data['tags'][$i]);
                    //      }
                    // }
                    
                    // // echo "<pre>";
                    // // var_dump($query->getCompiledSelect());
                    // // echo "</pre>";
                    return $results;
                   
                    
               }
               
          }

     }
     public function getMyCollection($user_id, $limit = 10, $offset = 0) {
          return  $this->where('user_id', $user_id)
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