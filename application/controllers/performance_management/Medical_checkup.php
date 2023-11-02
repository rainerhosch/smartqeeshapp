<?php
defined('BASEPATH') or exit('No direct script access allowed');
/**
 *  File Name             : Medical_checkup.php
 *  File Type             : Controller
 *  File Package          : CI_Controller
 ** * * * * * * * * * * * * * * * * * **
 *  Author                : Muhamad Rizky Kholba & Rifqi Fadhillah
 *  Date Created          : 31/03/2022
 *  Quots of the code     : 'rapihkan lah code mu, seperti halnya kau menata kehidupan'
 */
class Medical_checkup extends CI_Controller
{
    public $table = 'trMcu';
    public function __construct()
    {
        parent::__construct();
        login_check();
        $this->load->model('M_user', 'user');
        $this->load->model('PerformanceManagement/M_mcu');
    }

// ---------------------------------- INPUT MCU DATA --------------------------------------

    public function index()
    {
        $data['mcup'] = $this->M_mcu->get_data();
        $data['employee'] = $this->M_mcu->get_employeenik();
        $data['hospital'] = $this->M_mcu->get_hospital();
        $data['disease'] = $this->M_mcu->get_disease();
        $data['type'] = $this->M_mcu->get_mcutype();
        $data['listmcu'] = $this->M_mcu->get_listmcu();
        
        $data['title'] = 'Smart Qeesh App - Input Data MCU';
        $data['page'] = 'Home';
        $data['subpage'] = 'Blank Page';
        // $data['user_divisi'] = 'CT-HSE';
        $data['content'] = 'pages/performance_management/medical_checkup';
        $this->load->view('template', $data);
    }

// ---------------------------------- MCU RECORD --------------------------------------

    public function mcu_record()
    {
        // $data['mcup'] = $this->M_mcu->get_data();
        $data['employee'] = $this->M_mcu->get_employeenik();
        $data['deptlist'] = $this->M_mcu->get_deptlist();
        
        $data['mcuperiod'] = $this->M_mcu->get_mcuperiod();
        

        $buttonSRCH = $this->input->post('searchVal', true);
        if($buttonSRCH != '1'){
            $data['disease'] = $this->M_mcu->get_disease();
            $array_penyakit = array();
            foreach ($data['disease'] as $i=>$penyakit){
                $array_penyakit[$penyakit['intidDisease']] = $penyakit['txtNamaDisease'];
            }
            $data['listmcu'] = $this->M_mcu->get_listmcu();
            $data['penyakit'] = $array_penyakit;
            $data['struk'] = NULL;
            $data['search'] = NULL;
        }else{
            $idPeriod = $this->input->post('filterperiod', true);
            $idDept = $this->input->post('dept', true);
            $idNik = $this->input->post('nik', true);
            $idStatus = $this->input->post('filterstatus', true);
            $idDisease = $this->input->post('filterdisease', true);

            $data['search'] = [$idPeriod, $idStatus, $idNik, $idDisease, $idDept];
            $data['struk'] = $this->M_mcu->getWhere_disease($idDisease);
            $data['disease'] = $this->M_mcu->get_disease();
            $array_penyakit = array();
            foreach ($data['disease'] as $i=>$penyakit){
                $array_penyakit[$penyakit['intidDisease']] = $penyakit['txtNamaDisease'];
            }
            $data['penyakit'] = $array_penyakit;
            $this->db->select('*');
            $this->db->from('trMcu m');
            $this->db->join('mEmployee e', 'm.intIdEmployee = e.intIdEmployee');
            $this->db->join('mDepartemen d', 'e.intIdDepartment = d.intIdDepartement');
            $this->db->join('mDisease f', 'm.identified_disease = f.intidDisease');

            if(!empty($idStatus)) {
            $this->db->where('m.health_status', $idStatus);
            }
            // if(!empty($idDisease)) {
            //     $this->db->where('m.identified_disease', $idDisease);
            // }
            if(!empty($idPeriod)) {
                // $ymd = explode("-", $idPeriod);
                // $RESULTEXPL = $ymd[0];
                $this->db->where('SUBSTRING(m.mcu_period, 1,4) =', $idPeriod);
            }
            if(!empty($idDept)) {
                $this->db->where('e.intIdDepartment', $idDept);
            }
            if(!empty($idNik)) {
                $this->db->where('e.intIdEmployee', $idNik);
            }
            $data['listmcu'] = $this->db->get()->result();
        }
        
        

        // var_dump($mcu);
        //$data['mcu']=$this->m_mcu->tampil_data()->result();
        $data['title'] = 'Smart Qeesh App - MCU Record';
        $data['page'] = 'Home';
        $data['subpage'] = 'Blank Page';
        // $data['user_divisi'] = 'CT-HSE';
        $data['content'] = 'pages/performance_management/mcu_record';
        $this->load->view('template', $data);
    }

