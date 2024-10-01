<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Regulation_status_model extends MY_Model
{
    use MY_Tables;

    public function __construct()
	{
		$this->_tabel = $this->_table_regulation_status;
        $this->_crudName = 'Regulation Status';
		parent::__construct();
	}

    public function show($button = "")
    {
        $this->datatables->select(
            "id,name,status",false
        );
        $this->datatables->order_by("updated_at desc");
        $this->datatables->from("{$this->_tabel}");
        $this->datatables->add_column('action',$button,'id,name');

        if($this->input->post('search')){
            $search = $this->input->post('search');
            if(!empty($search['value'])){
                $this->datatables->like('name',$search['value']);
            }
        }
        return $this->datatables->generate();

    }

    private function _validate()
    {
        $id = clearInput($this->input->post('id'));
        $name = $this->_generalRoles;
        $name_check = array(
            'name_check',function($value) use ($id) {
                if(!empty($value) || $value != ''){
                    try {
                        $cek = $this->get(array('name' => $value));
                        if(is_object($cek)){
                            if(empty($id)){
                                throw new Exception("Error Processing Request", 1);
                                
                            }

                            if(!empty($id) && $cek->id != $id){
                                throw new Exception; 
                            }                      
                        }
                        return true;
                    } catch (Exception $e) {
                        $this->form_validation->set_message('name_check','The {field} already exist.');
                        return false;
                    }
                }
            }
        );
        array_push($name,$name_check);

        $this->form_validation->set_rules('name', 'Regulation Status Name', $name);
        !empty($this->input->post('status')) ? $this->form_validation->set_rules('status','Status',$this->_generalRoles) : "";
        $this->form_validation->set_error_delimiters('<div class="invalid-feedback">', '</div>');

        if ($this->form_validation->run() === false) {
            $this->_response['success'] = false;
            $this->_response['validate'] = false;
            foreach ($this->input->post() as $key => $value) {
                $this->validateArray();
                if($key == 'status'){
                    $key = 'statusMessage';
                }
                $this->_response['messages'][$key] = form_error($key);
            }
        }

        if(empty($this->input->post('status'))){
            $this->_response['success'] = false;
            $this->_response['validate'] = false;
            $this->validateArray();
            $this->_response['messages']['statusMessage'] = '<div class="invalid-feedback">The Status field must be required.</div>';
        }

        return;

    }

    public function save()
    {
        $this->db->trans_begin();
        try {
            $this->_validate();
            if(!$this->_response['validate']){
                throw new Exception("Error Processing Request", 1);
            }

            $name = clearInput($this->input->post('name'));
            $status = !empty($this->input->post('status')) ? clearInput($this->input->post('status')) : 'non active';
            if($status != 'active'){
                $status = 'non active';
            }

            $id = clearInput($this->input->post('id'));
            $data = array(
                'name' => $name,
                'status' => $status,
            );
            $save = empty($id) ? $this->insert($data) : $this->update(array('id' => $id),$data);
            if(!$save){
                $this->_response['success'] = false;
                $this->_response['messages'] = $this->_failedMessages;
            }

            $this->db->trans_commit();
            return $this->_response;
        } catch (Exception $e) {
            $this->db->trans_rollback();
            return $this->_response;
        }
    }
}