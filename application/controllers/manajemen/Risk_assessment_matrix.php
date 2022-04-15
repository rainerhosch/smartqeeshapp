<?php
defined('BASEPATH') or exit('No direct script access allowed');
/**
 *  File Name             : risk_assessment_matrix.php
 *  File Type             : Controller
 *  File Package          : CI_Controller
 ** * * * * * * * * * * * * * * * * * **
 *  Author                : Agung Kusaeri
 *  Date Created          : 11/04/2022
 *  Quots of the code     : 'Sabar ya dengan kode orang'
 */
class Risk_assessment_matrix extends CI_Controller{

    public function __construct()
    {
        parent::__construct();
        login_check();
        $this->load->model('Manajemen/M_risk_assessment_matrix', 'risk_ass_matrix');
        $this->load->model('M_likelihood');
    }

    public function index()
    {

        $data['title'] = 'Smart Qeesh App';
        $data['page'] = 'Manajemen';
        $data['subpage'] = 'Risk Assessment Matrix';
        $data['content'] = 'pages/manajemen/v_risk_assessment_matrix';
        $this->load->view('template', $data);
    }

    public function get_json()
    {
        if($this->input->is_ajax_request())
        {
            $data = [
                'code' => 200,
                'status' => true,
                'msg' => 'Success',
                'data' => $this->risk_ass_matrix->get()->result_array()
            ];
        }
        echo json_encode($data);
    }

    public function store()
    {
        if($this->input->is_ajax_request())
        {
            $input = $this->input->post();
            if($input['id'])
            {
                $dataInput = [
                    'intIdRiskConsequence' => $input['intIdRiskConsequence'],
                    'intIdLikelihood' => $input['intIdLikelihood'],
                    'txtTingkatResiko' => $input['txtTingkatResiko'],
                    'txtRiskMatrix' => $input['txtRiskMatrix'],
                    'txtNamaResiko' => $input['txtNamaResiko'],
                    'intIsAcceptable' => $input['intIsAcceptable'],
                    'intUpdateBy' => $this->session->userdata('user_id'),
                    'dtmUpdateDate' => date('Y-m-d'),
                    'txtRiskOwner' => $input['txtRiskOwner'],
                ];
                $id = $input['id'];
                // proses update
                $status =  $this->risk_ass_matrix->update($id,$dataInput);
                $data = [
                    'code' => 200,
                    'status' => 'success',
                    'msg' => 'Risk Assessment Matrix berhasil diupdate',
                    'data' => $status
                ];
            }else{
                $dataInput = [
                    'intIdRiskConsequence' => $input['intIdRiskConsequence'],
                    'intIdLikelihood' => $input['intIdLikelihood'],
                    'txtTingkatResiko' => $input['txtTingkatResiko'],
                    'txtRiskMatrix' => $input['txtRiskMatrix'],
                    'txtNamaResiko' => $input['txtNamaResiko'],
                    'intIsAcceptable' => $input['intIsAcceptable'],
                    'intInsertedBy' => $this->session->userdata('user_id'),
                    'dtmInsertedDate' => date('Y-m-d'),
                    'intUpdatedBy' => $this->session->userdata('user_id'),
                    'dtmUpdatedDate' => date('Y-m-d'),
                    'txtRiskOwner' => $input['txtRiskOwner'],
                ];
                // $dataInput = [
                //     'intIdRiskConsequence' => $input['intIdRiskConsequence'],
                //     'intIdLikelihood' => $input['intIdLikelihood'],
                //     'txtTingkatResiko' => 'dfsd',
                //     'txtRiskMatrix' => 'sfsdf',
                //     'txtNamaResiko' => 'asdfsd',
                //     'intIsAcceptable' => 1,
                //     'intInsertedBy' => 1,
                //     'dtmInsertedDate' => date('Y-m-d'),
                //     'intUpdatedBy' => 1,
                //     'dtmUpdatedDate' => date('Y-m-d'),
                //     'txtRiskOwner' => 'ss',
                // ];
                // proses insert
                $status =  $this->risk_ass_matrix->create($dataInput);
                $data = [
                    'code' => 200,
                    'status' => 'success',
                    'msg' => 'Risk Assessment Matrix berhasil ditambahkan',
                    'data' => $status
                ];
                echo json_encode($data);
            }
        }
        // echo json_encode($this->input->post());
    }

    public function destroy()
    {
        if($this->input->is_ajax_request())
        {
            $id = $this->input->post('id');
            if($id)
            {
                $this->risk_ass_matrix->destroy($id);
                $data = [
                    'code' => 200,
                    'status' => true,
                    'msg' => 'Risk Assessment Matrix berhasil dihapus',
                    'data' => NULL
                ];
            }else{
                // jika id tidak ada
                $data = [
                    'code' => 400,
                    'status' => false,
                    'msg' => 'Risk Assessment Matrix tidak ditemukan',
                    'data' => NULL
                ];
            }
            echo json_encode($data);
        }

    }

