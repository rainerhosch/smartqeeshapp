<?php

    class M_followup extends CI_model{
        public $table = 'trMcu';

        public function get_unfitdata()
        {
            $this->db->select('*');
            $this->db->from('trMcu m');
            $this->db->where('m.health_status', 'unfit');
            $this->db->join('mEmployee e', 'm.intIdEmployee = e.intIdEmployee');
            $this->db->join('mDepartemen d', 'e.intIdDepartment = d.intIdDepartement');
            $this->db->join('mDisease f', 'm.identified_disease = f.intidDisease');
            $this->db->join('mHospital g', 'm.hospital = g.IdHospital');
            $this->db->order_by('id','ASC');
            
            return $this->db->get()->result();
            
        }

        public function update($where,$data,$table)
        {
            $this->db->where($where);  
            $this->db->update($table,$data);
        }

        public function get_disease()
        {
        $this->db->select('*');
        $this->db->from('mDisease');
        return $this->db->get()->result_array();
        
        }

        public function get_employeenik()
        {
        $this->db->select('*');
        $this->db->from('mEmployee');
        return $this->db->get()->result_array();
        
        }

        public function get_deptlist()
        {
        $this->db->select('*');
        $this->db->from('mDepartemen');
        return $this->db->get()->result_array();
        }

        public function get_hospital()
        {
        $this->db->select('*');
        $this->db->from('mHospital');
        return $this->db->get()->result_array();
        
        }
        
        public function get_mcuperiod()
        {
        $this->db->select('mcu_period');
        $this->db->from('trMcu');
        $this->db->group_by('mcu_period');
        return $this->db->get()->result();
        }

        public function getWhere_disease($id)
        {
        $this->db->select('*');
        $this->db->from('mDisease');
        $this->db->where('intidDisease',$id);
        return $this->db->get()->row_array();
        
        }

        public function get_follupperf()
        {
            $this->db->select ('*, COUNT(*) as total');
            $this->db->from('trMcu m');
            $this->db->where('m.health_status', 'Unfit');
            $this->db->join('mDisease p', 'm.identified_disease = p.intidDisease');
            $this->db->group_by('txtNamaDisease');
            $this->db->order_by('total', 'DESC');
            // $this->db->limit(5);
    
            return $this->db->get()->result_array();
        }

        public function get_actionperf()
        {
            $this->db->select ('*, COUNT(*) as total');
            $this->db->from('trMcu m');
            $this->db->where('m.health_status', 'Unfit');
            $this->db->join('mEmployee e', 'm.intIdEmployee = e.intIdEmployee');
            $this->db->join('mDepartemen d', 'e.intIdDepartment = d.intIdDepartement');
            $this->db->join('mDisease p', 'm.identified_disease = p.intidDisease');
            $this->db->group_by('txtNamaDepartement');
            $this->db->order_by('total', 'DESC');
            // $this->db->limit(5);
    
            return $this->db->get()->result_array();
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
            $this->db->where('m.health_status', $where['health_status']);
            $this->db->like('m.identified_disease', $like, 'both');

            return $this->db->get()->num_rows();
        }

        public function totaldept($wheres)
        {
            $this->db->select('d.txtNamaDepartement, COUNT(m.id) as total');
            $this->db->from('trMcu m');
            $this->db->join('mEmployee e', 'm.intIdEmployee = e.intIdEmployee');
            $this->db->join('mDepartemen d', 'e.intIdDepartment = d.intIdDepartement');
            $this->db->where('m.doctor_note != ', '');
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
            $this->db->where('health_status', 'Unfit');
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
}