<?php namespace App\Models;

use CodeIgniter\Model;

class Api_Model extends Model
{
    protected $table = "client_app";

    public function getApp($uid = false){
        
        if( $uid === false){
            $builder = $this->db
                            ->table('client_app');

            return $builder->get();
                           
        } else {
            $builder = $this->db
                            ->table('client_app')
                            ->where('Uid', $uid);
            return $builder->get();
        }

    }

    public function addApp($data){
        $query = $this->db
                      ->table('client_app')->insert($data); 
    }

    public function editApp($id){
            $builder = $this->db
                            ->table('client_app')
                            ->where('id', $id);
            return $builder->get();
    }

    public function updateApp($data, $id){
        $query = $this->db
                      ->table('client_app')
                      ->update($data, array('id' => $id));
        
        return $query;
    }

    public function deleteApp($id){
        $query = $this->db
                      ->table('client_app')
                      ->delete(array('id' => $id));
        
        return $query;

    }

}