    public function search()
    {
        $data['title'] = 'Smart Qeesh App';
        // $data['page'] = 'Home';
        // $data['subpage'] = 'Blank Page';
        // // $data['user_divisi'] = 'CT-HSE';
        // $data['content'] = 'pages/performance_management/mcu_record';

        $idPeriod = $this->input->post('filterperiod', true);
        $idDept = $this->input->post('dept', true);
        $idNik = $this->input->post('nik', true);
        $idStatus = $this->input->post('filterstatus', true);
        $idDisease = $this->input->post('filterdisease', true);

        echo $idPeriod.' - '.$idDept.' - '.$idNik.' - '.$idStatus.' - '.$idDisease;

        $this->db->select('*');
        $this->db->from('trMcu m');
        $this->db->join('mDisease p', 'm.identified_disease = p.intidDisease');
        $this->db->join('mEmployee e', 'm.intIdEmployee = e.intIdEmployee');
        $this->db->join('mDepartemen d', 'e.intIdDepartment = d.intIdDepartement');

        if(!empty($idStatus)) {
            $this->db->where('m.health_status', $idStatus);
        }
        if(!empty($idDisease)) {
            $this->db->like('m.identified_disease', $idDisease);
        }
        if(!empty($idPeriod)) {
            // $ymd = explode("-", $idPeriod);
            // $RESULTEXPL = $ymd[0];
            $this->db->where('SUBSTRING(m.mcu_period, 1,4) =', $idPeriod);
        }
        if(!empty($idDept)) {
            $this->db->where('e.intIdDepartment', $idDept);
        }
        $query = $this->db->get()->result_array();
        // return $query->result_array();
        echo '<pre>';
        echo print_r($query);
        echo '</pre>';
        // var_dump($query);
        exit;
        // $this->load->view('template', $data);
    }

// ---------------------------------- MCU PERFORMANCE --------------------------------------

