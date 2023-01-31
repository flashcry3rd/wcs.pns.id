<?php

namespace App\Controllers;
// namespace App\ThirdParty;

use App\Models\Home_model;
use App\Models\Db2_model;

use function PHPSTORM_META\map;
// require "vendor/autoload.php";
use Endroid\QrCode\QrCode;
use Endroid\QrCode\Writer\PngWriter;
use PhpParser\Lexer\TokenEmulator\ExplicitOctalEmulator;

// use App\ThirdParty\phpSerial;



class Home extends BaseController
{
   
    public function __construct() {
        // require_once APPPATH . "/ThirdParty/php_serial.class.php";
    }

    public function index()
    {
        return view('login');
    }

    public function home()
    {
        return view('login');
    }

    public function login()
    {
        
        $dataLogin = array(
            "username" => $this->request->getPost('username'),
            "password"=> md5($this->request->getPost('password'))
        );
        $model = new Home_model();
        $cekLogin = $model->getSelect('master_user', $dataLogin); 
        if(count($cekLogin)>0){
            foreach($cekLogin as $cl){
                $username = $cl['username'];
                $nama = $cl['nama'];
                $iduser = $cl['id'];
            }
            $session_arr = array(
                "username" => $username,
                "nama" => $nama,
                "iduser" => $iduser
            );
            session()->set($session_arr);
            echo "<script> 
            window.location='".base_url()."/apps'
            </script>";
        }else{
            echo "<script> 
            alert('Username atau password salah !')
            window.location='".base_url()."'
            </script>";
        }

    }

    public function logout()
    {
        $session = session(); 
        $session->destroy();
        echo "<script> window.location= '".base_url()."' </script>";
    }

    public function apps()
    {
        if(null !== session()->get('username')){
            $model = new Home_model();
            $iduser = session()->get('iduser');
            $data['menu'] = $model->getMenu($iduser);
            echo view("home", $data); 
        }else{
            echo "<script> 
            window.location='".base_url()."'
            </script>";
        }
        
    }

    public function dashboard()
    {
        $arr = array(
            "menu" => "/dashboard"
        );
        session()->set($arr);

        $model = new Home_model(); 
        $date = date("Y-m-d");
        $year = date("Y");
        if(strtotime(date("Y-m-d H:i:s")) < strtotime(date("Y-m-d ")." 06:00:00") ){
            $dateBefore = date("Y-m-d", strtotime('-2 day', strtotime($date)))." 06:00:00";
            $dateNow = date("Y-m-d", strtotime('-1 day', strtotime($date)))." 06:00:00";
            $dateNow1 = date("Y-m-d")." 06:00:00" ;
        }else{
            $dateBefore = date("Y-m-d", strtotime('-1 day', strtotime($date)))." 06:00:00";
            $dateNow = date("Y-m-d")." 06:00:00" ;
            $dateNow1 = date("Y-m-d", strtotime('+1 day', strtotime($date)))." 06:00:00";
        }

        
        $tHariKemaren = "weight_out_time between '$dateBefore' and '$dateNow' " ;
        $tHariIni = "weight_out_time between '$dateNow' and '$dateNow1' " ;
        $tYear = "YEAR(weight_out_time) = '$year' ";

        $timbang1 = $model->getSelect("tbl_weight_scale", $tHariKemaren);
        $timbang2 = $model->getSelect("tbl_weight_scale", $tHariIni);
        $timbangAll = $model->getSelect("tbl_weight_scale", $tYear);

        $totalTimbang1 = 0;
        $totalTimbang2 = 0;
        $totalAll = 0 ;
        foreach($timbang1 as $t1){
            $totalTimbang1 += ($t1['weight_in'] - $t1['weight_out']);
        }
        foreach($timbang2 as $t2){
            $totalTimbang2 += ($t2['weight_in'] - $t2['weight_out']);
        }
        foreach($timbangAll as $ta){
            $totalAll += ($ta['weight_in'] - $ta['weight_out']); 
        }
        
        $data['timbang1'] = $totalTimbang1 ;
        $data['timbang2'] = $totalTimbang2 ;
        $data['timbangAll'] = $totalAll ;

        echo view("dashboard", $data);
    }

    public function wc_program()
    {
        if(session()->get('menu')!="/wc_program"){
            echo "<script >location.reload()</script>";
        }
        $arr = array(
            "menu" => "/wc_program"
        );
        session()->set($arr);

        echo view("wc-program");
    }

    public function data_timbang()
    {
        $model = new Home_model();
        $arr = array(
            "menu" => "/data_timbang"
        );
        $where = array ("weight_out" => 0);
        session()->set($arr);
        $data['timbang'] = $model->getSelect('tbl_weight_scale_temp', $where);
        $data['vendor'] = $model->selectAll('master_vendor');

        echo view("data-timbang", $data);
    }

