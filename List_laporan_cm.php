<?php if(!defined('BASEPATH')) exit('No direct script access allowed');

require APPPATH . '/libraries/BaseController.php';

/**
 * Class : list_laporan_cm (list_laporan_cmController)
 * list_laporan_cm Class to control all list_laporan_cm related operations.
 * @author : Kishor Mali
 * @version : 1.1
 * @since : 15 November 2016
 */
class list_laporan_cm extends BaseController
{
    /**
     * This is default constructor of the class
     */
    public function __construct()
    {
        parent::__construct();
        $this->load->model('list_laporan_cm_model');
        $this->isLoggedIn();   
    }
    
    /**
     * This function used to load the first screen of the list_laporan_cm
     */
    public function index()
    {
        $this->global['pageTitle'] = 'Monitoring list_laporan_cm : Dashboard';
        
        $this->loadViews("dashboard", $this->global, NULL , NULL);
    }
    
    /**
     * This function is used to load the list_laporan_cm list
     */
        function list_laporan_cmListing()
    {
    if($this->isAdmin() == FALSE || $this->isATR() == FALSE || $this->isFLM() == FALSE || $this->isSLM() == FALSE  )
    {
            $this->load->model('list_laporan_cm_model');
        
         
            $id_atmText = $this->input->post('id_atmText');
            $statusText = $this->input->post('statusText');
            $ket_statusText = $this->input->post('ket_statusText');            
            $data['id_atmText'] = $id_atmText;
            $data['statusText'] = $statusText;
            $data['ket_statusText'] = $ket_statusText;
            $this->load->library('pagination');
            
            $count = $this->list_laporan_cm_model->list_laporan_cmListingCount($id_atmText, $statusText, $ket_statusText);
            
            $returns = $this->paginationCompress ( "list_laporan_cmListing/", $count, 5 );
            
            $data['list_laporan_cmRecords'] = 
            $this->list_laporan_cm_model->list_laporan_cmListing($id_atmText, $statusText, $ket_statusText, $returns["page"], $returns["segment"]);
            
            $this->global['pageTitle'] = 'Monitoring list_laporan_cm : list_laporan_cm Listing';
            
            $this->loadViews("list_laporan_cms", $this->global, $data, NULL);
        }
        else
        {
            $this->loadThis();
        }
}

    
    function addnew4a()
    {
    if($this->isAdmin() == FALSE || $this->isFLM() == FALSE )
    {

            $this->load->model('list_laporan_cm_model');
            
            $this->global['pageTitle'] = 'SIMPANSE: Add New Laporan';

            $this->loadViews("addNew4a",  $this->global, NULL);
        }
    }

    function cek_id_atm_cm()
    {
    if($this->isAdmin() == FALSE || $this->isFLM() == FALSE)
    {
            $this->load->model('list_laporan_cm_model');
            
            $id_atm = $this->input->post('id_atm');
            $latitude_longitude = $this->input->post('latitude_longitude');
            $data['id_atm'] = $id_atm;
            $data['latitude_longitude'] = $latitude_longitude;
            $data['list_laporan_cmRecords'] = $this->list_laporan_cm_model->cek_id_atm_cm_detail($id_atm);
            
            if(count($data['list_laporan_cmRecords']) > 0){
                 $this->global['pageTitle'] = 'SIMPANSE: Add New Laporan CM';
                 $this->loadViews("addNew4b", $this->global, $data, NULL);
            }
            else{
                $this->session->set_flashdata('error', 'ID ATM salah / Bukan dalam pengelolaan anda');
                 $this->global['pageTitle'] = 'SIMPANSE: Add New Laporan CM';
                 $this->loadViews("addNew4a", $this->global, $data, NULL);
            }
           
        }
    }