    public function mcu_perf()
    {
        $wheres['dept'] = $this->input->get('dept')!='' ? $this->input->get('dept'):'';
        $wheres['filterperiod'] = $this->input->get('filterperiod')!='' ? $this->input->get('filterperiod'):'';
        $data['mcuperf'] = $this->M_mcu->get_mcuperf();
        $data['totalpenyakit'] = $this->M_mcu->totalpenyakit($wheres);
        $data['deptlist'] = $this->M_mcu->get_deptlist();
        $data['mcuperiod'] = $this->M_mcu->get_mcuperiod();
        $data['numbers'] = range(0, 60);
        // $data['totaldept'] = $this->M_mcu>totaldept($wheres);
        
        $data['fwn']=$this->db->get_where('trMcu', ['health_status' => 'Fit with Note'])->result_array();
        $data['unfit']=$this->db->get_where('trMcu', ['health_status' => 'Unfit'])->result_array();
        $data['ffw']=$this->db->get_where('trMcu', ['health_status' => 'Fit for Work'])->result_array();
        $data['disease'] = $this->M_mcu->get_disease();
        $array_penyakit = array();
        $array_penyakit1 = array();
        $array_penyakit2 = array();
        $array_penyakit3 = array();
        $array_total = array();
        $array_status = array();
        $array_statustotal = array();
        $where = array();
        if(count($data['totalpenyakit'])> 0){

            foreach ($data['totalpenyakit'] as $i=>$penyakit)
            {
            $identified_disease = explode(",",$penyakit['identified_disease']);
            foreach ($identified_disease as $key => $value) {
                $array_penyakit[][$value] =  $penyakit;
            }
            // $like = $penyakit['intidDisease'];
            
            // $where = [
            //     'health_status' => $penyakit['health_status'],
            //     'm.mcu_period' => $wheres['filterperiod'],
            //     'd.intIdDepartement' => $wheres['dept'],
            // ];
            // $array_penyakit[$i] = $penyakit['txtNamaDisease'];
            // $array_total[$i] = $this->M_followup->totaldisease($like, $where);

        }
        
        foreach ($array_penyakit as $key => $value) {
            # code...
            $ii = 0;
            foreach ($value as $k => $v) {
                $array_penyakit2[$k][] = 1;
                $ii++;
            }
        }

        foreach ($array_penyakit2 as $key => $value) {
            $penyakit = $this->M_mcu->getWhere_disease($key);
            $array_penyakit3['array_penyakit'][] = $penyakit['txtNamaDisease'];
            $array_penyakit3['array_total'][] = count($value);
            
        }
        }
        $penyakit = isset($array_penyakit3['array_penyakit']) ? $array_penyakit3['array_penyakit'] : array();
        $total = isset($array_penyakit3['array_total']) ? $array_penyakit3['array_total'] : array();
        $data['penyakit'] = json_encode($penyakit);
        $data['total'] = json_encode($total);
        //Old
        // foreach ($data['mcuperf'] as $i=>$penyakit)
        // {
        //     $like = $penyakit['intidDisease'];

        //     $where = [
        //         'm.mcu_period' => $wheres['filterperiod'],
        //         'd.intIdDepartement' => $wheres['dept'],
        //     ];
        //     $array_penyakit[$i] = $penyakit['txtNamaDisease'];
            
        //     $array_total[$i] = $this->M_mcu->totaldisease($like, $where);    
        // }
        // $data['penyakit'] = json_encode($array_penyakit);
        // $data['total'] = json_encode($array_total);
        // echo '<pre>';
        // echo print_r($data['penyakit']);
        // echo '</pre>';
        // exit;

        // var_dump($mcu);
        //$data['mcu']=$this->m_mcu->tampil_data()->result();
        $data['title'] = 'Smart Qeesh App - MCU Performance';
        $data['page'] = 'Home';
        $data['subpage'] = 'Blank Page';
        // $data['user_divisi'] = 'CT-HSE';
        $data['content'] = 'pages/performance_management/mcu_perf';
        $this->load->view('template', $data);
    }

// ---------------------------------- CRUD DATA --------------------------------------

    public function input_data()
    {
        $this->M_mcu->create();
        $this->session->set_flashdata('flash', 'ditambahkan');
        redirect('performance_management/medical_checkup/mcu_record');
    }
    
    public function destroy()
    {
        if($this->input->is_ajax_request())
        {
            $id = $this->input->post('id');
            if($id)
            {
                $this->M_mcu->destroy($id);
                $data = [
                    'code' => 200,
                    'status' => true,
                    'msg' => 'Data berhasil dihapus',
                    'data' => NULL
                ];
            }else{
                // jika id tidak ada
                $data = [
                    'code' => 400,
                    'status' => false,
                    'msg' => 'Data tidak ditemukan',
                    'data' => NULL
                ];
            }
            echo json_encode($data);
        }

    }