    public function data_timbang_all()
    {
        $model = new Home_model();
        $arr = array(
            "menu" => "/data_timbang_all"
        );
        session()->set($arr);
        $data['timbang'] = $model->selectAll('tbl_weight_scale');
        $data['vendor'] = $model->selectAll('master_vendor');
        echo view("data-timbang-all", $data);
    }

    public function serialData()
    {
        $model = new Home_model();

        // $value = $this->request->getPost('data');
        // $arr0 = explode("\r\n", $value);
        // $count0 = count($arr0);
        // $getMin10 = $count0 - 2 ;
        // $pars = $arr0[$getMin10];
        
        // $arr1 = explode(",", $pars);
        // $count1 = count($arr1);
        // $getMin11 = $count1 - 1;
        // $data['call'] = str_replace("+", "", $arr1[$getMin11]);
        $data['call'] = 1000;
       
        $value = $this->request->getPost('value');
        $data['rd'] = json_decode($value);
        $i = 0;
        foreach($data['rd'] as $rd){
            $arr[$i] = $rd;
            $i++; 
        };
        $data['tipe'] = $arr[0];
        
        $kode_kontraktor = $arr[4];
        $where1 = array( 'kode_vendor' => $kode_kontraktor );
        $kon_delivery = $arr[5];
        $where2 = array( 'kode_vendor' => $kon_delivery );
        $rowKon = $model->getSelectRow("master_vendor", $where1);
        $rowKonDev = $model->getSelectRow("master_vendor", $where2);
        $data['nama_kontraktor'] = $rowKon->nama_vendor;
        $data['nama_kon_delivery'] = $rowKonDev->nama_vendor;

        $no_transaksi = $arr[1];
        $arrTrans = explode("/", $no_transaksi);
        $tglStr = $arrTrans[2];
        $day = substr($tglStr, 4, 2);
        $month = substr($tglStr, 2, 2);
        $year = "20".substr($tglStr, 0, 2);
        $hour = substr($tglStr, 6, 2);
        $minute = substr($tglStr, 8, 2);
        $second = substr($tglStr, 10, 2);
        $arrT = explode("/",$arr[16]);
        $tglTebang = $arrT[0]."/".$arrT[1]."/".$arrT[2];
        // $data['tgl_muat'] = $year."-".$month."-".$day ;
        $data['tgl_muat'] = $day."/".$month."/".$year ;
        $data['jam_muat'] = $hour.":".$minute.":".$second; 
        $data['tgl_tebang'] = $tglTebang;
        
        $count = count($arr); 
        $b1 = str_replace("Kg", "", $data['call']);
        $b1 = str_replace(".", "", $b1);
        $b1 = str_replace(",", ".", $b1);
        $b1 = number_format($b1, 2, ",", ".")." Kg";
        if($count > 23){
            $whereArrCek = array('no_transaksi' => $no_transaksi);
            $arrCek2 = $model->getSelect("tbl_weight_scale", $whereArrCek);
            $numCek2 = count($arrCek2);
            $data['timbangOut'] = $b1;
            $data['timbangIn'] = $arr[23];
            $data['berat_in_time'] = $arr[24];
            if($numCek2 > 0){
                $data['alert'] = "Data Transaksi sudah pernah di SCAN";
            }else{
                if($data['tipe']=="BR"){
                    $data['alert'] ="Tipe tiket tidak sesuai , mohon di cek kembali tiket yang anda gunakan !" ;
                }else{
                    $data['alert'] = "";
                }
            }
        }else{
            $data['timbangOut'] = 0;
            $data['timbangIn'] = $b1;
            $data['berat_in_time'] = "";
            //cari no transaksi
            $whereArrCek = array('no_transaksi' => $no_transaksi);
            $arrCek = $model->getSelect("tbl_weight_scale_temp", $whereArrCek);
            $numCek = count($arrCek);
            if($numCek > 0){
                $data['alert'] = "Data Transaksi sudah pernah di SCAN";
            }else{
                if($data['tipe']=="BR"){
                    $data['alert'] ="Tipe tiket tidak sesuai , mohon di cek kembali tiket yang anda gunakan !" ;
                }else{
                    $data['alert'] = "";
                }
                
            }
        }
        
        echo json_encode($data);

    }

