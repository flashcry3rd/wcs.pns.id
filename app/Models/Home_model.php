<?php namespace App\Models;
use CodeIgniter\Model;
 
class Home_model extends Model
{
    public function getSelect($table, $where = "", $like = "")
    {
        $tb = $this->db->table($table);
        if($where != ""){
            $get = $tb->getWhere($where);
        }
        if($like != ""){
            $tb->like($like);
            $get = $tb->get();
        }
        // $rs = $get->getCompiledSelect();
        // print_r($rs);
        $result = $get->getResult('array');
        // print_r($this->db->getLastQuery());

        return $result;

    }

    public function getSelectRow($table, $where)
    {
        $tb = $this->db->table($table);
        $get = $tb->getWhere($where);
        $row = $get->getRow();

        return $row;
    }

    public function getSelectList($table, $where)
    {
        $tb = $this->db->table($table);
        $get = $tb->getWhere($where);
        $result = $get->getResult('array');

        return $result;
    }

    public function getSelectReportAll($table, $where = ""){
        $tb = $this->db->table("$table as A");
        $tb->select("A.*, B.nama_vendor as nama_kontraktor, C.nama_vendor as nama_kontraktor_delivery");
        $tb->join("master_vendor as B", "B.kode_vendor = A.kode_kontraktor","left");
        $tb->join("master_vendor as C", "C.kode_vendor = A.kontraktor_delivery","left");
        if($where != ""):
            $get = $tb->getWhere($where);
        endif;
        $result = $get->getResultArray();

        return $result;
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
        $tipe = session()->get('tipe');
        if($tipe=='truck'){
            $where = "and b.tipe in ('ALL', 'JBT')";
        }elseif($tipe=='cu'){
            $where = "and b.tipe in ('ALL', 'CU')";
        }else{
            $where = "";
        }
        $query = "SELECT b.* FROM master_menu_user as a 
        LEFT JOIN master_menu as b on a.id_menu = b.id WHERE a.id_user = '$id' $where "; 
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

    public function test_sync()
    {
        $db = \Config\Database::connect('db2');

        $noTrans1 = $db->query("SELECT no_transaksi FROM tbl_weight_scale");
        
        $result = $noTrans1->getResult('array');
        $arrN = array();
        foreach($result as $r)
        {
            array_push($arrN, $r['no_transaksi']) ;
        }
        
        $select = $this->db->table("tbl_weight_scale");
        $select = $select->havingNotIn('no_transaksi', $arrN);
        $select = $select->get();
        $result2 = $select->getResult('array');

        foreach($result2 as $r2){
            $insert = $db->table("tbl_weight_scale_test");
            $insert->insert($r2);
        }

        $noTrans2 = $this->db->query("SELECT no_transaksi FROM tbl_weight_scale");
        $result3 = $noTrans2->getResult('array');
        $arrN2 = array();
        foreach($result3 as $r3)
        {
            array_push($arrN2, $r3['no_transaksi']) ;
        }
        
        $select2 = $db->table("tbl_weight_scale");
        $select2 = $select2->havingNotIn('no_transaksi', $arrN2);
        $select2 = $select2->get();
        $result4 = $select2->getResult('array');

        foreach($result4 as $r4){
            $insert = $this->db->table("tbl_weight_scale");
            $insert->insert($r4);
        }
        

        return count($arrN)." // ".count($arrN2) ;

        
    }

   public function sync2($data, $noTrans)
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

        $dateNow = date("Y-m-d");
        $dateSync = date("Y-m-d", strtotime("-1 day", strtotime($dateNow)));
        $qCari = $db->query("SELECT no_transaksi, tipe, no_tiket_mobil, tiket_barge, no_wo, kode_petak, ancak, jenis_tebu, tgl_harvesting, tgl_muat, kode_kontraktor, loading_vehicle_number, loading_vehicle_operator, kode_barge, kode_tugboat, tugboat_captain, tujuan_tugboat, kode_truck, supir, kepala_regu, weight_in, weight_in_time, weight_out, weight_out_time, retase, kontraktor_delivery, no_polisi, tujuan, no_alat2, op_alat2, del, createby, sync, operator_timbang, trash_status FROM tbl_weight_scale WHERE sync IS NULL and weight_out_time >= '$dateSync'");
        $cari = $qCari->getResult('array');
        foreach($cari as $c){
            $qCek = $this->db->query("SELECT * FROM tbl_weight_scale WHERE no_transaksi = '".$c['no_transaksi']."'");
            $res = $qCek->getResult('array');
            if(count($res) < 1){
                $table = $this->db->table("tbl_weight_scale");
                $table->insert($c);
            }
        }
        $arr = array("data" => $cari);
        
        // $db->query("UPDATE tbl_weight_scale SET sync = '$dateSync' WHERE sync IS NULL");
        return $arr ;

        // $db = \Config\Database::connect('db2');
        // $dateNow = date("Y-m-d");
        // $dateSync = date("Y-m-d", strtotime("-1 day", strtotime($dateNow)));
        // $noTrans1 = $db->query("SELECT no_transaksi FROM tbl_weight_scale ");
        
        // $result = $noTrans1->getResult('array');
        // $arrN = array();
        // foreach($result as $r)
        // {
        //     array_push($arrN, $r['no_transaksi']) ;
        // }
        
        // $select = $this->db->table("tbl_weight_scale");
        // $select = $select->havingNotIn('no_transaksi', $arrN);
        // $select = $select->get();
        // $result2 = $select->getResult('array');

        // foreach($result2 as $r2){
        //     $insert = $db->table("tbl_weight_scale");
        //     $insert->insert($r2);
        // }

        // $noTrans2 = $this->db->query("SELECT no_transaksi FROM tbl_weight_scale ");
        // $result3 = $noTrans2->getResult('array');
        // $arrN2 = array();
        // foreach($result3 as $r3)
        // {
        //     array_push($arrN2, $r3['no_transaksi']) ;
        // }
        
        // $select2 = $db->table("tbl_weight_scale");
        // $select2 = $select2->havingNotIn('no_transaksi', $arrN2);
        // $select2 = $select2->get();
        // $result4 = $select2->getResult('array');

        // foreach($result4 as $r4){
        //     $insert = $this->db->table("tbl_weight_scale");
        //     $insert->insert($r4);
        // }
        

        // return count($arrN)." // ".count($arrN2) ;

   }

