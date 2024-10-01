<?php
defined('BASEPATH') or exit('No direct script access allowed');

function clearInput($data)
{
    if(empty($data) || is_null($data)){
        return $data;
    }

    $filter = trim(stripslashes(strip_tags(htmlspecialchars($data, ENT_QUOTES))));
    return $filter;
}

function generateCode($length = 150)
{
    return substr(str_shuffle("0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ"), 0, $length);
}

function isAjaxRequestWithPost()
{
    $ci = &get_instance();
    if (!$ci->input->is_ajax_request() && empty($ci->input->post())) {
        pageError();
        exit();
    }

    return $ci->output->set_content_type('application/json');
}

function isAjaxRequest()
{
    $ci = &get_instance();
    if (!$ci->input->is_ajax_request()) {
        pageError();
        exit();
    }

    return $ci->output->set_content_type('application/json');
}

function isControllerExist()
{
    $ci = &get_instance();
    return $ci->router->class;
}

function debug($value)
{
    echo "<pre>";
    var_dump($value);
    echo "</pre>";
    exit();
}

function pageError()
{
    redirect(base_url() . 'pages_404', 'location');
}

function SelectOption($data,$checked = null)
{
    $html = "";
    foreach($data as $ky => $val){
        $html .= "<option value=\"{$val->id}\" ".(!is_null($checked) && $checked == $val->id ? "selected" : "").">{$val->name}</option>";
    }
    return $html;
}