    public function saveTruckIn()
    {

        $dateNow = date("Y-m-d H:i:s");
        $no_transaksi = $this->request->getPost('no_transaksi'); 
        $noTrans = str_replace("/","", $this->request->getPost('no_transaksi'));
        $arrT = explode("/", $this->request->getPost('tgl_tebang'));
        $tglTebang = $arrT[2]."-".$arrT[1]."-".$arrT[0];
        $arrM = explode("/", $this->request->getPost('tgl_muat'));
        $tglMuat = $arrM[2]."-".$arrM[1]."-".$arrM[0]." ".$this->request->getPost('jam_muat');

        $beratIn = $this->request->getPost('berat_in') ;
        $b1 = str_replace("Kg", "", $this->request->getPost('berat_in'));
        $b1 = str_replace(".", "", $b1);
        $b1 = str_replace(",", ".", $b1);

        $data = [
            
            "no_transaksi" => $this->request->getPost('no_transaksi'),
            "tipe" => $this->request->getPost('tipe_tiket'),
            "no_tiket_mobil" => $this->request->getPost('no_tiket'),
            "tiket_barge" => $this->request->getPost('tiket_barge'),
            // "no_wo" => $this->request->getPost('no_wo'),
            "kode_petak" => $this->request->getPost('no_petak'),
            "ancak" => $this->request->getPost('ancak'),
            "jenis_tebu" => $this->request->getPost('jenis_tebu'),
            "kode_kontraktor" => $this->request->getPost('kode_kontraktor'),
            "loading_vehicle_number" => $this->request->getPost('no_alat1'),
            "loading_vehicle_operator" => $this->request->getPost('op_alat1'),
            "kode_barge" => $this->request->getPost('no_barge'),
            "kode_tugboat" => $this->request->getPost('no_tug_boat'),
            "tugboat_captain" => $this->request->getPost('nahkoda'),
            "tujuan_tugboat" => $this->request->getPost('rute'),
            "kode_truck" => $this->request->getPost('no_truck'),
            "supir" => $this->request->getPost('driver'),
            "weight_in" => $b1,
            "weight_in_time" => $dateNow,
            "retase" => $this->request->getPost('retase'),
            "kontraktor_delivery" => $this->request->getPost('kode_kon_delivery'),
            "no_polisi" => $this->request->getPost('no_polisi'),
            "tujuan" => $this->request->getPost('tujuan'),
            "no_alat2" => $this->request->getPost('no_alat2'),
            "op_alat2" => $this->request->getPost('op_alat2'),
            "createby" => $this->request->getPost('createby'),
            "tgl_harvesting" => $tglTebang,
            "tgl_muat" => $tglMuat
        ];
        $model = new Home_model();
        $model->dataInsert('tbl_weight_scale_temp', $data);
        
        // $strArr = implode(",",$data);
        $dataQR = array(
            
            '0' => $this->request->getPost('tipe_tiket'),
            
            '1' => $this->request->getPost('no_transaksi'),
            '2' => $this->request->getPost('no_petak'),
            '3' => $this->request->getPost('tiket_barge'),
            '4' => $this->request->getPost('kode_kontraktor'),
            
            '5' => $this->request->getPost('kode_kon_delivery'),
            
            '6' => $this->request->getPost('no_barge'),
            
            '7' => $this->request->getPost('no_truck'),
            
            '8' => $this->request->getPost('driver'),
            '9' => $this->request->getPost('ancak'),
            '10' => $this->request->getPost('retase'),
            '11' => $this->request->getPost('rute'),
            '12' => $this->request->getPost('tujuan'),
            
            '13' => $this->request->getPost('kepala_regu'),
            
            '14' => $this->request->getPost('no_tug_boat'),
            
            '15' => $this->request->getPost('nahkoda'),
            
            '16' => $this->request->getPost('tgl_tebang'),
            
            '17' => $this->request->getPost('jenis_tebu'),
            
            '18' => $this->request->getPost('no_alat1'),
            
            '19' => $this->request->getPost('op_alat1'),
            
            '20' => $this->request->getPost('no_alat2'),
            
            '21' => $this->request->getPost('op_alat2'),
            
            '22' => $this->request->getPost('createby'),
            //25 timbang in 
            'berat' => $beratIn, 
            'berat_time' => $dateNow

        );

        $strArr = json_encode($dataQR);
        $qr= QrCode::create($strArr);
        $writer = new PngWriter();
        $result = $writer->write($qr);
        $result->saveToFile( ROOTPATH."/assets/qr/$noTrans.png");
        if($result){
            $return = array( 'status' => "success", "msg" => "Data weight in berhasil di proses !", "file" => $noTrans, "no" => $no_transaksi );
        }else{
            $return = array( 'status' => "error", "msg" => "Simpan data weight in gagal , data sudah pernah di SCAN !", "file" => $noTrans, "no" => $no_transaksi);
        }
   
        echo json_encode($return);
    }