   public function sync_vendor()
   {
        $db = \Config\Database::connect('db2');
        $YesterdayDate = date("Y-m-d", strtotime("yesterday"));
        // $YesterdayDate = '2023-02-14';
        $qCari = $db->query("SELECT * FROM master_vendor as A WHERE A.createcomp IS NULL AND DATE(A.createdate) >= '".$YesterdayDate."'");
        $cari = $qCari->getResult('array');
        // print_r($db->getLastQuery());
        // exit;
        foreach($cari as $c){
            $qCek = $this->db->query("SELECT * FROM master_vendor WHERE kode_vendor = '".$c['kode_vendor']."'");
            $res = $qCek->getResult('array');
            if(count($res) < 1){
                $table = $this->db->table("master_vendor");
                $table->insert($c);
            }
        }
        $arr = array("data" => $cari);
        $dateSync = date("Y-m-d H:i:s");
        // $db->query("UPDATE tbl_weight_scale SET sync = '$dateSync' WHERE sync IS NULL");
        return $arr ;

   }

   public function selectAllDb2($table)
   {
        $db = \Config\Database::connect('db2'); 
        $table = $db->table($table);
        $get = $table->get();
        $result = $get->getResult('array');

        return $result; 
   }

   public function getSelectDb2($table, $where)
   {   
        $db = \Config\Database::connect('db2');
        $table = $db->table($table);
        $get = $table->getWhere($where);
        $result = $get->getResult('array');

        return $result ;
     
   }

   public function insertDB2($table, $data)
   {
        $db = \Config\Database::connect('db2');
        $table = $db->table($table);
        if($table->insert($data)){
            return true;
        }else{
            return false;
        }
        
   }
}