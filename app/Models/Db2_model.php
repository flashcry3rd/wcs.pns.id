<?php namespace App\Models;

use CodeIgniter\Model;

class Db2_model extends Model
{
    protected $DBGroup = 'db2';

    // ...

    public function check()
    {
        $data = $this->db->query("select * from tb_role")  ;
        $result = $data->getResult('array'); 
        if($result){
            return $result;
        }else{
            return false;
        }
        
    }
}
