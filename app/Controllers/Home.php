<?php

namespace App\Controllers;
// namespace App\ThirdParty;

use App\Models\Home_model;
use App\Models\Db2_model;

use function PHPSTORM_META\map;
// require "vendor/autoload.php";
//use Endroid\QrCode\QrCode;
//use Endroid\QrCode\Writer\PngWriter;
use Endroid\QrCode\Builder\Builder;
use Endroid\QrCode\Label\Font\NotoSans;
use Endroid\QrCode\Color\Color;

use Endroid\QrCode\ErrorCorrectionLevel\ErrorCorrectionLevelHigh;
use Endroid\QrCode\Label\Alignment\LabelAlignmentCenter;
use Endroid\QrCode\Encoding\Encoding;
use Endroid\QrCode\ErrorCorrectionLevel\ErrorCorrectionLevelLow;
use Endroid\QrCode\QrCode;
use Endroid\QrCode\Label\Label;
use Endroid\QrCode\Logo\Logo;
use Endroid\QrCode\RoundBlockSizeMode\RoundBlockSizeModeMargin;
use Endroid\QrCode\Writer\PngWriter;
use Endroid\QrCode\Writer\ValidationException;
//use Endroid\QrCode\Writer\PngWriter;
use PhpParser\Lexer\TokenEmulator\ExplicitOctalEmulator;
use PhpParser\Node\Expr\Cast\Array_;

// use App\ThirdParty\phpSerial;



class Home extends BaseController
{

    public function __construct()
    {
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
        $tipe = $this->request->getPost('tipe');

        $dataLogin = array(
            "username" => $this->request->getPost('username'),
            "password" => md5($this->request->getPost('password'))
        );
        $model = new Home_model();
        $cekLogin = $model->getSelect('master_user', $dataLogin);
        if (count($cekLogin) > 0) {
            foreach ($cekLogin as $cl) {
                $username = $cl['username'];
                $nama = $cl['nama'];
                $iduser = $cl['id'];
            }
            $session_arr = array(
                "username" => $username,
                "nama" => $nama,
                "iduser" => $iduser,
                "tipe" => $tipe
            );
            session()->set($session_arr);
            echo "<script> 
            window.location='" . base_url() . "/apps'
            </script>";
        } else {
            echo "<script> 
            alert('Username atau password salah !')
            window.location='" . base_url() . "'
            </script>";
        }
    }

    public function logout()
    {
        $session = session();
        $session->destroy();
        echo "<script> window.location= '" . base_url() . "' </script>";
    }

    public function apps()
    {
        if (null !== session()->get('username')) {
            $model = new Home_model();
            $iduser = session()->get('iduser');
            $data['menu'] = $model->getMenu($iduser);
            echo view("home", $data);
        } else {
            echo "<script> 
            window.location='" . base_url() . "'
            </script>";
        }
    }

