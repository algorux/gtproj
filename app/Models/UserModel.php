<?php namespace App\Models;

use CodeIgniter\Model;

class UserModel extends Model
{
	protected $table      = 'user';
     protected $primaryKey = 'id';
     protected $returnType = 'array';
     protected $useSoftDeletes = false;

     protected $allowedFields = ['username','email','created_at','name','lastname','gender','birthday'];
     protected $useTimestamps = false;
     //protected $createdField  = 'created_at';
     protected $validationRules    = [];

     public function auth($email,$password) {
          $attempt = $this
          ->where('email', $email)
          ->first();
          $attempt['password'] = substr( $attempt['password'], 0, 60 );
          
          if (password_verify($password, $attempt['password'])) {
               return $attempt;
          }
          else
               return NULL;
     }
     public function addUser($user_info){
          $db = \Config\Database::connect(); 
          $db->table('user')->insert($user_info);
          $user_info['id'] = $db->insertID();
          return $user_info;
     }
     
     


}