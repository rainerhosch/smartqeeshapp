<?php
defined('BASEPATH') or exit('No direct script access allowed');

function generateTable($array = [])
{
    if (!is_array($array) || (is_array($array) && count($array) == 0)) {
        return '';
    }

    $header = "<div class=\"table-responsive\">";
    $header .= "<table class=\"table table-bordered table-hover\" id=\"table\" style=\"width:100%\">";
    $header .= "<thead>";
    $header .= "<tr>";
    for ($i = 0; $i < count($array); $i++) {
        $header .= "<th>" . ($array[$i] != '' ? ucwords($array[$i]) : "") . "</th>";
    }
    $header .= "</tr>";
    $header .= "</thead>";
    $header .= "<tbody></tbody>";
    $header .= "</table>";
    $header .= "</div>";
    return $header;
}

function generateButtonAction($custom = [])
{
    $button = "";
    try {
        
        $insert_type = '';
        $insert_url = '';
        $insert_label = 'Add Data';
        $insert_fullscreen = '';

        $import_type = '';
        $import_url = '';
        $import_label = 'Import Data';

        $export_type = '';
        $export_url = '';
        $export_label = 'Export Data';

        if (count($custom) > 0) {
            foreach ($custom as $ky => $val) {
                if (isset($val['button'])) {
                    switch ($val['button']) {
                        case 'insert':
                            $insert_type = (($val['type'] == 'redirect' || $val['type'] == 'modal' || $val['type'] == 'onload') && isset($val['type'])) ? "data-type = \"{$val['type']}\"" : '';
                            $insert_url = (isset($val['url'])) ? "data-url = \"{$val['url']}\"" : '';
                            $insert_label = (isset($val['label'])) ? $val['label'] : $insert_label;
                            $insert_fullscreen = (isset($val['fullscreen']) && $val['fullscreen'] === true) ? "data-fullscreenmodal = 1" : "data-fullscreenmodal = 0";
                            break;

                        case 'import':
                            $import_type = (($val['type'] == 'redirect' || $val['type'] == 'modal' || $val['type'] == 'onload') && isset($val['type'])) ? "data-type = \"{$val['type']}\"" : '';
                            $import_url = (isset($val['url'])) ? "data-url = \"{$val['url']}\"" : '';
                            $import_label = (isset($val['label'])) ? $val['label'] : $import_label;
                            break;

                        case 'export':
                            $export_type = (($val['type'] == 'redirect' || $val['type'] == 'modal' || $val['type'] == 'onload') && isset($val['type'])) ? "data-type = \"{$val['type']}\"" : '';
                            $export_url = (isset($val['url'])) ? "data-url = \"{$val['url']}\"" : '';
                            $export_label = (isset($val['label'])) ? $val['label'] : $export_label;
                            break;
                    }
                }
            }
        }

        $button .= ($import_url != "") ? "<button class=\"btn btn-primary btn-rounded " . ($export_url != "" || $insert_url != "" ? "mr-3" : "") . "\" type=\"button\" id=\"btnImport\" {$import_type} {$import_url}>{$import_label}</button>" : "";
        $button .= ($export_url != "") ? "<button class=\"btn btn-warning btn-rounded " . (($insert_url != "") ? "mr-3" : "") . "\" type=\"button\" id=\"btnExport\" {$export_type} {$export_url}>{$export_label}</button>" : "";
        $button .= ($insert_url != "") ? "<button class=\"btn btn-success btn-rounded\" type=\"button\" id=\"btnAdd\" {$insert_type} {$insert_url} {$insert_fullscreen}>{$insert_label}</button>" : "";

        return $button;
    } catch (\Throwable $th) {
        return $button;
    }
}