    public function post_getSession()
    {
        $session = session()->get('menu');
        
        $this->sync2(); 
        
        echo $session  ; 
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

        if (strtotime(date("Y-m-d H:i:s")) < strtotime(date("Y-m-d ") . " 06:00:00")) {
            $dateBefore = date("Y-m-d", strtotime('-2 day', strtotime($date))) . " 06:00:00";
            $dateNow = date("Y-m-d", strtotime('-1 day', strtotime($date))) . " 06:00:00";
            $dateNow1 = date("Y-m-d") . " 06:00:00";
        } else {
            $dateBefore = date("Y-m-d", strtotime('-1 day', strtotime($date))) . " 06:00:00";
            $dateNow = date("Y-m-d") . " 06:00:00";
            $dateNow1 = date("Y-m-d", strtotime('+1 day', strtotime($date))) . " 06:00:00";
        }


        $tHariKemaren = "weight_out_time between '$dateBefore' and '$dateNow' and weight_in > 0  and del = 0";
        $tHariIni = "weight_out_time between '$dateNow' and '$dateNow1' and weight_in > 0  and del = 0";
        $tYear = "YEAR(weight_out_time) = '$year' and weight_in > 0  and del = 0";

        //perjam 

        $hourNow = date("Y-m-d H:") . "00:00";
        $hourLimit = date("Y-m-d H:") . "59:59";
        $tPerJam = "weight_out_time between '$hourNow' and '$hourLimit' and weight_in > 0  and del = 0";

        //perjam2

        $tPerJam_2 = "weight_out_time <= '$hourLimit' and weight_in > 0  and del = 0";

        //weekly

        $tglTerakhir = date('Y-m-d', strtotime(date('Y-m-t')));
        $tglAwalBulan = date('Y-m-01') . " 06:00:00";
        // Hari pertama bulan dalam angka PHP
        $isoTglAwal = date('N', strtotime(date('Y-m-01')));
        $totalHariAwal = 0;

        for ($i = $isoTglAwal; $i <= 7; $i++) {
            $totalHariAwal = $totalHariAwal + 1;
            if ($i == 7) {
                $tglMinggu = date("Y-m-d", strtotime("+$totalHariAwal day", strtotime(date("Y-m-01")))) . " 06:00:00";
            }
        }
        //Minggu 1 
        $whereMinggu1 = "weight_out_time between '$tglAwalBulan' and '$tglMinggu'  and del = 0";
        $data['whereMinggu1'] = date("d", strtotime($tglAwalBulan)) . " s/d " . date("d F Y", strtotime($tglMinggu));
        //Minggu 2
        $tglAwalMinggu2 = $tglMinggu;
        $tglAkhirMinggu2 = date("Y-m-d H:i:s", strtotime("+7 day", strtotime($tglMinggu)));
        $whereMinggu2 =  "weight_out_time between '$tglAwalMinggu2' and '$tglAkhirMinggu2'  and del = 0";
        $data['whereMinggu2'] = date("d", strtotime($tglAwalMinggu2)) . " s/d " . date("d F Y", strtotime($tglAkhirMinggu2));
        //Minggu 3
        $tglAwalMinggu3 = $tglAkhirMinggu2;
        $tglAkhirMinggu3 = date("Y-m-d H:i:s", strtotime("+7 day", strtotime($tglAkhirMinggu2)));
        $whereMinggu3 = "weight_out_time between '$tglAwalMinggu3' and '$tglAkhirMinggu3'  and del = 0";
        $data['whereMinggu3'] = date("d", strtotime($tglAwalMinggu3)) . " s/d " . date("d F Y", strtotime($tglAkhirMinggu3));
        //Minggu 4
        $tglAwalMinggu4 = $tglAkhirMinggu3;
        $tglAkhirMinggu4 = date("Y-m-d H:i:s", strtotime("+7 day", strtotime($tglAkhirMinggu3)));
        $whereMinggu4 = "weight_out_time between '$tglAwalMinggu4' and '$tglAkhirMinggu4'  and del = 0";
        $data['whereMinggu4'] = date("d", strtotime($tglAwalMinggu4)) . " s/d " . date("d F Y", strtotime($tglAkhirMinggu4));
        //Minggu 5
        $tglAwalMinggu5 = $tglAkhirMinggu4;
        $tglAkhirMinggu5 = date("Y-m-d H:i:s", strtotime("+7 day", strtotime($tglAkhirMinggu4)));
        if ($tglAkhirMinggu5 > $tglTerakhir) {
            $tglAkhirMinggu5 = date("Y-m-d", strtotime("+1 day", strtotime($tglTerakhir))) . " 06:00:00";
        } else {
            $tglAkhirMinggu5 = $tglAkhirMinggu5;
        }
        $whereMinggu5 = "weight_out_time between '$tglAwalMinggu5' and '$tglAkhirMinggu5'  and del = 0";
        $data['whereMinggu5'] = date("d", strtotime($tglAwalMinggu5)) . " s/d " . date("d F Y", strtotime($tglAkhirMinggu5));
        ///////////////////////////

        $timbang1 = $model->getSelect("tbl_weight_scale", $tHariKemaren);
        $ritasiTimbang1 = count($timbang1);
        $timbang2 = $model->getSelect("tbl_weight_scale", $tHariIni);
        $ritasiTimbang2 = count($timbang2);
        $timbangAll = $model->getSelect("tbl_weight_scale", $tYear);
        $ritasiTimbangAll = count($timbangAll);
        $timbangHour = $model->getSelect("tbl_weight_scale", $tPerJam);
        $ritasiTimbangHour = count($timbangHour);
        $timbangHour_2 = $model->getSelect("tbl_weight_scale", $tPerJam_2);
        $ritasiTimbangHour_2 = count($timbangHour_2);
        $timbangMinggu1 = $model->getSelect("tbl_weight_scale", $whereMinggu1);
        $timbangMinggu2 = $model->getSelect("tbl_weight_scale", $whereMinggu2);
        $timbangMinggu3 = $model->getSelect("tbl_weight_scale", $whereMinggu3);
        $timbangMinggu4 = $model->getSelect("tbl_weight_scale", $whereMinggu4);
        $timbangMinggu5 = $model->getSelect("tbl_weight_scale", $whereMinggu5);

        $totalTimbang1 = 0;
        $totalTimbang2 = 0;
        $totalAll = 0;
        $totalHour = 0;
        $totalHour2 = 0;
        $totalMinggu1 = 0;
        $totalMinggu2 = 0;
        $totalMinggu3 = 0;
        $totalMinggu4 = 0;
        $totalMinggu5 = 0;

        foreach ($timbang1 as $t1) {
            $totalTimbang1 += ($t1['weight_in'] - $t1['weight_out']);
        }
        foreach ($timbang2 as $t2) {
            $totalTimbang2 += ($t2['weight_in'] - $t2['weight_out']);
        }
        foreach ($timbangAll as $ta) {
            $totalAll += ($ta['weight_in'] - $ta['weight_out']);
        }
        foreach ($timbangHour as $th) {
            $totalHour += ($th['weight_in'] - $th['weight_out']);
        }
        foreach ($timbangHour_2 as $th2) {
            $totalHour2 += ($th2['weight_in'] - $th2['weight_out']);
        }
        foreach ($timbangMinggu1 as $tm1) {
            $totalMinggu1 += ($tm1['weight_in'] - $tm1['weight_out']);
        }
        foreach ($timbangMinggu2 as $tm2) {
            $totalMinggu2 += ($tm2['weight_in'] - $tm2['weight_out']);
        }
        foreach ($timbangMinggu3 as $tm3) {
            $totalMinggu3 += ($tm3['weight_in'] - $tm3['weight_out']);
        }
        foreach ($timbangMinggu4 as $tm4) {
            $totalMinggu4 += ($tm4['weight_in'] - $tm4['weight_out']);
        }
        foreach ($timbangMinggu5 as $tm5) {
            $totalMinggu5 += ($tm5['weight_in'] - $tm5['weight_out']);
        }

        $data['timbang1'] = number_format($totalTimbang1, 2, ",", ".") . " Kg </br> Ritasi : " . $ritasiTimbang1 . " (ALL)";
        $data['timbang2'] = number_format($totalTimbang2, 2, ",", ".") . " Kg </br> Ritasi : " . $ritasiTimbang2 . " (ALL)";
        $data['timbangAll'] = number_format($totalAll, 2, ",", ".") . " Kg </br> Ritasi : " . $ritasiTimbangAll . " (ALL)";
        $data['timbangHour'] = number_format($totalHour, 2, ",", ".") . " Kg </br> Ritasi : " . $ritasiTimbangHour . " (ALL)";
        $data['timbangHour_2'] = number_format($totalHour2, 2, ",", ".") . " Kg </br> Ritasi : " . $ritasiTimbangHour_2 . " (ALL)";
        $data['timbangMinggu1'] = number_format($totalMinggu1, 2, ",", ".");
        $data['timbangMinggu2'] = number_format($totalMinggu2, 2, ",", ".");
        $data['timbangMinggu3'] = number_format($totalMinggu3, 2, ",", ".");
        $data['timbangMinggu4'] = number_format($totalMinggu4, 2, ",", ".");
        $data['timbangMinggu5'] = number_format($totalMinggu5, 2, ",", ".");

        // echo $tglAkhirMinggu5;

        echo view("dashboard", $data);
    }

    public function wc_program()
    {
        if (session()->get('menu') != "/wc_program") {
            echo "<script >location.reload()</script>";
        }
        $arr = array(
            "menu" => "/wc_program"
        );
        session()->set($arr);

        echo view("wc-program");
    }

    public function wc_program_cu()
    {
        if (session()->get('menu') != "/wc_program_cu") {
            echo "<script >location.reload()</script>";
        }
        $arr = array(
            "menu" => "/wc_program_cu"
        );
        session()->set($arr);

        echo view("wc-program-cu");
    }

    public function cu_bridge()
    {
        if (session()->get('menu') != "/cu_bridge") {
            echo "<script >location.reload()</script>";
        }
        $arr = array(
            "menu" => "/cu_bridge"
        );
        session()->set($arr);

        echo view("cu-bridge-settings");
    }

    public function wcs_material()
    {
        if(session()->get('menu')!="/wcs_material"){
            echo "<script >location.reload()</script>";
        }
        $arr = array(
            "menu" => "/wcs_material"
        );
        session()->set($arr);

        echo view("wcs-material");
    }

    public function master_user()
    {
        $model = new Home_model();
        $data['user'] = $model->selectAllDb2("master_user");
        $data['menu'] = $model->selectAllDb2("master_menu");

        $arr = array(
            "menu" => "/master_user"
        );
        session()->set($arr);

        echo view("master-user", $data);
    }

    public function get_cuPort()
    {
        $model = new Home_model();
        $where = array(
            "port" => $this->request->getPost('com')
        );
        $bridge = $model->getSelect("master_port_cu", $where);

        foreach ($bridge as $br) {
            if ($br['bridge'] == '1') {
                $data['table1'] = $br['var'];
            } else if ($br['bridge'] == '2') {
                $data['table2'] = $br['var'];
            } else if ($br['bridge'] == '3') {
                $data['table3'] = $br['var'];
            } else if ($br['bridge'] == '4') {
                $data['table4'] = $br['var'];
            } else if ($br['bridge'] == '5') {
                $data['table5'] = $br['var'];
            }
        }
        echo json_encode($data);
    }