    function addnew4b()
    {
    if($this->isAdmin() == FALSE || $this->isFLM() == FALSE)
    {
            $this->load->model('list_laporan_cm_model');
            
            $id_atm = $this->input->post('id_atm');
            $wilayah = $this->input->post('wilayah');
            $cabang_pemilik = $this->input->post('cabang_pemilik');
            $lokasi = $this->input->post('lokasi');
            $jenis_mesin = $this->input->post('jenis_mesin');
            $tipe_mesin = $this->input->post('tipe_mesin');
            $serial_mesin = $this->input->post('serial_mesin');
            $flm = $this->input->post('flm');
            $nama_pt_slm = $this->input->post('nama_pt_slm');
            $latitude_longitude = $this->input->post('latitude_longitude');       
                 
            $data['id_atm'] = $id_atm;
            $data['wilayah'] = $wilayah;
            $data['cabang_pemilik'] = $cabang_pemilik;
            $data['lokasi'] = $lokasi;
            $data['jenis_mesin'] = $jenis_mesin;
            $data['tipe_mesin'] = $tipe_mesin;
            $data['serial_mesin'] = $serial_mesin;
            $data['flm'] = $flm;
            $data['nama_pt_slm'] = $nama_pt_slm;
            $data['latitude_longitude'] = $latitude_longitude;
            $this->global['pageTitle'] = 'SIMPANSE: Add New Laporan';

            $this->loadViews("addNew4c", $this->global, $data, NULL);
        }
    }

    function addnew4c()
    {
    if($this->isAdmin() == FALSE || $this->isFLM() == FALSE)
    {
            $this->load->model('list_laporan_cm_model');
            
            $status = 'ON PROSES';
            $ket_status = 'FLM';
            $id_atm = $this->input->post('id_atm');
            $wilayah = $this->input->post('wilayah');
            $cabang_pemilik = $this->input->post('cabang_pemilik');
            $lokasi = $this->input->post('lokasi');
            $jenis_mesin = $this->input->post('jenis_mesin');
            $tipe_mesin = $this->input->post('tipe_mesin');
            $serial_mesin = $this->input->post('serial_mesin');
            $flm = $this->input->post('flm');
            $nama_pt_slm = $this->input->post('nama_pt_slm');
            $latitude_longitude = $this->input->post('latitude_longitude');   

            $data['status'] = $status;
            $data['ket_status'] = $ket_status;
            $data['id_atm'] = $id_atm;
            $data['wilayah'] = $wilayah;
            $data['cabang_pemilik'] = $cabang_pemilik;
            $data['lokasi'] = $lokasi;
            $data['jenis_mesin'] = $jenis_mesin;
            $data['tipe_mesin'] = $tipe_mesin;
            $data['serial_mesin'] = $serial_mesin;
            $data['flm'] = $flm;
            $data['nama_pt_slm'] = $nama_pt_slm;
            $data['latitude_longitude'] = $latitude_longitude;

            $nama_petugas_flm = $this->input->post('nama_petugas_flm');
            $npp = $this->input->post('npp');
            $no_tiket = $this->input->post('no_tiket');
            $keterangan_cm = $this->input->post('keterangan_cm');
            $data['nama_petugas_flm'] = $nama_petugas_flm;
            $data['npp'] = $npp;
            $data['no_tiket'] = $no_tiket;
            $data['keterangan_cm'] = $keterangan_cm;

            $tgl_kunjungan_flm = date('Y-m-d');
            date_default_timezone_set("Asia/Bangkok");//set you countary name from below timezone list
            $jam_kunjungan_flm = date('H:i:s');
            $pihak_yang_melakukan_kunjungan = $_SESSION["name"];
            $data['tgl_kunjungan_flm'] = $tgl_kunjungan_flm;
            $data['jam_kunjungan_flm'] = $jam_kunjungan_flm;
            $data['pihak_yang_melakukan_kunjungan'] = $pihak_yang_melakukan_kunjungan;

            $config['upload_path']          = './uploads/laporan_cm/';
            $config['allowed_types']        = 'gif|jpg|png';
            $this->load->library('upload', $config);
            if ( ! $this->upload->do_upload('foto_di_lokasi'))
            {
                $error = array('error' => $this->upload->display_errors());
                
                redirect('addNew4a');
            }
            else
            {

                $data_name = $this->upload->data(); //Returns array of containing all of the data related to the file you uploaded.
                    $config['image_library'] = 'gd2';
                    $config['source_image'] = $data_name['full_path']; //get original image
                    $config['maintain_ratio'] = TRUE;
                    $config['width'] = 1280;
                    $config['height'] = 720;
                    $this->load->library('image_lib', $config);
                    if (!$this->image_lib->resize()) {
                        $this->handle_error($this->image_lib->display_errors());
                    }
                $data = array('upload_data' => $this->upload->data());
  
                $foto_di_lokasi = $data_name['file_name'];
                        
                $data['foto_di_lokasi'] = $foto_di_lokasi;

            $list_laporan_cmInfo = array(
                'status'=>$status,
                'ket_status'=>$ket_status,
                'id_atm'=>$id_atm ,
                'wilayah'=>$wilayah ,
                'cabang_pemilik'=>$cabang_pemilik ,
                'lokasi'=>$lokasi,
                'jenis_mesin'=>$jenis_mesin,
                'tipe_mesin'=>$tipe_mesin ,
                'serial_mesin'=>$serial_mesin ,
                'flm'=>$flm ,                
                'nama_pt_slm'=>$nama_pt_slm ,
                'latitude_longitude'=>$latitude_longitude , 
                'foto_di_lokasi'=>$foto_di_lokasi ,                   
                'nama_petugas_flm'=>$nama_petugas_flm ,
                'npp'=>$npp ,
                'no_tiket'=>$no_tiket ,
                'keterangan_cm'=>$keterangan_cm,
                'tgl_kunjungan_flm'=>$tgl_kunjungan_flm ,
                'jam_kunjungan_flm'=>$jam_kunjungan_flm ,
                'pihak_yang_melakukan_kunjungan'=>$pihak_yang_melakukan_kunjungan 
                );
                $this->load->model('list_laporan_cm_model');
            $result = $this->list_laporan_cm_model->addNewlist_laporan_cm($list_laporan_cmInfo);    
            redirect('list_laporan_cmListing');
            
            }
        }
    }


