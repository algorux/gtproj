<?php namespace App\Models;

use CodeIgniter\Model;

class CommentsModel extends Model
{
	protected $table      = 'comments';
     protected $primaryKey = 'id';
     protected $returnType = 'array';
     protected $useSoftDeletes = false;

     protected $allowedFields = ['comment','user_id','media_id','collection_id','created_at'];
     protected $useTimestamps = false;
     protected $createdField  = 'created_at';
     protected $validationRules    = [];

     public function catchComment($data) {
          $this->insert($data);
          $data['id'] = $this->insertID();
          $user =  new \App\Models\UserModel();
          $data['user'] = $user->find($data['user_id']);
          unset($data['user']['password']);
          $data['when'] = date("d-m-Y H:i");
          
          return $data;
     }
     public function getComments ($media_id) {
          $db      = \Config\Database::connect();
          $builder = $db->table('comments');
          $builder->select('comment, user_id, comments.created_at, username, gender');
          $builder->where('media_id', $media_id);
          $builder->join('user', 'comments.user_id = user.id');
          return $builder->get()->getResultArray();
          


     }
     
     
     


}