    public function ListDataCU()
    {
        $DataPost = $this->request->getVar();
        $model = new Home_model();
        $list_detail_db = $model->selectAll('tbl_wcs_detail', "no_ticket");
        // print_r(json_encode($list_detail_db));
        $list_arr = array();
        foreach ($list_detail_db as $vv) {
            array_push($list_arr, $vv['no_ticket']);
        }
        // print_r($list_arr);
        // exit;
        $modul  = $this->request->getPost("modul");
        $class  = $this->request->getPost("class");
        $db_cu = \Config\Database::connect('db_cu');
        $tb = $db_cu->table("tbl_wmntdata");
        if (count($list_arr) > 0) :
            $tb->whereNotIn('entry1', $list_arr);
        endif;
        // Search
        // $i = 0;
        // $column = array("entry1","date1","time1","weight1","weight2");
        // if (isset($DataPost['search'])) {
        //     foreach ($column as $item) {
        //         if ($DataPost['search']) {
        //             if ($i === 0) {
        //                 $tb->groupStart();
        //                 $tb->like($item, $DataPost['search']['value']);
        //             } else {
        //                 $tb->orLike($item, $DataPost['search']['value']);
        //             }
        //             if (count($column) - 1 == $i)
        //                 $tb->groupEnd();
        //         }
        //         $column[$i] = $item;
        //         $i++;
        //     }
        // }
        // End Search
        $tb->limit('10');
        $tb->orderBy('txn_no', 'DESC');
        $get = $tb->get();
        $resultCU = $get->getResult('array');
        $list = $resultCU;
        $list = json_decode(json_encode($list));
        $data   = array();
        $no     = $this->request->getPost("start");
        $i      = 1;
        function item($val, $data = "", $modul = "", $class = "")
        {
            $data = (object) $data;
            $id   = $data->txn_no;
            $no_ticket = $data->entry1;
            $tgl = $data->date1 . ' ' . $data->time1;
            $gross = $data->weight1;
            $tare = $data->weight2;
            $nett = $gross - $tare;
            // $dd   = 'data-id="' . $id . '" data-no_ticket="' . $no_ticket . '" data-class="' . $class . '';
            // $dd   .= 'data-gross="' . $gross . '"';
            // $dd   .= 'data-tare="' . $tare . '"';
            // $dd   .= 'data-nett="' . $nett . '"';

            // if ($class != "none") :
            //     $val = '<span href="javascript:void(0)" ' . $dd . '>' . $val . '</span>';
            // endif;
            $val = '<div class="checkbox checkbox-primary" style="margin:0px;text-align:left;">
                <input name="Checkbox[]" class="item-checked" type="checkbox" onclick="calculation_total_weight(this)" data-rowid="item-detail-' . $id . '" data-trx_no="' . $id . '" data-no_ticket="' . $no_ticket . '" data-gross="' . $gross . '" data-tare="' . $tare . '" data-nett="' . $nett . '" id="' . $id . '" value="' . $id . '" tab-index="-1">
                <input type="hidden" name="det_id[]" value="' . $id . '">
                <input type="hidden" name="no_ticket[]" value="' . $no_ticket . '">
                <input type="hidden" name="gross[]" value="' . $gross . '">
                <input type="hidden" name="tare[]" value="' . $tare . '">
                <input type="hidden" name="nett[]" value="' . $nett . '">
            </div>';
            return $val;
        }
        foreach ($list as $a) {
            $row    = array();
            // $row[]  = $i++;
            $row[]  = item($a->txn_no, $a, $modul, $class);
            $row[]  = $a->entry1;
            $row[]  = $a->date1 . ' ' . $a->time1;
            $row[]  = $a->weight1;
            // $row[]  = date("d-m-Y", strtotime($a->Date));
            $row[]  = $a->weight2;
            $row[]  = $a->weight1 - $a->weight2;
            $data[] = $row;
        }
        $output = array(
            "class"           => $class,
            "draw"            => '1',
            "recordsTotal"    => 10, // $this->api->count_all($page),
            "recordsFiltered" => 10, //$this->api->count_filtered($page),
            "data"            => $data,
            "dp"            => $this->request->getPost(),
        );
        header('Content-Type: application/json');
        echo json_encode($output);
    }

    public function data_timbang()
    {
        $model = new Home_model();
        $arr = array(
            "menu" => "/data_timbang"
        );
        $where = array("weight_out" => 0);
        session()->set($arr);
        $data['timbang'] = $model->getSelectReportAll('tbl_weight_scale_temp', $where);

        echo view("data-timbang", $data);
    }

    public function data_timbang_all()
    {

        // $DataPost = $this->request->getVar();
        // print_r($DataPost);
        $filter = $this->request->getPost('method');
        $filterStartDate = $this->request->getPost('start_date');
        $filterEndDate = $this->request->getPost('end_date');
        if (!$filter) {
            $filter = session()->get('tipe');
            $filterStartDate = date('Y-m-d');
            $filterEndDate = date('Y-m-d');
        }
        // exit;
        // $filter = $this->request->getGet('filter');
        // print_r($filter);
        $model = new Home_model();
        $arr = array(
            "menu" => "/data_timbang_all"
        );
        session()->set($arr);
        if ($filter) :
            $order = array('weight_in_time' => 'DESC');
            $where_arr = array();
            if ($filter == 'cu') :
                $where_arr['A.tipe'] = 'BP';
            // $where = array('tipe' => 'BP');
            elseif ($filter == "truck") :
                $where_arr['A.tipe !='] = 'BP';
            // $where = array('tipe !=' => 'BP');
            endif;
            if ($filterStartDate) :
                $filterStartDate_06 = $filterStartDate . " 06:00:00";
                $where_arr['A.weight_out_time >='] = $filterStartDate_06;
            endif;
            if ($filterEndDate) :
                $filterEndDate_06 = date("Y-m-d", strtotime('+1 day', strtotime($filterEndDate))) . " 05:59:59";
                $where_arr['A.weight_out_time <='] = $filterEndDate_06;
            endif;
            $where_arr['del ='] = 0;
            $data['timbang'] = $model->getSelectReportAll('tbl_weight_scale', $where_arr);
        else :
            $where_arr['del ='] = 0;
            $data['timbang'] = $model->getSelectReportAll('tbl_weight_scale', $where_arr);
        endif;
        $data['filter_module'] = $filter;
        $data['filterStartDate'] = $filterStartDate;
        $data['filterEndDate'] = $filterEndDate;
        // $data['vendor'] = $model->selectAll('master_vendor');
        echo view("data-timbang-all", $data);
    }