    function editOld4($id = NULL)
    {
    if($this->isAdmin() == FALSE || $this->isSLM() == FALSE)
        {
            if($id == null)
            {
                redirect('list_laporan_cmListing');
            }
    
            $data['list_laporan_cmInfo'] = $this->list_laporan_cm_model->getlist_laporan_cmInfo($id);
            
            $this->global['pageTitle'] = 'Monitoring SIMPANSE : Edit list_laporan';
            
            $this->loadViews("editOld4", $this->global, $data, NULL);
        }
    }
    
    
    /**
     * This function is used to edit the visa_retail information
     */
    function editlist_laporan_cm()
    {
    if($this->isAdmin() == FALSE || $this->isSLM() == FALSE)
        {
            $id = $this->input->post('id');
            $status = 'ON PROSES';
            $ket_status = "SLM";
            $id_atm = $this->input->post('id_atm');
            $wilayah = $this->input->post('wilayah');
            $cabang_pemilik = $this->input->post('cabang_pemilik');
            $lokasi = $this->input->post('lokasi');
            $jenis_mesin = $this->input->post('jenis_mesin');
            $tipe_mesin = $this->input->post('tipe_mesin');
            $serial_mesin = $this->input->post('serial_mesin');
            $flm = $this->input->post('flm');
            $nama_pt_slm = $this->input->post('nama_pt_slm');
         
            $nama_petugas_flm = $this->input->post('nama_petugas_flm');
            $npp = $this->input->post('npp');
            $no_tiket = $this->input->post('no_tiket');
            $keterangan_cm = $this->input->post('keterangan_cm');

            $tgl_kunjungan_flm = $this->input->post('tgl_kunjungan_flm');
            $jam_kunjungan_flm = $this->input->post('jam_kunjungan_flm');
            $pihak_yang_melakukan_kunjungan = $this->input->post('pihak_yang_melakukan_kunjungan');

            $nama_petugas_slm = $this->input->post('nama_petugas_slm');
            $merk_cctv = $this->input->post('merk_cctv');
            $serial_number_cctv = $this->input->post('serial_number_cctv');
            $kondisi_kamera_cctv_dvr = $this->input->post('kondisi_kamera_cctv_dvr');
            $merk_ups = $this->input->post('merk_ups');
            $serial_number_ups = $this->input->post('serial_number_ups');
            $kondisi_ups = $this->input->post('kondisi_ups');
            $tegangan = $this->input->post('tegangan');
            $ground = $this->input->post('ground');
            $suhu_ruang = $this->input->post('suhu_ruang');
            $tindakan = $this->input->post('tindakan');
            $spare_part_yang_diganti = $this->input->post('spare_part_yang_diganti');
            $versi_image = $this->input->post('versi_image');
            $tgl_kunjungan_slm = date('Y-m-d');
            date_default_timezone_set("Asia/Bangkok");//set you countary name from below timezone list
            $jam_kunjungan_slm = date('H:i:s');

            $datetime1 = strtotime($tgl_kunjungan_flm);
            $datetime2 = strtotime($tgl_kunjungan_slm);
            $secs = $datetime2 - $datetime1;// == <seconds between the two times>
            $days = $secs / 86400;
            $aging = round($days);
            
            $data['id'] = $id;
            $data['status'] = $status;
            $data['ket_status'] = $ket_status;
            $data['id_atm'] = $id_atm;
            $data['wilayah'] = $wilayah;
            $data['cabang_pemilik'] = $cabang_pemilik;
            $data['lokasi'] = $lokasi;
            $data['jenis_mesin'] = $jenis_mesin;
            $data['tipe_mesin'] = $tipe_mesin;
            $data['serial_mesin'] = $serial_mesin;
            $data['flm'] = $flm;
            $data['nama_pt_slm'] = $nama_pt_slm;

            $data['nama_petugas_flm'] = $nama_petugas_flm;
            $data['npp'] = $npp;
            $data['no_tiket'] = $no_tiket;
            $data['keterangan_cm'] = $keterangan_cm;

            $data['tgl_kunjungan_flm'] = $tgl_kunjungan_flm;
            $data['jam_kunjungan_flm'] = $jam_kunjungan_flm;
            $data['pihak_yang_melakukan_kunjungan'] = $pihak_yang_melakukan_kunjungan;

            $data['nama_petugas_slm'] = $nama_petugas_slm;
            $data['merk_cctv'] = $merk_cctv;
            $data['serial_number_cctv'] = $serial_number_cctv;
            $data['kondisi_kamera_cctv_dvr'] = $kondisi_kamera_cctv_dvr;
            $data['merk_ups'] = $merk_ups;
            $data['serial_number_ups'] = $serial_number_ups;
            $data['kondisi_ups'] = $kondisi_ups;
            $data['tegangan'] = $tegangan;
            $data['ground'] = $ground;
            $data['suhu_ruang'] = $suhu_ruang;
            $data['tindakan'] = $tindakan;
            $data['spare_part_yang_diganti'] = $spare_part_yang_diganti;
            $data['versi_image'] = $versi_image;
            $data['tgl_kunjungan_slm'] = $tgl_kunjungan_slm;
            $data['jam_kunjungan_slm'] = $jam_kunjungan_slm;
            $data['aging'] = $aging;
            $list_laporan_cmInfo = array(
                'id'=>$id,
                'status'=>$status, 
                'ket_status'=>$ket_status,                        
                'id_atm'=>$id_atm ,
                'wilayah'=>$wilayah ,
                'cabang_pemilik'=>$cabang_pemilik ,
                'lokasi'=>$lokasi,
                'jenis_mesin'=>$jenis_mesin,
                'tipe_mesin'=>$tipe_mesin ,
                'serial_mesin'=>$serial_mesin ,
                'flm'=>$flm ,
                'nama_pt_slm'=>$nama_pt_slm ,                
                'nama_petugas_flm'=>$nama_petugas_flm ,
                'npp'=>$npp ,
                'no_tiket'=>$no_tiket ,
                'keterangan_cm'=>$keterangan_cm,
                'tgl_kunjungan_flm'=>$tgl_kunjungan_flm ,
                'jam_kunjungan_flm'=>$jam_kunjungan_flm ,
                'pihak_yang_melakukan_kunjungan'=>$pihak_yang_melakukan_kunjungan,
                'nama_petugas_slm'=>$nama_petugas_slm,
                'merk_cctv'=>$merk_cctv,
                'serial_number_cctv'=>$serial_number_cctv ,
                'kondisi_kamera_cctv_dvr'=>$kondisi_kamera_cctv_dvr,
                'merk_ups'=>$merk_ups ,
                'serial_number_ups'=>$serial_number_ups,
                'kondisi_ups'=>$kondisi_ups ,
                'tegangan'=>$tegangan ,
                'ground'=>$ground ,
                'suhu_ruang'=>$suhu_ruang ,
                'tindakan'=>$tindakan ,
                'spare_part_yang_diganti'=>$spare_part_yang_diganti ,
                'versi_image'=>$versi_image ,
                'tgl_kunjungan_slm'=>$tgl_kunjungan_slm ,
                'jam_kunjungan_slm'=>$jam_kunjungan_slm,
                'aging'=>$aging,                                
                );
                
            $result = $this->list_laporan_cm_model->editlist_laporan_cm($list_laporan_cmInfo, $id);
                
            redirect('list_laporan_cmListing');
            
        }
    }

