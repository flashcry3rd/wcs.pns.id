<?php namespace App\Models;
use CodeIgniter\Model;
 
class Home_model extends Model
{
    public function getSelect($table, $where)
    {
        $tb = $this->db->table($table);
        $get = $tb->getWhere($where);
        $result = $get->getResult('array');

        return $result;

    }

    public function getSelectRow($table, $where)
    {
        $tb = $this->db->table($table);
        $get = $tb->getWhere($where);
        $row = $get->getRow();

        return $row;
    }

    public function getMenu($id)
    {
        $query = "SELECT b.* FROM master_menu_user as a 
        LEFT JOIN master_menu as b on a.id_menu = b.id WHERE a.id_user = '$id'"; 
        $run = $this->db->query($query);
        $result = $run->getResult('array');

        return $result;
    }

    public function dataInsert($table, $data)
    {
        $tb = $this->db->table($table);
        $insert = $tb->insert($data);
        if($insert){
            return true;
        }else{
            return false;
        }
    }

   
}