    public function edit($id)
    { 
        $where = array('id' =>$id); 

        $data['mcup'] = $this->M_mcu->edit_data($where, $this->table)->row();
        $data['mcuedit'] = $this->M_mcu->get_data();
        $data['employe'] = $this->M_mcu->get_employeenik();
        $data['hospital'] = $this->M_mcu->get_hospital();
        $data['disease'] = $this->M_mcu->get_disease();
        $data['type'] = $this->M_mcu->get_mcutype();
        $data['listmcu'] = $this->M_mcu->get_listmcu();
        $data_from_database = $this->M_mcu->getWhere_disease($id); // Replace 'getDataById' with your actual method name
        $data['diseases'] = explode(',', $data_from_database['identified_disease']);
        $data['title'] = 'Smart Qeesh App - MCU Edit';
        $data['page'] = 'Home';
        $data['subpage'] = 'Blank Page';
        // $data['user_divisi'] = 'CT-HSE';
        $data['content'] = 'pages/performance_management/medical_checkup_edit';
        $this->load->view('template', $data);
    }

    //fungsi untuk memperbaharui/mengupdate data dari database 
    public function update()
    {
        $id                 = $this->input->post('id'); 
        $employee_number    = $this->input->post('nik');
        $employee_name      = $this->input->post('employee_name');
        $address            = $this->input->post('address');
        $department         = $this->input->post('department');
        $service_period     = $this->input->post('service_period');
        $age                = $this->input->post('age');
        $mcu_period         = $this->input->post('mcu_period');
        $hospital           = $this->input->post('hospital');
        $mcu_type           = $this->input->post('mcu_type');
        $mcu_date           = $this->input->post('mcu_date');
        $health_status      = $this->input->post('health_status');
        $identified_disease = $this->input->post('identified_disease');
        $treatment          = $this->input->post('treatment');
        // $mcu_report         = $this->upload-?_uploadReport('uploadReport');
        $height             = $this->input->post('height');
        $weight             = $this->input->post('weight');
        $cholesterol        = $this->input->post('cholesterol');
        $gout               = $this->input->post('gout');
        $bloodsugar         = $this->input->post('bloodsugar');
        $bloodpressure      = $this->input->post('bloodpressure');
        $bmi                = $this->input->post('bmi');

        $data = array(
            'service_period'     => $service_period,
            'mcu_period'         => $mcu_period,
            'hospital'           => $hospital,
            'mcu_type'           => $mcu_type,
            'mcu_date'           => $mcu_date,
            'health_status'      => $health_status,
            'identified_disease' => implode(",",$identified_disease),
            'treatment'          => $treatment,
            // 'mcu_report'         => $mcu_report,
            'intIdEmployee'      => $employee_number,
            'age'                => $age,
            'height'             => $height,
            'weight'             => $weight,
            'cholesterol'        => $cholesterol,
            'gout'               => $gout,
            'bloodsugar'         => $bloodsugar,
            'bloodpressure'      => $bloodpressure,
            'bmi'                => $bmi
        );
        $where = array( 'id' => $id ); 
        $this->M_mcu->update_data($where,$data,'trMcu');
        $this->session->set_flashdata('flash', 'diupdate'); 
        redirect('performance_management/medical_checkup/mcu_record');
    }

// ---------------------------------- FILTER SEARCH --------------------------------------

    public function filter_nik()
    {
        $keyword_nik = $this->input->post('keyword_nik');
        $data['mcup'] = $this->M_mcu->get_nik($keyword_nik);
        //$data['mcu']=$this->m_mcu->tampil_data()->result();
        $data['title'] = 'Smart Qeesh App';
        $data['page'] = 'Home';
        $data['subpage'] = 'Blank Page';
        // $data['user_divisi'] = 'CT-HSE';
        $data['content'] = 'pages/performance_management/medical_checkup';
        $this->load->view('template', $data);
    }