    public function serialData($method = "")
    {
        $model = new Home_model();

        $num = $this->request->getPost('data');
        if ($method != "cu") {
            // $arr0 = explode("\r\n", $value);
            // $count0 = count($arr0);
            // $getMin10 = $count0 - 2 ;
            // $pars = $arr0[$getMin10];

            // $arr1 = explode(",", $pars);
            // $count1 = count($arr1);
            // $getMin11 = $count1 - 1;
            // $data['call'] = str_replace("KG", "", $value);
            // $data['call'] = $value;
            // $data['call'] = str_replace("+", "+ ", $data['call']);
            // $arr2 = explode(" ", $data['call']);
            // $data['call'] = $arr2[1];
        }

        // $data['call'] = 1000;
        // echo json_encode($data['call']);
        // exit();

        $value = $this->request->getPost('value');
        $data['rd'] = json_decode($value);
        $i = 0;
        foreach ($data['rd'] as $rd) {
            $arr[$i] = $rd;
            $i++;
        };
        $data['tipe'] = $arr[0];

        $kode_kontraktor = $arr[4];
        $where1 = array('kode_vendor' => $kode_kontraktor);
        $kon_delivery = $arr[5];
        $where2 = array('kode_vendor' => $kon_delivery);
        $rowKon = $model->getSelectRow("master_vendor", $where1);
        $rowKonDev = $model->getSelectRow("master_vendor", $where2);
        if ($rowKon) {
            $data['nama_kontraktor'] = $rowKon->nama_vendor;
        } else {
            $data['nama_kontraktor'] = $kode_kontraktor;
        }
        if ($rowKonDev) {
            $data['nama_kon_delivery'] = $rowKonDev->nama_vendor;
        } else {
            $data['nama_kon_delivery'] = $kon_delivery;
        }

        $no_transaksi = $arr[1];
        $arrTrans = explode("/", $no_transaksi);
        $tglStr = $arrTrans[2];
        $day = substr($tglStr, 4, 2);
        $month = substr($tglStr, 2, 2);
        $year = "20" . substr($tglStr, 0, 2);
        $hour = substr($tglStr, 6, 2);
        $minute = substr($tglStr, 8, 2);
        $second = substr($tglStr, 10, 2);
        // $arrT = explode("/",$arr[16]);
        // $tglTebang = $arrT[0]."/".$arrT[1]."/".$arrT[2];
        // $data['tgl_muat'] = $year."-".$month."-".$day ;
        $data['tgl_muat'] = $day . "/" . $month . "/" . $year;
        $data['jam_muat'] = $hour . ":" . $minute . ":" . $second;
        // $data['tgl_tebang'] = $tglTebang;
        $data['tgl_tebang'] = "00/00/0000";

        $count = count($arr);
        if ($method != "cu") {
            $b1 = str_replace("Kg", "", $num);
            $b1 = str_replace(".", "", $b1);
            $b1 = str_replace(",", ".", $b1);
            $b1 = number_format((float)$b1, 0, ",", ".") . " Kg";
        }
        if ($count > 20) {
            if ($method == "cu") {
                $whereArrCek = "";
                $likeArrCek = array('no_transaksi' => $no_transaksi);
            } else {
                $whereArrCek = array('no_transaksi' => $no_transaksi);
                $likeArrCek = "";
            }
            $arrCek2 = $model->getSelect("tbl_weight_scale", $whereArrCek, $likeArrCek);
            $numCek2 = count($arrCek2);
            if ($method != "cu") {
                $data['timbangOut'] = $b1;
                $data['timbangIn'] = $arr[20];
            } else {
                $data['timbangOut'] = 0;
                $data['timbangIn'] = 0;
            }
            $data['berat_in_time'] = $arr[21];
            $data['alert'] = "";
            if ($numCek2 > 1 && $method == "cu") {
                $data['alert'] = "No Ticket ini sudah dilakukan dua kali angkatan.";
            } elseif ($numCek2 > 0) {
                $data['alert'] = "Data Transaksi sudah pernah di SCAN";
            } else {
                if ($method != "cu") {
                    if ($data['tipe'] == "BP" || $data['tipe'] == "BD") {
                        $data['alert'] = "Tipe tiket tidak sesuai , mohon di cek kembali tiket yang anda gunakan !";
                    } else {
                        $data['alert'] = "";
                    }
                } else {
                    $WhereDetailCheck = array('no_transaksi' => $no_transaksi);
                    $DetailCheck = $model->getSelect("tbl_wcs_detail", $WhereDetailCheck);
                    $TotalDetailCheck = count($DetailCheck);
                    if ($TotalDetailCheck >= 2) :
                        $data['alert'] = "No Ticket ini sudah dilakukan dua kali angkatan.";
                    endif;
                }
            }
        } else {
            if ($method != "cu") {
                $data['timbangOut'] = 0;
                $data['timbangIn'] = $b1;
            } else {
                $data['timbangOut'] = 0;
                $data['timbangIn'] = 0;
            }
            $data['berat_in_time'] = "";
            //cari no transaksi
            if ($method == "cu") {
                $whereArrCek = "";
                $likeArrCek = array('no_transaksi' => $no_transaksi);
            } else {
                $whereArrCek = array('no_transaksi' => $no_transaksi);
                $likeArrCek = "";
            }
            if ($method == "cu") {
                $arrCek = $model->getSelect("tbl_weight_scale", $whereArrCek, $likeArrCek);
            } else {
                $arrCek = $model->getSelect("tbl_weight_scale_temp", $whereArrCek);
            }
            $numCek = count($arrCek);
            $data['alert'] = "";
            if ($numCek > 1 && $method == "cu") {
                $data['alert'] = "No Ticket ini sudah dilakukan dua kali angkatan.";
            } elseif ($numCek > 0 && $method != "cu") {
                $data['alert'] = "Data Transaksi sudah pernah di SCAN";
            } else {
                if ($method != "cu") {
                    if ($data['tipe'] == "BP" || $data['tipe'] == "BD") {
                        $data['alert'] = "Tipe tiket tidak sesuai , mohon di cek kembali tiket yang anda gunakan !";
                    } else {
                        $data['alert'] = "";
                    }
                } else {
                }
            }
        }

        echo json_encode($data);
    }

    public function saveTruckIn()
    {

        $dateNow = date("Y-m-d H:i:s");
        $no_transaksi = $this->request->getPost('no_transaksi');
        $noTrans = str_replace("/", "", $this->request->getPost('no_transaksi'));
        $arrT = explode("/", $this->request->getPost('tgl_tebang'));
        $tglTebang = $arrT[2] . "-" . $arrT[1] . "-" . $arrT[0];
        $arrM = explode("/", $this->request->getPost('tgl_muat'));
        $tglMuat = $arrM[2] . "-" . $arrM[1] . "-" . $arrM[0] . " " . $this->request->getPost('jam_muat');

        $beratIn = $this->request->getPost('berat_in');
        $b1 = str_replace("Kg", "", $this->request->getPost('berat_in'));
        $b1 = str_replace(".", "", $b1);
        $b1 = str_replace(",", ".", $b1);

        if ($b1 < 1) {
            $return = array('status' => "error", "msg" => "Berat timbang tidak boleh 0 , silahkan di SCAN kembali !", "file" => $noTrans, "no" => $no_transaksi);
            echo json_encode($return);
            exit();
        }

        if ($this->request->getPost('trash')) {
            $trash = $this->request->getPost('trash');
        } else {
            $trash = 0;
        }
        $data = [
            "trash_status" => $trash,
            "no_transaksi" => $this->request->getPost('no_transaksi'),
            "tipe" => $this->request->getPost('tipe_tiket'),
            // "no_tiket_mobil" => $this->request->getPost('no_tiket'),
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
            // "retase" => $this->request->getPost('retase'),
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
            '10' => $this->request->getPost('rute'),
            '11' => $this->request->getPost('tujuan'),

            '12' => $this->request->getPost('no_tug_boat'),

            '13' => $this->request->getPost('nahkoda'),

            '14' => $this->request->getPost('jenis_tebu'),

            '15' => $this->request->getPost('no_alat1'),

            '16' => $this->request->getPost('no_alat2'),

            '17' => $this->request->getPost('op_alat1'),

            '18' => $this->request->getPost('op_alat2'),

            '19' => $this->request->getPost('createby'),
            //25 timbang in 
            'berat' => $beratIn,
            'berat_time' => $dateNow,
            'trash' => $this->request->getPost('trash')

        );

        $strArr = json_encode($dataQR);
        $writer = new PngWriter();
        $qr = QrCode::create($strArr)
            ->setEncoding(new Encoding('UTF-8'))
            ->setErrorCorrectionLevel(new ErrorCorrectionLevelLow())
            ->setSize(1200)
            ->setMargin(10)
            ->setRoundBlockSizeMode(new RoundBlockSizeModeMargin())
            ->setForegroundColor(new Color(0, 0, 0))
            ->setBackgroundColor(new Color(255, 255, 255));

        $result = $writer->write($qr);
        $result->saveToFile(ROOTPATH . "/assets/qr/$noTrans.png");
        if ($result) {
            $return = array('status' => "success", "msg" => "Data weight in berhasil di proses !", "file" => $noTrans, "no" => $no_transaksi);
        } else {
            $return = array('status' => "error", "msg" => "Simpan data weight in gagal , data sudah pernah di SCAN !", "file" => $noTrans, "no" => $no_transaksi);
        }

        echo json_encode($return);
    }

