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
          ->where('active', 's')
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
     public function activeUser($mail, $key) {
          $attempt = $this
          ->where('email', $mail)
          ->first();

          if (!empty($attempt) && ($attempt['renewalkey'] == $key)) {
               $db = \Config\Database::connect(); 
               $sql = "UPDATE user SET active = ?, renewalkey = ''  WHERE id = ?";
               $db->query($sql,array('s',$attempt['id']));
               // $builder = $db->table('user');
               // $builder->set('active', "s", FALSE);
               // $builder->where('id', $attempt['id']);
               // $builder->update();
               return ['message' => "Success",'user'=>$attempt];
          }
          return ['message' => "Falló, la llave ha expirado o el email es incorrecto",'user'=>$attempt];
     }
     public function updateUser($data,$id) {
          

          
          $db = \Config\Database::connect(); 
          // $sql = "UPDATE user SET active = ?, renewalkey = ''  WHERE id = ?";
          // $db->query($sql,array('s',$attempt['id']));
          $builder = $db->table('user');
          $builder->where('id', $id);
          $builder->update($data);
          return;
          
     }
     


}