 function editOld4_flm($id = NULL)
    {
    if($this->isAdmin() == FALSE || $this->isFLM() == FALSE)
        {
            if($id == null)
            {
                redirect('list_laporan_cmListing');
            }
    
            $data['list_laporan_cmInfo'] = $this->list_laporan_cm_model->getlist_laporan_cmInfo($id);
            
            $this->global['pageTitle'] = 'Monitoring SIMPANSE : Edit list_laporan';
            
            $this->loadViews("editOld4_flm", $this->global, $data, NULL);
        }
    }
    
    
    /**
     * This function is used to edit the visa_retail information
     */
    function editlist_laporan_cm_flm()
    {
    if($this->isAdmin() == FALSE || $this->isFLM() == FALSE)
        {
            $id = $this->input->post('id');
            $nama_petugas_flm = $this->input->post('nama_petugas_flm');
            $npp = $this->input->post('npp');
            $no_tiket = $this->input->post('no_tiket');
            $keterangan_cm = $this->input->post('keterangan_cm');
            $data['id'] = $id;

            $data['nama_petugas_flm'] = $nama_petugas_flm;
            $data['npp'] = $npp;
            $data['no_tiket'] = $no_tiket;
            $data['keterangan_cm'] = $keterangan_cm;

            $list_laporan_cmInfo = array(
                'id'=>$id,           
                'nama_petugas_flm'=>$nama_petugas_flm ,
                'npp'=>$npp ,
                'no_tiket'=>$no_tiket ,
                'keterangan_cm'=>$keterangan_cm,
                );
                
            $result = $this->list_laporan_cm_model->editlist_laporan_cm_flm($list_laporan_cmInfo, $id);
                
            redirect('list_laporan_cmListing');
            
        }
    }