    public function saveTruckCU()
    {
        $model = new Home_model();
        // if(!$this->request->getPost('Checkbox')):
        //     $return = array("status" => "error", "msg" => "Silahkan pilih berat timbang CU", "no" => $this->request->getPost('no_transaksi'));
        //     return json_encode($return);
        //     exit;
        // endif;
        // $DataPost = $this->request->getVar();
        // print_r($DataPost);
        // exit;
        $dateNow = date("Y-m-d H:i:s");
        $tglIn = $this->request->getPost('berat_in_time');
        $no_transaksi = $this->request->getPost('no_transaksi');
        $noTrans = str_replace("/", "", $this->request->getPost('no_transaksi'));
        $trashStatus = $this->request->getPost('TrashStatus');
        // $arrT = explode("/", $this->request->getPost('tgl_tebang'));
        // $tglTebang = $arrT[2]."-".$arrT[1]."-".$arrT[0];
        $arrM = explode("/", $this->request->getPost('tgl_muat'));
        $tglMuat = $arrM[2] . "-" . $arrM[1] . "-" . $arrM[0] . " " . $this->request->getPost('jam_muat');

        $beratIn = $this->request->getPost('berat_in');
        $beratOut = $this->request->getPost('berat_out');
        // $b1 = str_replace("Kg", "", $this->request->getPost('berat_in'));
        // $b1 = str_replace(".", "", $b1);
        // $b1 = str_replace(",", ".", $b1);

        // $b2 = str_replace("Kg", "", $this->request->getPost('berat_out'));
        // $b2 = str_replace(".", "", $b2);
        // $b2 = str_replace(",", ".", $b2);
        $where_arr = array('no_transaksi' => $no_transaksi);
        $cekAngkatan1 = $model->getSelectList("tbl_weight_scale", $where_arr);
        if (count($cekAngkatan1) == 1) :
            $no_transaksi = $no_transaksi . '-B';
        endif;

        $data = [
            "no_transaksi" => $no_transaksi,
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
            "weight_in" => $beratIn,
            "weight_in_time" => $dateNow,
            "weight_out" => $beratOut,
            "weight_out_time" => $dateNow,
            "retase" => $this->request->getPost('retase'),
            "kontraktor_delivery" => $this->request->getPost('kode_kon_delivery'),
            "no_polisi" => $this->request->getPost('no_polisi'),
            "tujuan" => $this->request->getPost('tujuan'),
            "no_alat2" => $this->request->getPost('no_alat2'),
            "op_alat2" => $this->request->getPost('op_alat2'),
            "createby" => $this->request->getPost('createby'),
            // "tgl_harvesting" => $tglTebang,
            "tgl_muat" => $tglMuat

        ];
        if ($trashStatus) {
            $data['trash_status'] = $trashStatus;
        }

        $insert = $model->dataInsert('tbl_weight_scale', $data);
        if ($insert) {
            $db = \Config\Database::connect('default');
            $queryLastWCSTrans = "SELECT * FROM tbl_weight_scale WHERE no_transaksi = '" . $no_transaksi . "' ORDER BY weight_in_time DESC LIMIT 1";
            $run = $db->query($queryLastWCSTrans);
            $WCSData = $run->getRow();
            $wcs_id = $WCSData->wcs_id;
            $beratNett = $beratIn - $beratOut;

            $data_detail = array(
                'wcs_id' => $WCSData->wcs_id,
                'no_transaksi' => $no_transaksi,
                'no_ticket' => $no_transaksi,
                'gross' => $WCSData->weight_in,
                'tare' => $WCSData->weight_out,
                'nett' => $beratNett,
            );
            $insert_detail = $model->dataInsert('tbl_wcs_detail', $data_detail);
        }
        // if($insert){
        //     $det_id = $this->request->getPost('det_id');
        //     $CheckBox = $this->request->getPost('Checkbox');
        //     $NoTicket = $this->request->getPost('no_ticket');
        //     $Gross = $this->request->getPost('gross');
        //     $Tare = $this->request->getPost('tare');
        //     $Nett = $this->request->getPost('nett');
        //     foreach($CheckBox as $i => $v){
        //         foreach($det_id as $ii => $vv){
        //             if($v == $vv){
        //                 $det_no_ticket = $NoTicket[$ii];
        //                 $det_gross = $Gross[$ii];
        //                 $det_tare = $Tare[$ii];
        //                 $det_nett = $Nett[$ii];

        //                 $data_detail = array(
        //                     'no_transaksi' => $no_transaksi,
        //                     'no_ticket' => $det_no_ticket,
        //                     'gross' => $det_gross,
        //                     'tare' => $det_tare,
        //                     'nett' => $det_nett,
        //                 );
        //                 $insert_detail = $model->dataInsert('tbl_wcs_detail', $data_detail);
        //             }
        //         }
        //     }
        //     if($insert_detail) {
        //         $return = array("status" => "success", "msg" => "Data timbangan berhasil di simpan !" , "no" => $no_transaksi);
        //     }else{
        //         $return = array("status" => "error", "msg" => "Data detail timbangan gagal disimpan , mohon segera menghubungi administrator !", "no" => $no_transaksi);
        //     }
        // }else{
        //     $return = array("status" => "error", "msg" => "Data timbangan gagal disimpan , mohon segera menghubungi administrator !", "no" => $no_transaksi);
        // }
        if ($insert) {
            $return = array("status" => "success", "msg" => "Data timbangan berhasil di simpan !", "no" => $no_transaksi, "id" => $wcs_id);
        } else {
            $return = array("status" => "error", "msg" => "Data timbangan gagal disimpan , mohon segera menghubungi administrator !", "no" => $no_transaksi);
        }

        return json_encode($return);
    }

