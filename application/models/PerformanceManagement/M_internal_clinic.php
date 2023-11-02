<?php
class M_internal_clinic extends CI_Model
{
    public $table = 'trinternalclinic';

    public function get_all_data()
    {
        return $this->db->get('trinternalclinic');
    }

    public function add_data()
    {
        $employee_number    = $this->input->post('nik');
        $employee_name      = $this->input->post('employee_name');
        $department         = $this->input->post('department');
        $age                = $this->input->post('age');
        $address            = $this->input->post('address');
        $service_period     = $this->input->post('service_period');
        $date               = $this->input->post('date');
        $idparamedic        = $this->input->post('paramedic_name');
        $idcomplaint        = $this->input->post('complaint');
        $action             = $this->input->post('action');
        $idMedicine         = $this->input->post('medicine');

        $data = array(
            'intIdEmployee'     => $employee_number,
            'service_period'    => $service_period,
            'age'               => $age,
            'date'              => $date,
            'idparamedic'       => $idparamedic,
            'idcomplaint'       => $idcomplaint,
            'action'            => $action,
            'idMedicine'        => $idMedicine
        );

        $this->db->insert($this->table, $data);
    }

    public function delete_data($where, $table)
    {
        $this->db->where($where);
        $this->db->delete($table);
    }

    public function edit_data($where, $table)
    { 
        return $this->db->get_where($table, $where); 
    } 

    public function update_data($id, $table, $data)
    {
        $this->db->where($id);
        $this->db->update($table, $data);
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
    
    public function get_paramedic()
    {
        $this->db->select('*');
        $this->db->from('mParamedic');
        return $this->db->get()->result_array();
    }

    public function get_data($code)
    {
        // $query = $this->db->query(
        //     "SELECT *
        //     FROM trinternalclinic
        //     WHERE internalclinic_id = '$code'"
        // );
        // return $query;

        // $this->db->select('*');
        // $this->db->from('trinternalclinic');
        // $this->db->where('internalclinic_id', $code);
        // return $this->db->get()->row_array();

        $query = $this->db->get_where('trinternalclinic', array('internalclinic_id' => $code))->row();
        return $query;
    }

    public function get_list_intclinic()
    {
        $this->db->select('*');
        $this->db->from('trinternalclinic c');
        $this->db->join('mEmployee e', 'c.intIdEmployee = e.intIdEmployee');
        $this->db->join('mDepartemen d', 'e.intIdDepartment = d.intIdDepartement');
        $this->db->join('mDisease f', 'c.idcomplaint = f.intidDisease');
        $this->db->join('mMedicine g', 'c.idMedicine = g.idObat');
        $this->db->order_by('internalclinic_id', 'ASC');

        return $this->db->get()->result();
    }

    public function get_disease()
    {
        $this->db->select('*');
        $this->db->from('mDisease');
        return $this->db->get()->result_array();
    }

    public function get_medicine()
    {
        $this->db->select('*');
        $this->db->from('mMedicine');
        return $this->db->get()->result_array();
    }

    public function get_wheremedicine($id)
    {
        $this->db->select('*');
        $this->db->from('mMedicine');
        $this->db->join('idObat', $id);
        return $this->db->get()->row_array();
    }

    public function get_visitperf()
    {
        $this->db->select('*, COUNT(*) as total');
        $this->db->from('trinternalclinic i');
        $this->db->join('mDisease p', 'i.idcomplaint = p.intidDisease');
        $this->db->group_by('txtNamaDisease');
        $this->db->order_by('total', 'DESC');
        $this->db->limit(5);

        return $this->db->get()->result_array();
    }

    public function get_deptlist()
    {
        $this->db->select('*');
        $this->db->from('mDepartemen');
        return $this->db->get()->result_array();
    }

    public function get_actionperf()
    {
        $this->db->select('*, COUNT(*) as total');
        $this->db->from('trMcu m');
        $this->db->join('mEmployee e', 'm.intIdEmployee = e.intIdEmployee');
        $this->db->join('mDepartemen d', 'e.intIdDepartment = d.intIdDepartement');
        $this->db->group_by('txtNamaDepartement');
        $this->db->order_by('total', 'DESC');
        $this->db->limit(5);

        return $this->db->get()->result_array();
    }

    public function getWhere_disease($id)
    {
        $this->db->select('*');
        $this->db->from('mDisease');
        $this->db->where('intidDisease', $id);
        return $this->db->get()->row_array();
    }

    public function destroy($id)
    {
        $this->db->where('internalclinic_id', $id);
        $this->db->delete($this->table);
    }

    public function get_mcuperiod()
        {
        $this->db->select('mcu_period');
        $this->db->from('trMcu');
        $this->db->group_by('mcu_period');
        return $this->db->get()->result();
        }

        public function totaldept($wheres)
        {
            $this->db->select('d.txtNamaDepartement, COUNT(m.id) as total');
            $this->db->from('trinternalclinic m');
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
            $this->db->from('trinternalclinic m');
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
}