    public function filter_dept()
    {
        $keyword_dept = $this->input->post('keyword_dept');
        $data['mcup'] = $this->M_mcu->get_dept($keyword_dept);
        //$data['mcu']=$this->m_mcu->tampil_data()->result();
        $data['title'] = 'Smart Qeesh App';
        $data['page'] = 'Home';
        $data['subpage'] = 'Blank Page';
        // $data['user_divisi'] = 'CT-HSE';
        $data['content'] = 'pages/performance_management/medical_checkup';
        $this->load->view('template', $data);
    }

    public function getIdEmployee()
    {
		if ($this->input->is_ajax_request()) {
			$code = $_POST['kode'];
			$check = $this->M_mcu->getdetailemployee($code);
			if($check)
			{
                echo json_encode($check);
				
			}else{
				echo json_encode('asadd');
			}
		}else{
			echo 'You can not access';
		}
	}

    public function unfit_followup()
    {
        $data['mcup'] = $this->M_mcu->get_data();
        $data['employee'] = $this->M_mcu->get_employeenik();
        $data['hospital'] = $this->M_mcu->get_hospital();
        $data['disease'] = $this->M_mcu->get_disease();
        $data['type'] = $this->M_mcu->get_mcutype();
        $data['listmcu'] = $this->M_mcu->get_listmcu();
        
        $data['title'] = 'Smart Qeesh App - Unfit Followup';
        $data['page'] = 'Home';
        $data['subpage'] = 'Blank Page';
        // $data['user_divisi'] = 'CT-HSE';
        $data['content'] = 'pages/performance_management/unfit_followup';
        $this->load->view('template', $data);
    }

    public function detailpdf($id){ 
        //load library dompdf_gen 
        $this->load->library('dompdf_gen'); 
        //menampilkan data mahasiswa yang ada pada tabel 
        $detail=$this->M_mcu->detail_data($id);
        $data['detail']=$detail;
        $data['employee'] = $this->M_mcu->get_employeenik();
        $data['dept'] = $this->M_mcu->get_deptlist();
        $data['hospital'] = $this->M_mcu->get_hospital();
        $data['disease'] = $this->M_mcu->get_disease();
        $data['type'] = $this->M_mcu->get_mcutype();
        $data['listmcu'] = $this->M_mcu->get_listmcu();
        //load view laporan_pdf 
        $this->load->view('pages/performance_management/detail_employee',$data); 
        
        //menentukan ukuran kertas 
        $paper_size = 'A4'; 
        
        //menentukan orientation kertas 
        $orientation = 'portrait'; 
        $html = $this->output->get_output(); 
        
        //set(pengaturan) kertas 
        $this->dompdf->set_paper($paper_size, $orientation); 
        
        //convert ke pdf 
        $this->dompdf->load_html($html); 
        $this->dompdf->render();
        
        //menentukan file export 
        $this->dompdf->stream("Detail_employee.pdf", array('Attachment' =>0)); 
    }

    // public function toprank() {
    //     $date = date('Y');
    //     $data = $this->M_mcu->dataPeriod_get($date);
    //     $arr = [];
    
    //     foreach ($data as $row) {
    //         $year = $row->mcu_period;
    //         $penyakit = explode(',', $row->identified_disease);
    //         foreach ($penyakit as $rows) {
    //             $id = $rows;
    //             $check = $this->db->get_where('mDisease', ['intidDisease' => $id])->row();
    //             if ($check) {
    //                 $keyToAdd = $check->txtNamaDisease;
    //                 if (!isset($arr[$year])) {
    //                     $arr[$year] = [];
    //                 }
    //                 if (array_key_exists($keyToAdd, $arr[$year])) {
    //                     $arr[$year][$keyToAdd]++;
    //                 } else {
    //                     $arr[$year][$keyToAdd] = 1;
    //                 }
    //             }
    //         }
    //     }
    
    //     // Sort the data by year in descending order
    //     krsort($arr);
    