function generateButtonOnTable($custom = [])
{
    $button = "";
    try {

        $update_type = '';
        $update_url = '';
        $update_confirm = '';
        $update_title = '';
        $update_fullscreen = '';

        $delete_type = '';
        $delete_url = '';
        $delete_confirm = '';
        $delete_title = '';

        $detail_type = '';
        $detail_url = '';
        $detail_confirm = '';
        $detail_title = '';

        $status_type = '';
        $status_url = '';
        $status_confirm = '';
        $status_title = '';

        if (count($custom) > 0) {
            foreach ($custom as $ky => $val) {
                if (isset($val['button'])) {
                    switch ($val['button']) {
                        case 'update':
                            $update_type = (($val['type'] == 'redirect' || $val['type'] == 'modal' || $val['type'] == 'confirm' || $val['type'] == 'onload') && isset($val['type'])) ? "data-type = \"{$val['type']}\"" : '';
                            $update_url = (isset($val['url'])) ? "data-url = \"{$val['url']}\"" : '';
                            $update_confirm = (isset($val['confirm']) && (isset($val['type']) && $val['type'] == 'confirm')) ? "data-textconfirm = \"{$val['confirm']}\"" : "";
                            $update_title = (isset($val['confirm']) && isset($val['title']) && (isset($val['type']) && $val['type'] == 'confirm')) ? "data-title = \"{$val['title']}\"" : "";
                            $update_fullscreen = (isset($val['fullscreen'])) ? "data-fullscreenmodal = 1" : "data-fullscreenmodal = 0";
                            break;

                        case 'delete':
                            $delete_type = (($val['type'] == 'redirect' || $val['type'] == 'modal' || $val['type'] == 'confirm' || $val['type'] == 'onload') && isset($val['type'])) ? "data-type = \"{$val['type']}\"" : '';
                            $delete_url = (isset($val['url'])) ? "data-url = \"{$val['url']}\"" : '';
                            $delete_confirm = (isset($val['confirm']) && (isset($val['type']) && $val['type'] == 'confirm')) ? "data-textconfirm = \"{$val['confirm']}\"" : "";
                            $delete_title = (isset($val['confirm']) && isset($val['title']) && (isset($val['type']) && $val['type'] == 'confirm')) ? "data-title = \"{$val['title']}\"" : "";
                            break;

                        case 'detail':
                            $detail_type = (($val['type'] == 'redirect' || $val['type'] == 'modal' || $val['type'] == 'confirm' || $val['type'] == 'onload') && isset($val['type'])) ? "data-type = \"{$val['type']}\"" : '';
                            $detail_url = (isset($val['url'])) ? "data-url = \"{$val['url']}\"" : '';
                            $detail_confirm = (isset($val['confirm']) && (isset($val['type']) && $val['type'] == 'confirm')) ? "data-textconfirm = \"{$val['confirm']}\"" : "";
                            $detail_title = (isset($val['confirm']) && isset($val['title']) && (isset($val['type']) && $val['type'] == 'confirm')) ? "data-title = \"{$val['title']}\"" : "";
                            $detail_list = (isset($val['json_obj'])) ? "data-json = \"{$val['json_obj']}\"" : "";
                            break;

                        case 'status':
                            $status_type = (($val['type'] == 'redirect' || $val['type'] == 'modal' || $val['type'] == 'confirm' || $val['type'] == 'onload') && isset($val['type'])) ? "data-type = \"{$val['type']}\"" : '';
                            $status_url = (isset($val['url'])) ? "data-url = \"{$val['url']}\"" : '';
                            $status_confirm = (isset($val['confirm']) && (isset($val['type']) && $val['type'] == 'confirm')) ? "data-textconfirm = \"{$val['confirm']}\"" : "";
                            $status_title = (isset($val['confirm']) && isset($val['title']) && (isset($val['type']) && $val['type'] == 'confirm')) ? "data-title = \"{$val['title']}\"" : "";
                            break;
                    }
                }
            }
        }

        $button .= $status_url != '' && $update_url != "" ? "<button class=\"btn btn-outline-info btn-rounded btn-sm " . ($delete_url != ""  || $update_url != "" ? "mr-2" : "") . " btnStatus\" {$status_type} {$status_url} {$status_confirm} {$status_title} data-id =\"$1\">Active</button>" : "";
        $button .= $detail_url != '' && $detail_url != "" ?  "<button class=\"btn btn-outline-primary btn-rounded btn-sm " . ($delete_url != ""  || $update_url != "" ? "mr-2" : "") . " btnDetail\" {$detail_type} {$detail_url} {$detail_confirm} {$detail_title} {$detail_list} data-id =\"$1\">View detail</button>" : "";
        $button .= ($update_url != "") ? "<button class=\"btn btn-outline-success btn-rounded btn-sm " . ( $delete_url != "" ? "mr-2" : "") . " btnEdit\" {$update_type} {$update_url} {$update_confirm} {$update_title} {$update_fullscreen} data-id =\"$1\">Edit</button>" : "";
        $button .= ($delete_url != "") ? "<button class=\"btn btn-outline-danger btn-rounded btn-sm btnDelete\"   {$delete_type} {$delete_url} {$delete_confirm} {$delete_title} data-id =\"$1\">Delete</button>" : "";

        return $button;
    } catch (Exception $e) {
        return $button;
    }
}