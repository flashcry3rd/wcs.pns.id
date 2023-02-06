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

    public function selectAll($table, $select = "")
    {
        $tb = $this->db->table($table);
        if($select != ""){
            $tb->select($select);
        }
        $get = $tb->get();
        $result = $get->getResult('array');
         
        return $result;
    }

    public function dataUpdate($table, $data, $where)
    {
        $tb = $this->db->table($table);
        $get = $tb->where($where);
        $set = $get->set($data);
        $update = $set->update();
        if($update){
            return true;
        }else{
            return false;
        }
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

    public function check_conn()
    {
        $db = \Config\Database::connect('db2');
        $tb = $db->table("master_user");
        $get = $tb->get();
        $result = $get->getResult('array');

        return $result; 
    }

   public function sync2($data)
   {
        $db = \Config\Database::connect('db2');
        
        foreach($data as $d){
            $qCek = $db->query("SELECT * FROM tbl_weight_scale WHERE no_transaksi = '".$d['no_transaksi']."'");
            $row = $qCek->getResult('array');  
            // print_r($d['no_transaksi']);
            if(count($row) < 1){
                $tb = $db->table("tbl_weight_scale");
                $tb->insert($d);
            }
        }
        $qCari = $db->query("SELECT * FROM tbl_weight_scale WHERE sync IS NULL");
        $cari = $qCari->getResult('array');
        $count = count($cari);
        $arr = array("data" => $cari, "count" => $count);
        $dateSync = date("Y-m-d H:i:s");
        // $db->query("UPDATE tbl_weight_scale SET sync = '$dateSync' WHERE sync IS NULL");
        return $arr ;

   }
}