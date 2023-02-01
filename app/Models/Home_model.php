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

    public function selectAll($table)
    {
        $tb = $this->db->table($table);
        $get = $tb->get();
        $result = $get->getResult('array');
         
        return $result;
    }

    public function dataUpdate($table, $data, $where)
    {
        $tb = $this->db->table($table);
        $tb->where($where);
        $tb->update($data);

        // return $result; 
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
        if($tb->insert($data)){
            return true;
        }else{
            return false;
        }
    }

   
}