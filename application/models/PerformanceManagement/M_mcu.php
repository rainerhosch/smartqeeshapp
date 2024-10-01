<?php

class M_mcu extends CI_Model{

    public $table = 'trMcu';

    private function _uploadReport($data)
    {
        $person = $this->input->post('employee_name', true);
        $filenameX = $this->input->post('uniqId', true);

        $config['upload_path']          = FCPATH . '/upload_file/mcuReport/';
        $config['allowed_types']        = 'pdf';
        $config['file_name']            =  $person.'_'.$filenameX;
        $config['max_size']             =  2048; // 2MB

        $this->load->library('upload', $config);

        if ($this->upload->do_upload($data)) {
            return $this->upload->data("file_name");
        } else {
            return null;
        }
    }

// ---------------------------------- GET DATA --------------------------------------

    public function get_data()
    {
        return $this->db->get($this->table)->result();
        
    }

    public function get_employeenik()
    {
        $this->db->select('*');
        $this->db->from('mEmployee');
        return $this->db->get()->result_array();
        
    }

    public function get_employeedata()
    {
        $this->db->select('*');
        $this->db->from('mEmployee e');
        $this->db->join('mDepartemen d', 'e.intIdDepartment = d.intIdDepartement');
        $this->db->where('e.intIdEmployee');
        return $this->db->get()->result_array();
        
    }

    public function getdetailemployee($code)
    {
        $this->db->select('*');
        $this->db->from('mEmployee e');
        $this->db->join('mDepartemen d', 'e.intIdDepartment = d.intIdDepartement');
        $this->db->where('e.intIdEmployee', $code);
        return $this->db->get()->row_array();
    }

    public function get_hospital()
    {
        $this->db->select('*');
        $this->db->from('mHospital');
        return $this->db->get()->result_array();
        
    }

    public function get_disease()
    {
        $this->db->select('*');
        $this->db->from('mDisease');
        return $this->db->get()->result_array();
        
    }

    public function get_iddisease($id)
    {
        $this->db->select('*');
        $this->db->from('trMcu.m');
        $this->db->join('mDisease f', 'm.identified_disease = f.intidDisease');
        return $this->db->get()->result_array();
        
    }

    public function getWhere_disease($id)
    {
        $this->db->select('*');
        $this->db->from('mDisease');
        $this->db->where('intidDisease',$id);
        return $this->db->get()->row_array();
        
    }

    public function get_mcutype()
    {
        $this->db->select('*');
        $this->db->from('mMcuType');
        return $this->db->get()->result_array();
        
    }

    public function get_listmcu()
    {
        $this->db->select('*');
        $this->db->from('trMcu m');
        $this->db->join('mEmployee e', 'm.intIdEmployee = e.intIdEmployee');
        $this->db->join('mDepartemen d', 'e.intIdDepartment = d.intIdDepartement');
        $this->db->join('mDisease f', 'm.identified_disease = f.intidDisease');
        $this->db->order_by('id','ASC');

        return $this->db->get()->result();
    }

    public function get_mcuperiod()
    {
        $this->db->select('mcu_period');
        $this->db->from('trMcu');
        $this->db->group_by('mcu_period');
        return $this->db->get()->result();
    }

    public function get_deptlist()
    {
        $this->db->select('*');
        $this->db->from('mDepartemen');
        return $this->db->get()->result_array();
    }

// ---------------------------------- CRUD --------------------------------------

    public function create()
    {
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
        $mcu_report         = $this->_uploadReport('uploadReport');
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
            'mcu_report'         => $mcu_report,
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

        $this->db->insert($this->table, $data);
    }

    public function edit_data($where, $table)
    { 
        return $this->db->get_where($table, $where); 
    } 

    public function update_data($where,$data,$table)
    { 
        $this->db->where($where);  
        $this->db->update($table,$data); 
    }

    public function destroy($id)
    {
        $this->db->where('id',$id);
        $this->db->delete($this->table);
    }

// ---------------------------------- FILTER SEARCH --------------------------------------

    public function get_nik($keyword_nik)
    {
        $this->db->select('*');
        $this->db->from($this->table);
        $this->db->like('employee_number',$keyword_nik);
        return $this->db->get()->result();
    }

    public function get_dept($keyword_dept)
    {
        $this->db->select('*');
        $this->db->from($this->table);
        $this->db->like('department',$keyword_dept);
        return $this->db->get()->result();
    }

    public function get_mcuperf()
    {
        $this->db->select ('*, COUNT(*) as total');
        $this->db->from('trMcu m');
        $this->db->join('mDisease p', 'm.identified_disease = p.intidDisease');
        $this->db->group_by('txtNamaDisease');
        $this->db->order_by('total', 'DESC');
        $this->db->limit(6);

        return $this->db->get()->result_array();
    }

    public function detail_data($id=null)
    {
        $query = $this->db->get_where('trMcu',array('id'=>$id))->row();
        return $query;
    }

    public function totaldisease($like, $where)
    {
        $this->db->select('*');
        $this->db->from('trMcu m');
        $this->db->join('mEmployee e', 'm.intIdEmployee = e.intIdEmployee');
        $this->db->join('mDepartemen d', 'e.intIdDepartment = d.intIdDepartement');
        
        if($where['d.intIdDepartement']!='')
        {
            $this->db->where('d.intIdDepartement', $where['d.intIdDepartement']);
        }
        if($where['m.mcu_period']!='')
        {
            $this->db->where('m.mcu_period', $where['m.mcu_period']);
        }
        $this->db->like('m.identified_disease', $like, 'both');

        return $this->db->get()->num_rows();
    }

    public function totaldept($wheres)
        {
            $this->db->select('d.txtNamaDepartement, COUNT(m.id) as total');
            $this->db->from('trMcu m');
            $this->db->join('mEmployee e', 'm.intIdEmployee = e.intIdEmployee');
            $this->db->join('mDepartemen d', 'e.intIdDepartment = d.intIdDepartement');
            if($wheres['dept']!='')
            {
                $this->db->where('d.intIdDepartement', $wheres['dept']);
            }
            if($wheres['filterperiod']!='')
            {
                $this->db->where('m.mcu_period', $wheres['filterperiod']);
            }
            $this->db->group_by('d.txtNamaDepartement');

            return $this->db->get()->result_array();
        }

        public function totalpenyakit($wheres)
        {
            $this->db->select('m.*');
            $this->db->from('trMcu m');
            $this->db->join('mEmployee e', 'm.intIdEmployee = e.intIdEmployee');
            $this->db->join('mDepartemen d', 'e.intIdDepartment = d.intIdDepartement');
            if($wheres['dept']!='')
            {
                $this->db->where('d.intIdDepartement', $wheres['dept']);
            }
            if($wheres['filterperiod']!='')
            {
                $this->db->where('m.mcu_period', $wheres['filterperiod']);
            }
            
            return $this->db->get()->result_array();
    }

    public function dataPeriod_get($date){
        $old = $date - 5;
        $this->db->select('identified_disease, mcu_period');
        $this->db->from('trMcu');
        $this->db->where('mcu_period >=', $old);
        $this->db->where('mcu_period <=', $date);
        return $this->db->get()->result();
    }

}