    public function saveTruckOut()
    {
        $dateNow = date("Y-m-d H:i:s");
        $tglIn=$this->request->getPost('berat_in_time');
        $no_transaksi = $this->request->getPost('no_transaksi'); 
        $noTrans = str_replace("/","", $this->request->getPost('no_transaksi'));
        $arrT = explode("/", $this->request->getPost('tgl_tebang'));
        $tglTebang = $arrT[2]."-".$arrT[1]."-".$arrT[0];
        $arrM = explode("/", $this->request->getPost('tgl_muat'));
        $tglMuat = $arrM[2]."-".$arrM[1]."-".$arrM[0]." ".$this->request->getPost('jam_muat');

        $beratIn = $this->request->getPost('berat_in') ;
        $b1 = str_replace("Kg", "", $this->request->getPost('berat_in'));
        $b1 = str_replace(".", "", $b1);
        $b1 = str_replace(",", ".", $b1);

        $b2 = str_replace("Kg", "", $this->request->getPost('berat_out'));
        $b2 = str_replace(".", "", $b2);
        $b2 = str_replace(",", ".", $b2);

        $data = [
            
            "no_transaksi" => $this->request->getPost('no_transaksi'),
            "tipe" => $this->request->getPost('tipe_tiket'),
            "no_tiket_mobil" => $this->request->getPost('no_tiket'),
            "tiket_barge" => $this->request->getPost('tiket_barge'),
            // "no_wo" => $this->request->getPost('no_wo'),
            "kode_petak" => $this->request->getPost('no_petak'),
            "ancak" => $this->request->getPost('ancak'),
            "jenis_tebu" => $this->request->getPost('jenis_tebu'),
            "kode_kontraktor" => $this->request->getPost('kode_kontraktor'),
            "loading_vehicle_number" => $this->request->getPost('no_alat1'),
            "loading_vehicle_operator" => $this->request->getPost('op_alat1'),
            "kode_barge" => $this->request->getPost('no_barge'),
            "kode_tugboat" => $this->request->getPost('no_tug_boat'),
            "tugboat_captain" => $this->request->getPost('nahkoda'),
            "tujuan_tugboat" => $this->request->getPost('rute'),
            "kode_truck" => $this->request->getPost('no_truck'),
            "supir" => $this->request->getPost('driver'),
            "weight_in" => $b1,
            "weight_in_time" => $tglIn,
            "weight_out" => $b2,
            "weight_out_time" => $dateNow,
            "retase" => $this->request->getPost('retase'),
            "kontraktor_delivery" => $this->request->getPost('kode_kon_delivery'),
            "no_polisi" => $this->request->getPost('no_polisi'),
            "tujuan" => $this->request->getPost('tujuan'),
            "no_alat2" => $this->request->getPost('no_alat2'),
            "op_alat2" => $this->request->getPost('op_alat2'),
            "createby" => $this->request->getPost('createby'),
            "tgl_harvesting" => $tglTebang,
            "tgl_muat" => $tglMuat
            
        ];
        $model = new Home_model();
        $insert = $model->dataInsert('tbl_weight_scale', $data);
        if($insert){

            $return = array("status" => "success", "msg" => "Data timbangan berhasil di simpan !" , "no" => $no_transaksi);
        }else{
            $return = array("status" => "error", "msg" => "Data timbangan gagal disimpan , mohon segera menghubungi administrator !", "no" => $no_transaksi);
        }

        return json_encode($return);

    }

    public function barcode_in()
    {
        $noTrans = $this->request->getGet('no');
        $data['file'] = $this->request->getGet('file');

        $model = new Home_model();
        $where = array( 'no_transaksi' => $noTrans);
        $data['timbang'] = $model->getSelectRow('tbl_weight_scale_temp', $where);
        $kode_kontraktor = $data['timbang']->kode_kontraktor;
        $kode_kon_delivery = $data['timbang']->kontraktor_delivery;
        $where1 = array( 'kode_vendor' => $kode_kontraktor );
        $data['kontraktor'] = $model->getSelectRow('master_vendor', $where1);
        $where2 = array( 'kode_vendor' => $kode_kon_delivery );
        $data['kon_delivery'] = $model->getSelectRow('master_vendor', $where2);

        echo view('temp/barcode-print', $data);
    }
    
    public function slip_timbang()
    {
        $model = new Home_model();
        $noTrans = $this->request->getGet('no');

        $where = array( 'no_transaksi' => $noTrans );
        $data['timbang'] = $model->getSelectRow('tbl_weight_scale', $where);
        $kode_kontraktor = $data['timbang']->kode_kontraktor;
        $kode_kon_delivery = $data['timbang']->kontraktor_delivery;
        $where1 = array( 'kode_vendor' => $kode_kontraktor );
        $data['kontraktor'] = $model->getSelectRow('master_vendor', $where1);
        $where2 = array( 'kode_vendor' => $kode_kon_delivery );
        $data['kon_delivery'] = $model->getSelectRow('master_vendor', $where2);
        
        echo view('temp/surat-timbang', $data);
        
    }

    public function cu_interface()
    {
        $model = new Home_model(); 
        
        echo view('cu-interface');

    }



}