    //     // Get the top 5 elements of each year
    //     $result = [];
    //     foreach ($arr as $year => $diseases) {
    //         arsort($diseases);
    //         $top5 = array_slice($diseases, 0, 5);
    //         $result[$year] = $top5;
    //     }
    //     $datagrafik = [];
    //     foreach($result as $years => $arrpenyakit){
    //         foreach($arrpenyakit as $datapenyakit => $arrjumlah){
    //             $datagrafik[$datapenyakit][$years] = $arrjumlah;
    //         }
    //     }
    //     echo"<pre>";
    //     echo print_r($arr);
    //     echo"</pre>";
        
    //     echo json_encode($result);
    // }

    public function toprank() {
            $date = date('Y');
            $data = $this->M_mcu->dataPeriod_get($date);
            $get_disease = $this->M_mcu->get_disease();
            $arr = [];
            $masterarr = [];
            foreach ($data as $key => $row) {
                $year = $row->mcu_period;
                $penyakit = explode(',', $row->identified_disease);
                foreach($get_disease as $kp => $dis){
                    $masterarr[$year][$dis['intidDisease']] = $dis['txtNamaDisease'];

                }
                foreach ($penyakit as $k => $rows) {
                    $id = $rows;
                    $check = $this->db->get_where('mDisease', ['intidDisease' => $id])->row();

                    // if(isset($check)){

                    //     $arr[$year][$check->txtNamaDisease] = 1;
                    // } else {
                    //     $arr[$year][$check->txtNamaDisease] =[];

                    // }
                    if ($check) {
                        $keyToAdd = $check->intidDisease;
                        if (!isset($arr[$year])) {
                            $arr[$year] = [];
                        }
                        if (array_key_exists($keyToAdd, $arr[$year])) {
                            $arr[$year][$keyToAdd]++;
                        } else {
                            $arr[$year][$keyToAdd] = 1;
                        }
                    }
                }
            }
            

            $datagrafik = [];
            foreach($masterarr as $year => $v){
                foreach($v as $id => $val){
                    $datagrafik[$year][$val] = isset($arr[$year][$id]) ? $arr[$year][$id] :0;
                }
            }

            // $sort = array();
            // foreach($datagrafik as $key =>$val) {

            //     foreach($val as $k=>$v) {
            //         $sort['title'][$k] = $v['title'];
            //         $sort['event_type'][$k] = $v['event_type'];
            //     }
            //     # It is sorted by event_type in descending order and the title is sorted in ascending order.
            //     array_multisort($sort['event_type'], SORT_DESC, $sort['title'], SORT_ASC,$my_list);
            // }

            krsort($datagrafik);
        
            // Get the top 5 elements of each year
            $result = [];
            foreach ($datagrafik as $year => $diseases) {
                foreach ($diseases as $nm => $jum) {
                    
                    arsort($diseases);
                    $top5 = array_slice($diseases, 0, 5);
                    $result[$year] = $top5;
                }
            }
            // Sort the data by year in descending order
            
            $datagrafiks = [];
            foreach($result as $years => $arrpenyakit){
                foreach($arrpenyakit as $datapenyakit => $arrjumlah){
                    $datagrafiks[$datapenyakit][$years] = $arrjumlah;
                }
            }
            // echo"<pre>";
            // echo print_r($result);
            // echo"</pre>";
            
            echo json_encode($result);
        }

        public function mcu_perf_new()
    {
        $data['mcuperf'] = $this->M_mcu->get_mcuperf();
        $data['deptlist'] = $this->M_mcu->get_deptlist();
        $data['mcuperiod'] = $this->M_mcu->get_mcuperiod();
        $data['numbers'] = range(0, 60);
        // $data['totaldept'] = $this->M_mcu>totaldept($wheres);
        
        
        $data['title'] = 'Smart Qeesh App - MCU Performance';
        $data['page'] = 'Home';
        $data['subpage'] = 'Blank Page';
        // $data['user_divisi'] = 'CT-HSE';
        $data['content'] = 'pages/performance_management/mcu_perf_new';
        $this->load->view('template', $data);
    }

}
