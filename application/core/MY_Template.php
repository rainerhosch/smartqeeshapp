<?php defined('BASEPATH') or exit('No direct script access allowed');

abstract class MY_Template extends CI_Controller{
    
    protected $_title;
    protected $_bigModul;
    protected $_page;
    protected $_content;
    protected $_formModal;
    protected $_className;
    protected $_form;
    protected $_body;

    public function __construct()
    {
        parent::__construct();
        $this->config->load('adminlte');
        $this->load->helper(['general',THEME]);
        $this->load->library(['excel','datatables','template']);
        $this->_formModal = FOLDER_LAYOUTS.'/v_form_modal';

        $this->template->set_layout(LAYOUT);
        $title = str_replace("_"," ",ucwords(strtolower($this->router->class)));
        $title = "Smart Qeesh App - {$this->_bigModul} ".$title;
        $this->_page = isset($this->_page) ? $this->_page : 'Home';
        $this->_className = strtolower($this->router->class);
        $this->_form = "{$this->_className}/v_form_{$this->_className}";
        $this->_body = "{$this->_className}/v_{$this->_className}";

        $this->template->set('title',$title);
        $this->template->set('page',strtoupper(strtolower($this->_page)));
        $this->template->set('modul',strtoupper(strtolower($this->_bigModul)));
    }

    public function _view($data = [])
    {
        $this->template->build(isset($this->_content) ? $this->_content : CRUD,$data);
    }

    protected function _setJs($name = '')
    {
        if($name == ''){
            $name = strtolower($this->router->class.'_'.$this->router->method);
        }

        $generalJs = base_url('assets/custom_js/general/general.js');
        $bigModul = strtolower(str_replace(" ","_",$this->_bigModul));
        $js = base_url('assets/custom_js/'.$bigModul).'/'.$name.'.js';

        $this->template->set('generalJs',$generalJs);
        $this->template->set('js',$js);
    }

    protected function _setTable($array = [])
	{
        $string = "";
        if(is_array($array) && count($array)  > 0){
            $string = generateTable($array);
        }
        $this->template->set('table',$string);
	}

    protected function _setButtonAction($array)
    {
        $string = '';
        if(is_array($array) && count($array)  > 0){
            $string = generateButtonAction($array);
        }

        $this->template->set('buttonAction',$string);
    }

    protected function _setButtonOnTable($array = [])
    {
        $string = '';

        // if(is_object($obj)){
        if(is_array($array) && count($array)  > 0){
            $string = generateButtonOnTable($array);
        }

        return $string;
    }

}