    function approved_laporan_cm_flm()
    {
    if($this->isAdmin() == FALSE || $this->isFLM() == FALSE)
        {
            $id = $this->input->post('id');
            $status = "DONE";
            $ket_status =  "FINISHED";

            $data['id'] = $id;
            $data['status'] = $status;
            $data['ket_status'] = $ket_status;

            $list_laporan_cmInfo = array(
                'id'=>$id,           
                'status'=>$status ,
                'ket_status'=>$ket_status,
                );
                
            $result = $this->list_laporan_cm_model->approved_laporan_cm_flm($list_laporan_cmInfo, $id);
                
            redirect('list_laporan_cmListing');
        }
    }

    function rejected_laporan_cm_flm()
    {
            $id = $this->input->post('id');
            $ket_status =  "FLM";

            $data['id'] = $id;
            $data['ket_status'] = $ket_status;

            $list_laporan_cmInfo = array(
                'id'=>$id,          
                'ket_status'=>$ket_status,
                );
                
            $result = $this->list_laporan_cm_model->rejected_laporan_cm_flm($list_laporan_cmInfo, $id);
                
            redirect('list_laporan_cmListing');
    }

    function rejected_laporan_cm_slm()
    {
            $id = $this->input->post('id');
            $ket_status =  "FLM";

            $data['id'] = $id;
            $data['ket_status'] = $ket_status;

            $list_laporan_cmInfo = array(
                'id'=>$id,          
                'ket_status'=>$ket_status,
                );
                
            $result = $this->list_laporan_cm_model->rejected_laporan_cm_slm($list_laporan_cmInfo, $id);
                
            redirect('list_laporan_cmListing');
    }
    function deletelist_laporan_cm()
    {
            $id = $this->input->post('id');
            
            $result = $this->list_laporan_cm_model->deletelist_laporan_cm($id);
        redirect('list_laporan_cmListing');
    }

}

    
   