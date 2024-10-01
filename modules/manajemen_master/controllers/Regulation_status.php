<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Regulation_status extends MY_Controller
{

	public function __construct()
	{
        $this->_bigModul = MANAGEMEN_MASTER;
        $this->_page = 'Regulation Status';
		parent::__construct();
	}

    public function index()
    {
        $this->_setJs();
        $headerTable = array('no', 'regulation status name', 'status', "");
        $buttonAction = array(
            array(
				'button' => 'insert',
				'label' => 'Add Regulation Status',
				'type' => 'modal',
				'url' => base_url() . "manajemen_master/regulation_status/insert",
			),
        );
        $this->_setButtonAction($buttonAction);
        $this->_setTable($headerTable);
        $this->_content = CRUD_MASTER;
        $this->_view();
    }

    public function show()
	{
		isAjaxRequestWithPost();
		$buttonTable = array(
			array(
				'button' => 'update',
				'type' => 'modal',
				'url' => base_url() . "manajemen_master/regulation_status/update/$1",
			),
			array(
				'button' => 'delete',
				'type' => 'confirm',
				'title' => 'Item',
				'confirm' => 'Are you sure you want to delete this item ? <br>(<b>Regulation Relate Name : $2</b>)',
				'url' => base_url() . "manajemen_master/regulation_status/delete/$1",
			),
			array(
				'button' => 'status',
				'type' => 'confirm',
				'title' => 'Status',
				'confirm' => 'Are you sure you want to change status this item ? <br>(<b>Regulation Relate Name : $2</b>)',
				'url' => base_url() . "manajemen_master/regulation_status/status/$1",
			)
		);

		$button = $this->_setButtonOnTable($buttonTable);
		echo $this->regulation_status_model->show($button);
	}

    public function insert()
    {
        isAjaxRequestWithPost();
		$content = array(
			'url_form' => base_url() . "manajemen_master/regulation_status/save",
			'fieldName' => 'Regulation Status Name'
		);
		$data = array(
			'title_modal' => 'Add Regulation Status',
			'form' => $this->load->view($this->_form, $content, true),
		);
		$html = $this->load->view($this->_formModal, $data, true);

		echo json_encode(array('html' => $html));
    }

    public function save()
    {
        isAjaxRequestWithPost();
        $response = $this->regulation_status_model->save();
		echo json_encode($response);
    }

    public function update($id)
	{
		isAjaxRequestWithPost();
		$id = clearInput($id);
		try {
			if ($id == null) {
				throw new Exception("Failed to request Edit", 1);
			}

			$get = $this->regulation_status_model->get(array('id' => $id));
			if (!$get) {
				throw new Exception("Error Processing Request", 1);
			}

			$content = array(
				'url_form' => base_url() . "manajemen_master/regulation_status/save",
				'fieldName' => 'Regulation Status Name',
				'id' => $id,
				'name' => $get->name,
				'status' => $get->status,
			);
	
			$data = array(
				'title_modal' => 'Edit Regulation Status',
				'form' => $this->load->view($this->_form, $content, true),
			);
			$html = $this->load->view($this->_formModal, $data, true);
	
			echo json_encode(array('html' => $html));

			exit();
		} catch (Exception $e) {
			$response['failed'] = true;
			$response['message'] = $e->getMessage();
			echo json_encode($response);
			exit();
		}
	}

    public function status($id)
	{
		isAjaxRequestWithPost();
		$id = clearInput($id);
		$response = array('text' => 'Successfully change status item', 'success' => true);
		try {
			if(is_null($id)){
				throw new Exception("Error Processing Request", 1);
				
			}

			$get = $this->regulation_status_model->get(array("id" => $id));
			if(!$get){
				throw new Exception("Data not found", 1);
				
			}

			$data = array(
				'status' => $get->status == 'active' ? 'non active' : 'active',
			);

			$update = $this->regulation_status_model->update(array('id' => $id),$data);
			if(!$update){
				throw new Exception("Failed update status data", 1);
				
			}

			echo json_encode($response);
		} catch (Exception $e) {
			$response['text'] = $e->getMessage();
			$response['success'] = false;
			echo json_encode($response);
		}
	}

    public function delete($id)
	{
		$this->_isAjaxRequestWithPost();
		$id = clearInput($id);
		$response = array('text' => 'Successfully delete item', 'success' => true);
		try {

			if(is_null($id)){
				throw new Exception("Error Processing Request", 1);
				
			}

			$get = $this->regulation_status_model->get(array("id" => $id));
			if(!$get){
				throw new Exception("Data not found", 1);
				
			}

			//delete 
			$delete = $this->regulation_status_model->delete($id);
			if(!$delete){
				throw new Exception("Failed delete data", 1);
				
			}

			echo json_encode($response);
		} catch (Exception $e) {
			$response['text'] = $e->getMessage();
			$response['success'] = false;
			echo json_encode($response);
		}
	}

}