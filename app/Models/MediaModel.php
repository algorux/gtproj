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

     public function getMedia($url_data = []) {
          $limit = 10;
          $offset = 0;
          if (!empty($url_data['page'])) {
               $offset = $url_data['page'] * $limit;
          }
          // var_dump($offset);
          unset($url_data['page']);

          $this->db      = \Config\Database::connect();
          if (empty($url_data)) {
               $data = $this->where('private', 0)
                         ->orderBy('id',"DESC")
                   ->findAll($limit, $offset);
               $count = $this->where('private', 0)
                         ->orderBy('id',"DESC")
                   ->countAllResults();
                   // var_dump($count);
               return  ['results' => $data, 'total_count' => $count, 'page' => $offset];
          }
     	else
          {    
               
               if (!empty($url_data["tags"])) {


                    $text_query = " FROM `media` RIGHT JOIN `media_category` ON `media_category`.`media_id` = `media`.`id` RIGHT JOIN `cat_categories` ON `media_category`.`cat_categories_id` = `cat_categories`.`id`";
                    $text_query .= 'WHERE private = 0 AND (cat_categories.name IN ("' .  $url_data["tags"][0].'"';
                    if (count($url_data['tags']) > 1) {
                        for ($i=1;$i<count($url_data['tags']); $i++) {
                              $text_query .= ', "' . $url_data["tags"][$i] . '"';
                         }
                    }
                    $text_query .= ")) GROUP BY media_category.media_id HAVING COUNT(DISTINCT media_category.media_id) = 1";
                    // echo $text_query;
                    $count_query = 'SELECT media.id' .  $text_query ;
                    $text_query = 'SELECT *' . $text_query . " LIMIT " . $offset . "," . $limit;
                    $query = $this->db->query($text_query);
                    $total_results = $this->db->query($count_query);
                    $total_count = 0;
                    $results = [];
                    foreach ($query->getResult() as $row) {
                         $results[] = ['tag' => $row->name, 'url'=> $row->url, 'description' =>  $row->description, 'media_id' => $row->media_id];
                         // var_dump($row);
                         // echo $row->url . "<- url ";
                         // echo $row->description . "<- description ";
                    }
                    foreach ($total_results->getResult() as $value) {
                         
                         $total_count++;
                    }
                    // var_dump($total_count);
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
                    
                    // echo "<pre>";
                    // var_dump($results);
                    // echo "</pre>";
                    return ['results' => $results, 'total_count' => $total_count, 'page' => $offset];
                   
                    
               }
               
          }

     }
     public function getMyCollection($user_id, $url_data = []) {
          $limit = 10;
          $offset = 0;
          if (!empty($url_data['page'])) {
               $offset = $url_data['page'] * $limit;
          }
          unset($url_data['page']);
          $count = $this->where('user_id', $user_id)
                         ->orderBy('id',"DESC")
                   ->countAllResults();
          $results = $this->where('user_id', $user_id)
                         ->orderBy('id',"DESC")
                   ->findAll($limit, $offset);
          // var_dump($results, $user_id);


          return ['results' => $results, 'total_count' => $count, 'page' => $offset];
           
     }
     public function updateMedia($description, $id){
          $db      = \Config\Database::connect();
          $builder = $db->table('media');
          $builder->set('description', $description);
          $builder->where('id', $id);
          $builder->update();
          
     }
     public function save_first($data){
     	$db = \Config\Database::connect();     
     	$db->table('media')->insert($data);
          return $db->insertID();
          // var_dump($ids);
     }

     public function getShowMedia($id){
          $media = $this->find($id);
          $comments = $this->table('comments')->where('media_id', $media_id)->findAll();
          return [$media,$comments];
     }


}