    public function saveTruckOut()
    {
        $dateNow = date("Y-m-d H:i:s");
        $tglIn = $this->request->getPost('berat_in_time');
        $no_transaksi = $this->request->getPost('no_transaksi');
        $noTrans = str_replace("/", "", $this->request->getPost('no_transaksi'));
        $arrT = explode("/", $this->request->getPost('tgl_tebang'));
        $tglTebang = $arrT[2] . "-" . $arrT[1] . "-" . $arrT[0];
        $arrM = explode("/", $this->request->getPost('tgl_muat'));
        $tglMuat = $arrM[2] . "-" . $arrM[1] . "-" . $arrM[0] . " " . $this->request->getPost('jam_muat');

        $beratIn = $this->request->getPost('berat_in');
        $b1 = str_replace("Kg", "", $this->request->getPost('berat_in'));
        $b1 = str_replace(".", "", $b1);
        $b1 = str_replace(",", ".", $b1);

        $b2 = str_replace("Kg", "", $this->request->getPost('berat_out'));
        $b2 = str_replace(".", "", $b2);
        $b2 = str_replace(",", ".", $b2);

        if ($this->request->getPost('trash')) {
            $trash = 1;
        } else {
            $trash = 0;
        }
        $data = [
            "trash_status" => $trash,
            "no_transaksi" => $this->request->getPost('no_transaksi'),
            "tipe" => $this->request->getPost('tipe_tiket'),
            // "no_tiket_mobil" => $this->request->getPost('no_tiket'),
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
            // "retase" => $this->request->getPost('retase'),
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
        if ($insert) {

            $return = array("status" => "success", "msg" => "Data timbangan berhasil di simpan !", "no" => $no_transaksi);
        } else {
            $return = array("status" => "error", "msg" => "Data timbangan gagal disimpan , mohon segera menghubungi administrator !", "no" => $no_transaksi);
        }

        return json_encode($return);
    }

    public function barcode_in()
    {
        $noTrans = $this->request->getGet('no');
        $data['file'] = $this->request->getGet('file');

        $model = new Home_model();
        $where = array('no_transaksi' => $noTrans);
        $data['timbang'] = $model->getSelectRow('tbl_weight_scale_temp', $where);
        $kode_kontraktor = $data['timbang']->kode_kontraktor;
        $kode_kon_delivery = $data['timbang']->kontraktor_delivery;
        $where1 = array('kode_vendor' => $kode_kontraktor);
        $data['kontraktor'] = $model->getSelectRow('master_vendor', $where1);
        $where2 = array('kode_vendor' => $kode_kon_delivery);
        $data['kon_delivery'] = $model->getSelectRow('master_vendor', $where2);

        echo view('temp/barcode-print', $data);
    }

    public function slip_timbang()
    {
        $model = new Home_model();
        // $wcs_id = $this->request->getGet('no');
        $noTrans = $this->request->getGet('no');
        $arrTrans = explode("/", $noTrans);

        $where = array('no_transaksi' => $noTrans);
        // $where = array( 'wcs_id' => $wcs_id );
        $dataTimbang = $model->getSelectRow('tbl_weight_scale', $where);
        $data['timbang'] = $dataTimbang;
        $kode_kontraktor = $data['timbang']->kode_kontraktor;
        $kode_kon_delivery = $data['timbang']->kontraktor_delivery;
        $where1 = array('kode_vendor' => $kode_kontraktor);
        $data['kontraktor'] = $model->getSelectRow('master_vendor', $where1);
        $where2 = array('kode_vendor' => $kode_kon_delivery);
        $data['kon_delivery'] = $model->getSelectRow('master_vendor', $where2);

        $arrTrans = explode("/", $dataTimbang->no_transaksi);
        if (strtoupper($arrTrans[0]) == 'BP') {
            $where = array('no_transaksi' => $noTrans);
            $data['timbang_detail'] = $model->getSelectlist('tbl_wcs_detail', $where);
            echo view('temp/surat-timbang-cu', $data);
        } else {
            echo view('temp/surat-timbang', $data);
        }
    }

    public function cu_interface()
    {
        $model = new Home_model();

        echo view('cu-interface');
    }

    // public function autoSync()
    // {
    //     $client = \Config\Services::curlrequest();

    //     $model = new Home_model();
    //     $dateSync = date('Y-m-d H:i:s');
    //     $where = "sync IS NULL";
    //     $data = array("sync" => $dateSync);
    //     $get = $model->getSelect("tbl_weight_scale", $where);
    //     // print_r($get);
    //     // $response = $client->request('post', 'http://api.pns.co.id/index.php/wcs/autoSync1', ['body' => $get]);
    //     $response = $client->request('POST', 'http://api.pns.co.id/index.php/wcs/autoSync1', [
    //         'form_params' => $get
    //         ,
    //     ]);
    //     $model->dataUpdate("tbl_weight_scale", $data, $where);
    //     // echo "<pre>";
    //     $array = json_decode($response->getBody());
    //     // print_r($array);
    //     foreach($array->data as $ar){
    //         $dataAr = array(
    //             "no_transaksi" => $ar->no_transaksi, 
    //             "tipe" => $ar->tipe,
    //             "no_tiket_mobil" => $ar->no_tiket_mobil,
    //             "tiket_barge" => $ar->tiket_barge,
    //             "no_wo" => $ar->no_wo,
    //             "kode_petak" => $ar->kode_petak,
    //             "ancak" => $ar->ancak,
    //             "jenis_tebu" => $ar->jenis_tebu,
    //             "tgl_harvesting" => $ar->tgl_harvesting,
    //             "tgl_muat" => $ar->tgl_muat,
    //             "kode_kontraktor" => $ar->kode_kontraktor,
    //             "loading_vehicle_number" => $ar->loading_vehicle_number,
    //             "loading_vehicle_operator" => $ar->loading_vehicle_operator,
    //             "kode_barge" => $ar->kode_barge,
    //             "kode_tugboat" => $ar->kode_tugboat,
    //             "tugboat_captain" => $ar->tugboat_captain,
    //             "tujuan_tugboat" => $ar->tujuan_tugboat,
    //             "kode_truck" => $ar->kode_truck,
    //             "supir" => $ar->supir,
    //             "kepala_regu" => $ar->kepala_regu,
    //             "weight_in" => $ar->weight_in, 
    //             "weight_in_time" => $ar->weight_in_time,
    //             "weight_out" => $ar->weight_out,
    //             "weight_out_time" => $ar->weight_out_time,
    //             "retase" => $ar->retase,
    //             "kontraktor_delivery" => $ar->kontraktor_delivery,
    //             "no_polisi" => $ar->no_polisi,
    //             "tujuan" => $ar->tujuan,
    //             "no_alat2" => $ar->no_alat2,
    //             "op_alat2" => $ar->op_alat2,
    //             "del" => $ar->del,
    //             "createby" => $ar->createby,
    //             "operator_timbang" => $ar->operator_timbang,
    //             "sync" => $dateSync
    //         );
    //         $where1 = array("no_transaksi" => $ar->no_transaksi);
    //         $cari = $model->getSelect("tbl_weight_scale", $where1);
    //         if(count($cari) < 1){
    //             $model->dataInsert("tbl_weight_scale", $dataAr, $where1);
    //         }   
    //     }
    // }

    public function check2()
    {
        $model = new Home_model();
        $check = $model->check_conn();
        echo json_encode($check);
    }

    public function sync2()
    {
        $model = new Home_model();
        $dateNow = date("Y-m-d");
        $dateSync = date("Y-m-d", strtotime("-1 day", strtotime($dateNow)));
        $where = "weight_in_time >= '$dateSync'";
        $get = $model->getSelect("tbl_weight_scale", $where);
        $noTrans = $model->selectAll("tbl_weight_scale", "no_transaksi");
        // echo json_encode($get);
        // exit();
        $model->sync2($get, $noTrans);


        // echo json_encode($runSync);
    }

    public function sync_vendor()
    {
        $model = new Home_model();
        $runSync = $model->sync_vendor();


        echo json_encode($runSync);
    }

    public function test_sync()
    {
        $model = new Home_model();
        $run = $model->test_sync();

        echo json_encode($run);
    }
    public function sinkron_user()
    {
        $model = new Home_model();
        $getUser = $model->selectAllDb2("master_user");
        foreach ($getUser as $gu) {
            $data = array(
                'id' => $gu['id'],
                'username' => $gu['username'],
                'password' => $gu['password'],
                'nama' => $gu['nama'],
                'posisi' => $gu['posisi'],
                'status' => $gu['status']
            );
            $where1 = array(
                'username' => $gu['username']
            );
            $where2 = array(
                'id_user' => $gu['id']
            );
            $getCek = $model->getSelect("master_user", $where1);
            if (count($getCek) < 1) {
                $model->dataInsert("master_user", $data);
                $cariMenu = $model->getSelectDb2("master_menu_user", $where2);
                foreach ($cariMenu as $cm) {
                    $data1 = array(
                        'id_user' => $gu['id'],
                        'id_menu' => $cm['id_menu']
                    );
                    $model->dataInsert("master_menu_user", $data1);
                }
            }
        }
        $arr = array("status" => "success", "color" => "green", "msg" => "User berhasil disinkron !");

        echo json_encode($arr);
    }

    public function createUser()
    {
        $model = new Home_model();

        $data1 = array(
            'username' => $this->request->getPost('username'),
            'password' => md5($this->request->getPost('password')),
            'nama' => $this->request->getPost('nama'),
            'posisi' => $this->request->getPost('posisi'),
            'status' => 1
        );
        if ($model->insertDB2("master_user", $data1)) {
            $where = array('username' => $this->request->getPost('username'));
            $id = $model->getSelectDb2("master_user", $where);
            $menu = $this->request->getPost('menu');
            $cc = count($menu);
            for ($i = 0; $i < $cc; $i++) {
                $data2 = array('id_user' => $id[0]['id'], 'id_menu' => $menu[$i]);
                $model->insertDB2("master_menu_user", $data2);
            }
            $arr = array('status' => 'success', 'msg' => 'Akun berhasil dibuat !');
        } else {
            $arr = array('status' => 'error', 'msg' => 'Error !');
        }
        echo json_encode($arr);
    }

    public function checkUsername()
    {
        $model = new Home_model();

        $where = array(
            'username' => $this->request->getPost('txt')
        );
        $get = $model->getSelectDb2("master_user", $where);
        $cnt = count($get);
        if ($cnt > 0) {
            $arr = array('status' => 'error', 'color' => 'red', 'msg' => 'Username sudah terdaftar !');
        } else {
            $arr = array('status' => 'success', 'color' => 'green', 'msg' => 'Username bisa digunakan');
        }

        echo json_encode($arr);
    }

    public function filterDashboard()
    {
        $model = new Home_model();

        $tipe = $this->request->getPost('tipe');
        if ($tipe == "truck") {
            $tipeFilter = "and tipe in ('TP', 'TD')";
            $ritasi = "TRUCK";
        } else if ($tipe == "barge") {
            $tipeFilter = "and tipe in ('BP')";
            $ritasi = "BARGE";
        } else {
            $tipeFilter = "";
            $ritasi = "(ALL)";
        }

        $date = date("Y-m-d");
        $year = date("Y");

        if (strtotime(date("Y-m-d H:i:s")) < strtotime(date("Y-m-d ") . " 06:00:00")) {
            $dateBefore = date("Y-m-d", strtotime('-2 day', strtotime($date))) . " 06:00:00";
            $dateNow = date("Y-m-d", strtotime('-1 day', strtotime($date))) . " 06:00:00";
            $dateNow1 = date("Y-m-d") . " 06:00:00";
        } else {
            $dateBefore = date("Y-m-d", strtotime('-1 day', strtotime($date))) . " 06:00:00";
            $dateNow = date("Y-m-d") . " 06:00:00";
            $dateNow1 = date("Y-m-d", strtotime('+1 day', strtotime($date))) . " 06:00:00";
        }


        $tHariKemaren = "weight_out_time between '$dateBefore' and '$dateNow' and weight_in > 0  and del = 0 $tipeFilter ";
        $tHariIni = "weight_out_time between '$dateNow' and '$dateNow1' and weight_in > 0  and del = 0 $tipeFilter ";
        $tYear = "YEAR(weight_out_time) = '$year' $tipeFilter and weight_in > 0  and del = 0";

        //perjam 

        $hourNow = date("Y-m-d H:") . "00:00";
        $hourLimit = date("Y-m-d H:") . "59:59";
        $tPerJam = "weight_out_time between '$hourNow' and '$hourLimit' and weight_in > 0  and del = 0 $tipeFilter";

        //perjam2

        $tPerJam_2 = "weight_out_time <= '$hourLimit' and weight_in > 0  and del = 0 $tipeFilter";

        //weekly

        $tglTerakhir = date('Y-m-d', strtotime(date('Y-m-t')));
        $tglAwalBulan = date('Y-m-01') . " 06:00:00";
        // Hari pertama bulan dalam angka PHP
        $isoTglAwal = date('N', strtotime(date('Y-m-01')));
        $totalHariAwal = 0;

        for ($i = $isoTglAwal; $i <= 7; $i++) {
            $totalHariAwal = $totalHariAwal + 1;
            if ($i == 7) {
                $tglMinggu = date("Y-m-d", strtotime("+$totalHariAwal day", strtotime(date("Y-m-01")))) . " 06:00:00";
            }
        }
        //Minggu 1 
        $whereMinggu1 = "weight_out_time between '$tglAwalBulan' and '$tglMinggu' and del = 0 $tipeFilter";
        $data['whereMinggu1'] = date("d", strtotime($tglAwalBulan)) . " s/d " . date("d F Y", strtotime($tglMinggu));
        //Minggu 2
        $tglAwalMinggu2 = $tglMinggu;
        $tglAkhirMinggu2 = date("Y-m-d H:i:s", strtotime("+7 day", strtotime($tglMinggu)));
        $whereMinggu2 =  "weight_out_time between '$tglAwalMinggu2' and '$tglAkhirMinggu2'  and del = 0 $tipeFilter";
        $data['whereMinggu2'] = date("d", strtotime($tglAwalMinggu2)) . " s/d " . date("d F Y", strtotime($tglAkhirMinggu2));
        //Minggu 3
        $tglAwalMinggu3 = $tglAkhirMinggu2;
        $tglAkhirMinggu3 = date("Y-m-d H:i:s", strtotime("+7 day", strtotime($tglAkhirMinggu2)));
        $whereMinggu3 = "weight_out_time between '$tglAwalMinggu3' and '$tglAkhirMinggu3'  and del = 0 $tipeFilter";
        $data['whereMinggu3'] = date("d", strtotime($tglAwalMinggu3)) . " s/d " . date("d F Y", strtotime($tglAkhirMinggu3));
        //Minggu 4
        $tglAwalMinggu4 = $tglAkhirMinggu3;
        $tglAkhirMinggu4 = date("Y-m-d H:i:s", strtotime("+7 day", strtotime($tglAkhirMinggu3)));
        $whereMinggu4 = "weight_out_time between '$tglAwalMinggu4' and '$tglAkhirMinggu4' and del = 0 $tipeFilter";
        $data['whereMinggu4'] = date("d", strtotime($tglAwalMinggu4)) . " s/d " . date("d F Y", strtotime($tglAkhirMinggu4));
        //Minggu 5
        $tglAwalMinggu5 = $tglAkhirMinggu4;
        $tglAkhirMinggu5 = date("Y-m-d H:i:s", strtotime("+7 day", strtotime($tglAkhirMinggu4)));
        if ($tglAkhirMinggu5 > $tglTerakhir) {
            $tglAkhirMinggu5 = date("Y-m-d", strtotime("+1 day", strtotime($tglTerakhir))) . " 06:00:00";
        } else {
            $tglAkhirMinggu5 = $tglAkhirMinggu5;
        }
        $whereMinggu5 = "weight_out_time between '$tglAwalMinggu5' and '$tglAkhirMinggu5'  and del = 0 $tipeFilter";
        $data['whereMinggu5'] = date("d", strtotime($tglAwalMinggu5)) . " s/d " . date("d F Y", strtotime($tglAkhirMinggu5));
        ///////////////////////////

        $timbang1 = $model->getSelect("tbl_weight_scale", $tHariKemaren);
        $ritasiTimbang1 = count($timbang1);
        $timbang2 = $model->getSelect("tbl_weight_scale", $tHariIni);
        $ritasiTimbang2 = count($timbang2);
        $timbangAll = $model->getSelect("tbl_weight_scale", $tYear);
        $ritasiTimbangAll = count($timbangAll);
        $timbangHour = $model->getSelect("tbl_weight_scale", $tPerJam);
        $ritasiTimbangHour = count($timbangHour);
        $timbangHour_2 = $model->getSelect("tbl_weight_scale", $tPerJam_2);
        $ritasiTimbangHour_2 = count($timbangHour_2);
        $timbangMinggu1 = $model->getSelect("tbl_weight_scale", $whereMinggu1);
        $timbangMinggu2 = $model->getSelect("tbl_weight_scale", $whereMinggu2);
        $timbangMinggu3 = $model->getSelect("tbl_weight_scale", $whereMinggu3);
        $timbangMinggu4 = $model->getSelect("tbl_weight_scale", $whereMinggu4);
        $timbangMinggu5 = $model->getSelect("tbl_weight_scale", $whereMinggu5);

        $totalTimbang1 = 0;
        $totalTimbang2 = 0;
        $totalAll = 0;
        $totalHour = 0;
        $totalHour2 = 0;
        $totalMinggu1 = 0;
        $totalMinggu2 = 0;
        $totalMinggu3 = 0;
        $totalMinggu4 = 0;
        $totalMinggu5 = 0;

        foreach ($timbang1 as $t1) {
            $totalTimbang1 += ($t1['weight_in'] - $t1['weight_out']);
        }
        foreach ($timbang2 as $t2) {
            $totalTimbang2 += ($t2['weight_in'] - $t2['weight_out']);
        }
        foreach ($timbangAll as $ta) {
            $totalAll += ($ta['weight_in'] - $ta['weight_out']);
        }
        foreach ($timbangHour as $th) {
            $totalHour += ($th['weight_in'] - $th['weight_out']);
        }
        foreach ($timbangHour_2 as $th2) {
            $totalHour2 += ($th2['weight_in'] - $th2['weight_out']);
        }
        foreach ($timbangMinggu1 as $tm1) {
            $totalMinggu1 += ($tm1['weight_in'] - $tm1['weight_out']);
        }
        foreach ($timbangMinggu2 as $tm2) {
            $totalMinggu2 += ($tm2['weight_in'] - $tm2['weight_out']);
        }
        foreach ($timbangMinggu3 as $tm3) {
            $totalMinggu3 += ($tm3['weight_in'] - $tm3['weight_out']);
        }
        foreach ($timbangMinggu4 as $tm4) {
            $totalMinggu4 += ($tm4['weight_in'] - $tm4['weight_out']);
        }
        foreach ($timbangMinggu5 as $tm5) {
            $totalMinggu5 += ($tm5['weight_in'] - $tm5['weight_out']);
        }

        $data['timbang1'] = number_format($totalTimbang1, 2, ",", ".") . " Kg </br> Ritasi : " . $ritasiTimbang1 . " " . $ritasi;
        $data['timbang2'] = number_format($totalTimbang2, 2, ",", ".") . " Kg </br> Ritasi : " . $ritasiTimbang2 . " " . $ritasi;
        $data['timbangAll'] = number_format($totalAll, 2, ",", ".") . " Kg </br> Ritasi : " . $ritasiTimbangAll . " " . $ritasi;
        $data['timbangHour'] = number_format($totalHour, 2, ",", ".") . " Kg </br> Ritasi : " . $ritasiTimbangHour . " " . $ritasi;
        $data['timbangHour_2'] = number_format($totalHour2, 2, ",", ".") . " Kg </br> Ritasi : " . $ritasiTimbangHour_2 . " " . $ritasi;
        $data['timbangMinggu1'] = number_format($totalMinggu1, 2, ",", ".");
        $data['timbangMinggu2'] = number_format($totalMinggu2, 2, ",", ".");
        $data['timbangMinggu3'] = number_format($totalMinggu3, 2, ",", ".");
        $data['timbangMinggu4'] = number_format($totalMinggu4, 2, ",", ".");
        $data['timbangMinggu5'] = number_format($totalMinggu5, 2, ",", ".");

        echo json_encode($data);
    }

    public function timbangPerJam()
    {
        $model = new Home_model();
        $jam = $this->request->getPost('jam');
        $jamArr = explode(":", $jam);
        $tipe = $this->request->getPost('tipe');
        if ($tipe == "truck") {
            $tipeFilter = "and tipe in ('TP', 'TD')";
            $ritasi = "TRUCK";
        } else if ($tipe == "barge") {
            $tipeFilter = "and tipe in ('BP')";
            $ritasi = "BARGE";
        } else {
            $tipeFilter = "";
            $ritasi = "(ALL)";
        }

        $hourNow = date("Y-m-d ") . $jamArr[0] . ":00:00";
        $hourLimit = date("Y-m-d ") . $jamArr[0] . ":59:59";
        $tPerJam = "weight_out_time between '$hourNow' and '$hourLimit'  and del = 0 $tipeFilter";
        $timbangHour = $model->getSelect("tbl_weight_scale", $tPerJam);
        $ritasiHour = count($timbangHour);
        $totalHour = 0;
        foreach ($timbangHour as $th) {
            $totalHour += ($th['weight_in'] - $th['weight_out']);
        }

        $data['timbangHour'] = number_format($totalHour, 2, ",", ".") . " Kg </br> Ritasi : " . $ritasiHour . " " . $ritasi;
        echo json_encode($data);
    }

    public function timbangPerJam_2()
    {
        $model = new Home_model();
        $jam = $this->request->getPost('jam');
        $jamArr = explode(":", $jam);
        $tipe = $this->request->getPost('tipe');
        if ($tipe == "truck") {
            $tipeFilter = "and tipe in ('TP', 'TD')";
            $ritasi = "TRUCK";
        } else if ($tipe == "barge") {
            $tipeFilter = "and tipe in ('BP')";
            $ritasi = "BARGE";
        } else {
            $tipeFilter = "";
            $ritasi = "(ALL)";
        }

        $hourNow = date("Y-m-d ") . $jamArr[0] . ":00:00";
        $hourLimit = date("Y-m-d ") . $jamArr[0] . ":59:59";
        $tPerJam = "weight_out_time <= '$hourLimit' and weight_in > 0 and del = 0 $tipeFilter";
        $timbangHour = $model->getSelect("tbl_weight_scale", $tPerJam);
        $ritasiHour = count($timbangHour);
        $totalHour = 0;
        foreach ($timbangHour as $th) {
            $totalHour += ($th['weight_in'] - $th['weight_out']);
        }

        $data['timbangHour'] = number_format($totalHour, 2, ",", ".") . " Kg </br> Ritasi : " . $ritasiHour . " " . $ritasi;
        echo json_encode($data);
    }
}
