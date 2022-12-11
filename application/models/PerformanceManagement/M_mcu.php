<?php

class M_mcu extends CI_Model{

    public $table = 'trMcu';

    private function _uploadReport($data)
    {
        $config['upload_path']          = FCPATH . '/upload_file/mcuReport/';
        $config['allowed_types']        = 'pdf';
        $config['file_name']            =  $this->input->post('uniqId', true);
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
            'age'                => $age
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
        $this->db->limit(5);

        return $this->db->get()->result_array();
    }
}