    public function search()
    {
        if($this->input->is_ajax_request())
        {
            $keyword = $this->input->post('keyword');
            $result  = $this->risk_ass_matrix->search($keyword);
            $data = [
                'code' => 200,
                'status' => true,
                'msg' => '',
                'data' => $result
            ];
        }

        echo json_encode($data);
    }

    public function getConsequence()
    {
        if($this->input->is_ajax_request())
        {
            $data = $this->risk_ass_matrix->getConsequence();
            echo json_encode($data);
        }
    }

    public function getShow()
    {
        if($this->input->is_ajax_request())
        {
            $id = $this->input->post('id');
            $data = $this->risk_ass_matrix->get($id)->row_array();
            echo json_encode($data);
        }
    }

    public function getLikelihood()
    {
        if($this->input->is_ajax_request())
        {
            $data = $this->risk_ass_matrix->getLikelihood();
            echo json_encode($data);
        }
    }

    public function ruleLikelihood()
    {
        if($this->input->is_ajax_request())
        {
            $req = $this->input->post('likelihood');
            $likelihood = $this->M_likelihood->get($req)->row_array();

            if($likelihood['intLikelihoodNumber'] == 1)
            {
                $data = [
                    [
                        'no' => 1,
                        'nama' => 'LOW',
                        'keterangan' => 'ACCEPTABLE'
                    ],
                    [
                        'no' => 2,
                        'nama' => 'LOW',
                        'keterangan' => 'ACCEPTABLE'
                    ],
                    [
                        'no' => 3,
                        'nama' => 'MEDIUM',
                        'keterangan' => 'SUPPLEMENTARY ISSUE'
                    ],
                    [
                        'no' => 4,
                        'nama' => 'HIGH',
                        'keterangan' => 'ISSUE'
                    ],
                    [
                        'no' => 5,
                        'nama' => 'EXTREME',
                        'keterangan' => 'UNACCEPTABLE'
                    ]
                ];
            }else if($likelihood['intLikelihoodNumber'] == 2){
                $data = [
                    [
                        'no' => 2,
                        'nama' => 'LOW',
                        'keterangan' => 'ACCEPTABLE'
                    ],
                    [
                        'no' => 4,
                        'nama' => 'LOW',
                        'keterangan' => 'ACCEPTABLE'
                    ],
                    [
                        'no' => 6,
                        'nama' => 'MEDIUM',
                        'keterangan' => 'SUPPLEMENTARY ISSUE'
                    ],
                    [
                        'no' => 8,
                        'nama' => 'HIGH',
                        'keterangan' => 'ISSUE'
                    ],
                    [
                        'no' => 10,
                        'nama' => 'EXTREME',
                        'keterangan' => 'UNACCEPTABLE'
                    ]
                ];
            }else if($likelihood['intLikelihoodNumber'] == 3){
                $data = [
                    [
                        'no' => 3,
                        'nama' => 'LOW',
                        'keterangan' => 'ACCEPTABLE'
                    ],
                    [
                        'no' => 6,
                        'nama' => 'MEDIUM',
                        'keterangan' => 'SUPPLEMENTARY ISSUE'
                    ],
                    [
                        'no' => 9,
                        'nama' => 'HIGH',
                        'keterangan' => 'ISSUE'
                    ],
                    [
                        'no' => 12,
                        'nama' => 'EXTREME',
                        'keterangan' => 'UNACCEPTABLE'
                    ],
                    [
                        'no' => 15,
                        'nama' => 'EXTREME',
                        'keterangan' => 'UNACCEPTABLE'
                    ]
                ];
            }else if($likelihood['intLikelihoodNumber'] == 4){
                $data = [
                    [
                        'no' => 4,
                        'nama' => 'LOW',
                        'keterangan' => 'ACCEPTABLE'
                    ],
                    [
                        'no' => 8,
                        'nama' => 'MEDIUM',
                        'keterangan' => 'SUPPLEMENTARY ISSUE'
                    ],
                    [
                        'no' => 12,
                        'nama' => 'HIGH',
                        'keterangan' => 'ISSUE'
                    ],
                    [
                        'no' => 16,
                        'nama' => 'EXTREME',
                        'keterangan' => 'UNACCEPTABLE'
                    ],
                    [
                        'no' => 20,
                        'nama' => 'EXTREME',
                        'keterangan' => 'UNACCEPTABLE'
                    ]
                ];
            }else if($likelihood['intLikelihoodNumber'] == 5){
                $data = [
                    [
                        'no' => 5,
                        'nama' => 'MEDIUM',
                        'keterangan' => 'SUPPLEMENTARY ISSUE'
                    ],
                    [
                        'no' => 10,
                        'nama' => 'HIGH',
                        'keterangan' => 'ISSUE'
                    ],
                    [
                        'no' => 15,
                        'nama' => 'EXTREME',
                        'keterangan' => 'UNACCEPTABLE'
                    ],
                    [
                        'no' => 20,
                        'nama' => 'EXTREME',
                        'keterangan' => 'UNACCEPTABLE'
                    ],
                    [
                        'no' => 25,
                        'nama' => 'EXTREME',
                        'keterangan' => 'UNACCEPTABLE'
                    ]
                ];
            }
            echo json_encode($data);
        }
    }

}